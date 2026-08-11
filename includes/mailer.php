<?php
/**
 * Terk Energy: a small SMTP client.
 *
 * Written by hand rather than pulled in as a library, because this project has
 * no build step and no dependency manager, and the job is narrow: authenticate,
 * hand over one plain-text message, disconnect.
 *
 * Handles implicit TLS (port 465), STARTTLS (587) and plain (testing only).
 * Every step of the conversation is recorded so a failure can be diagnosed
 * instead of guessed at.
 */

if (!defined('TERK')) {
    http_response_code(404);
    exit;
}

class TerkSmtp
{
    /** @var resource|null */
    private $socket = null;

    /** @var string[] Transcript of the session, for diagnostics. */
    private array $log = [];

    private string $error = '';

    public function log(): array   { return $this->log; }
    public function error(): string { return $this->error; }

    /**
     * @param array $cfg     host, port, user, pass, secure
     * @param array $message to, subject, body, from_email, from_name,
     *                       reply_email, reply_name
     */
    public function send(array $cfg, array $message): bool
    {
        $host   = $cfg['smtp_host'] ?? '';
        $port   = (int) ($cfg['smtp_port'] ?? 465);
        $user   = $cfg['smtp_user'] ?? '';
        $pass   = $cfg['smtp_pass'] ?? '';
        $secure = $cfg['smtp_secure'] ?? ($port === 465 ? 'ssl' : ($port === 25 ? 'none' : 'tls'));

        if ($host === '') { return $this->fail('No smtp_host in the mail configuration.'); }

        $dsn = ($secure === 'ssl' ? 'ssl://' : 'tcp://') . $host . ':' . $port;

        $context = stream_context_create([
            'ssl' => [
                'verify_peer'       => true,
                'verify_peer_name'  => true,
                'allow_self_signed' => false,
                'SNI_enabled'       => true,
            ],
        ]);

        $errNo = 0; $errStr = '';
        $this->socket = @stream_socket_client(
            $dsn, $errNo, $errStr, 20, STREAM_CLIENT_CONNECT, $context
        );

        if (!$this->socket) {
            return $this->fail(sprintf('Could not connect to %s (%d: %s).', $dsn, $errNo, $errStr));
        }
        stream_set_timeout($this->socket, 20);

        if (!$this->expect('220')) { return false; }

        $ehloName = $this->ehloName();
        if (!$this->cmd('EHLO ' . $ehloName, '250')) { return false; }

        if ($secure === 'tls') {
            if (!$this->cmd('STARTTLS', '220')) { return false; }
            $ok = @stream_socket_enable_crypto(
                $this->socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT
            );
            if ($ok !== true) { return $this->fail('STARTTLS negotiation failed.'); }
            $this->log[] = '--- TLS established ---';
            if (!$this->cmd('EHLO ' . $ehloName, '250')) { return false; }
        }

        if ($user !== '') {
            if (!$this->cmd('AUTH LOGIN', '334')) { return false; }
            if (!$this->cmd(base64_encode($user), '334', '[username]')) { return false; }
            if (!$this->cmd(base64_encode($pass), '235', '[password]')) {
                return $this->fail(
                    'The mail server rejected the username or password. '
                    . 'Check smtp_user and smtp_pass in the mail configuration. '
                    . 'Last reply: ' . $this->error
                );
            }
        }

        $fromEmail = $message['from_email'];
        if (!$this->cmd('MAIL FROM:<' . $fromEmail . '>', '250')) { return false; }
        if (!$this->cmd('RCPT TO:<' . $message['to'] . '>', '250')) { return false; }
        if (!$this->cmd('DATA', '354')) { return false; }

        $this->write($this->buildMessage($message) . "\r\n.\r\n");
        $this->log[] = 'C: [message body, ' . strlen($message['body']) . ' bytes]';
        if (!$this->expect('250')) { return false; }

        $this->cmd('QUIT', '221');
        $this->close();
        return true;
    }

