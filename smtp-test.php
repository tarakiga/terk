<?php
/**
 * Terk Energy: SMTP diagnostic.
 *
 * The enquiry form deliberately tells visitors nothing about why a send
 * failed. This shows you, and only you, the whole conversation with the mail
 * server so the cause is obvious instead of guessed at.
 *
 * USE
 *   Web:  https://www.terkenergy.com/smtp-test?token=YOUR_TEST_TOKEN
 *   CLI:  php smtp-test.php
 *
 * The token is the `test_token` value in mail-config.php. Without it the page
 * refuses to run, so nobody who stumbles on the URL can probe your mail setup.
 *
 * DELETE THIS FILE once the form is working. It is a debugging tool, not part
 * of the site.
 */

define('TERK', true);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/mailer.php';

$cli = PHP_SAPI === 'cli';
if (!$cli) {
    header('Content-Type: text/plain; charset=utf-8');
    header('X-Robots-Tag: noindex');
}

function out(string $line = ''): void { echo $line, PHP_EOL; }

out('Terk Energy SMTP diagnostic');
out(str_repeat('=', 60));
out();

/* ---------------------------------------------------------------- config -- */
$config = terk_mail_config();

if (!$config) {
    out('RESULT: no mail configuration found.');
    out();
    out('Looked for mail-config.php in:');
    $root = rtrim($_SERVER['DOCUMENT_ROOT'] ?? dirname(__DIR__), '/\\');
    foreach ([
        getenv('TERK_MAIL_CONFIG') ?: '(TERK_MAIL_CONFIG not set)',
        dirname($root) . '/mail-config.php',
        dirname(dirname(__DIR__)) . '/mail-config.php',
        dirname(__DIR__) . '/mail-config.php',
    ] as $path) {
        $exists = is_readable($path) ? 'readable' : 'not found';
        out(sprintf('  %-58s %s', $path, $exists));
    }
    out();
    out('Copy mail-config.example.php, fill it in, and upload it to the first');
    out('of those paths that sits outside public_html.');
    exit(1);
}

if (!$cli && ($config['test_token'] ?? '') === '') {
    http_response_code(403);
    out('RESULT: refused.');
    out();
    out('Set a `test_token` in mail-config.php, then call this page with');
    out('?token=THAT_VALUE. Running from the command line needs no token.');
    exit(1);
}
if (!$cli && !hash_equals((string) $config['test_token'], (string) ($_GET['token'] ?? ''))) {
    http_response_code(403);
    out('RESULT: refused. The token did not match.');
    exit(1);
}

out('Configuration found at:');
out('  ' . $config['__path']);
if (!empty($config['__inside_webroot'])) {
    out();
    out('  WARNING: that path is inside the web root. It works, but the file is');
    out('  then protected only by .htaccess. Move it above public_html.');
}
out();
out(sprintf('  host        %s', $config['smtp_host'] ?? '(missing)'));
out(sprintf('  port        %s', $config['smtp_port'] ?? '(missing)'));
out(sprintf('  security    %s', $config['smtp_secure']
    ?? (((int) ($config['smtp_port'] ?? 465)) === 465 ? 'ssl (from port)' : 'tls (from port)')));
out(sprintf('  username    %s', $config['smtp_user'] ?? '(missing)'));
out(sprintf('  password    %s', ($config['smtp_pass'] ?? '') === ''
    ? '*** EMPTY: this is almost certainly the problem ***'
    : '(set, ' . strlen($config['smtp_pass']) . ' characters)'));
out(sprintf('  from        %s <%s>', $config['from_name'] ?? '', $config['from_email'] ?? ''));
out(sprintf('  to          %s', $config['to_email'] ?? ''));
out();

/* ------------------------------------------------------------ environment -- */
out('Environment');
out(str_repeat('-', 60));
out(sprintf('  PHP                 %s', PHP_VERSION));
out(sprintf('  openssl             %s', extension_loaded('openssl') ? 'available' : 'MISSING: TLS will not work'));
out(sprintf('  allow_url_fopen     %s', ini_get('allow_url_fopen') ? 'on' : 'off (not required)'));
out(sprintf('  mail()              %s', function_exists('mail') ? 'available' : 'disabled'));
$port = (int) ($config['smtp_port'] ?? 465);
$probe = @fsockopen(($port === 465 ? 'ssl://' : 'tcp://') . $config['smtp_host'], $port, $e, $s, 10);
out(sprintf('  outbound port %-5d %s', $port, $probe ? 'open' : "BLOCKED or unreachable ({$e}: {$s})"));
if ($probe) { fclose($probe); }
out();

/* -------------------------------------------------------------- send test -- */
out('Sending a test message');
out(str_repeat('-', 60));

$smtp = new TerkSmtp();
$ok = $smtp->send($config, [
    'to'          => $config['to_email'] ?? $config['smtp_user'],
    'subject'     => 'Terk Energy: SMTP test',
    'body'        => "This is a test from smtp-test.php.\n\n"
                   . "If you are reading it, the enquiry form can send mail.\n"
                   . 'Sent ' . gmdate('Y-m-d H:i') . " UTC.\n",
    'from_email'  => $config['from_email'] ?? $config['smtp_user'],
    'from_name'   => $config['from_name'] ?? 'Terk Energy',
    'reply_email' => '',
    'reply_name'  => '',
]);

foreach ($smtp->log() as $line) { out('  ' . $line); }
out();

if ($ok) {
    out('RESULT: SUCCESS. Check the ' . ($config['to_email'] ?? '') . ' inbox, and the spam folder.');
    out();
    out('Now delete smtp-test.php from the server.');
    exit(0);
}

out('RESULT: FAILED.');
out('  ' . $smtp->error());
out();
out('Common causes:');
out('  535 / authentication failed  the username or password is wrong. The username');
out('                              must be the full address, and if the mailbox has');
out('                              two-factor authentication you need an app password.');
out('  Could not connect           the host blocks outbound SMTP. Try port 587 with');
out('                              smtp_secure => \'tls\', or ask the host to open it.');
out('  Certificate / TLS errors    check smtp_host is spelled correctly; the name must');
out('                              match the certificate.');
out('  550 / relay denied          from_email is not an address this account may send as.');
exit(1);