    /** Build RFC 5322 headers and body. */
    private function buildMessage(array $m): string
    {
        $fromName = $this->encodeName($m['from_name'] ?? '');
        $from = $fromName !== ''
            ? $fromName . ' <' . $m['from_email'] . '>'
            : '<' . $m['from_email'] . '>';

        $headers = [
            'Date: ' . date('r'),
            'From: ' . $from,
            'To: <' . $m['to'] . '>',
            'Subject: ' . $this->encodeText($m['subject']),
            'Message-ID: <' . bin2hex(random_bytes(12)) . '@' . $this->domainOf($m['from_email']) . '>',
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            'Content-Transfer-Encoding: 8bit',
        ];

        if (!empty($m['reply_email'])) {
            $replyName = $this->encodeName($m['reply_name'] ?? '');
            $headers[] = 'Reply-To: ' . ($replyName !== ''
                ? $replyName . ' <' . $m['reply_email'] . '>'
                : '<' . $m['reply_email'] . '>');
        }

        // Normalise to CRLF, then dot-stuff so a line of "." cannot end the data.
        $body = str_replace(["\r\n", "\r", "\n"], ["\n", "\n", "\r\n"], $m['body']);
        $body = preg_replace('/^\./m', '..', $body);

        return implode("\r\n", $headers) . "\r\n\r\n" . $body;
    }

    /**
     * A display name in From or Reply-To. Plain ASCII is quoted, because it may
     * contain commas or full stops that would otherwise split the address.
     */
    private function encodeName(string $value): string
    {
        $value = str_replace(["\r", "\n"], '', $value);
        if ($value === '') { return ''; }
        if (preg_match('/^[\x20-\x7E]*$/', $value)) {
            return '"' . str_replace('"', '', $value) . '"';
        }
        return '=?UTF-8?B?' . base64_encode($value) . '?=';
    }

    /**
     * Free text in a header, such as Subject. Never quoted: quotes would show
     * up literally in the recipient's inbox.
     */
    private function encodeText(string $value): string
    {
        $value = str_replace(["\r", "\n"], '', $value);
        if ($value === '' || preg_match('/^[\x20-\x7E]*$/', $value)) {
            return $value;
        }
        return '=?UTF-8?B?' . base64_encode($value) . '?=';
    }

    private function domainOf(string $email): string
    {
        $at = strrchr($email, '@');
        return $at ? substr($at, 1) : 'localhost';
    }

    private function ehloName(): string
    {
        $host = $_SERVER['HTTP_HOST'] ?? php_uname('n');
        $host = preg_replace('/[^A-Za-z0-9.\-]/', '', explode(':', $host)[0]);
        return $host !== '' ? $host : 'localhost';
    }

    private function cmd(string $line, string $expect, ?string $redact = null): bool
    {
        $this->log[] = 'C: ' . ($redact ?? $line);
        $this->write($line . "\r\n");
        return $this->expect($expect);
    }

    private function write(string $data): void
    {
        if ($this->socket) { @fwrite($this->socket, $data); }
    }

    /** Read a (possibly multi-line) reply and check its code. */
    private function expect(string $code): bool
    {
        $reply = '';
        while ($this->socket && !feof($this->socket)) {
            $line = @fgets($this->socket, 1024);
            if ($line === false) { break; }
            $reply .= $line;
            // A space in the fourth position marks the final line.
            if (strlen($line) >= 4 && $line[3] === ' ') { break; }
        }
        $reply = trim($reply);
        $this->log[] = 'S: ' . $reply;

        if (strncmp($reply, $code, strlen($code)) !== 0) {
            $this->error = $reply !== '' ? $reply : 'No reply from the mail server (timed out).';
            $this->close();
            return false;
        }
        return true;
    }

    private function fail(string $why): bool
    {
        $this->error = $why;
        $this->log[] = '!! ' . $why;
        $this->close();
        return false;
    }

    private function close(): void
    {
        if ($this->socket) { @fclose($this->socket); $this->socket = null; }
    }
}

/**
 * Locate the credentials file. It belongs OUTSIDE the web root, so it can
 * never be served even if PHP stops executing. Searched in order:
 *
 *   1. the path in the TERK_MAIL_CONFIG environment variable
 *   2. one level above the document root  (the recommended location)
 *   3. one level above this project folder
 *   4. inside the project  (works, but the file is then only protected by
 *      .htaccess, so it is the last resort and is warned about)
 */
function terk_mail_config(): ?array
{
    $root = isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] !== ''
        ? rtrim($_SERVER['DOCUMENT_ROOT'], '/\\')
        : dirname(__DIR__);

    $candidates = array_filter([
        getenv('TERK_MAIL_CONFIG') ?: null,
        dirname($root) . '/mail-config.php',
        dirname(dirname(__DIR__)) . '/mail-config.php',
        dirname(__DIR__) . '/mail-config.php',
    ]);

    foreach ($candidates as $path) {
        if (is_readable($path)) {
            $config = require $path;
            if (is_array($config) && !empty($config['smtp_host'])) {
                $config['__path'] = $path;
                $config['__inside_webroot'] = str_starts_with(
                    realpath($path) ?: $path,
                    realpath($root) ?: $root
                );
                return $config;
            }
        }
    }
    return null;
}
