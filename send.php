<?php
/**
 * Terk Energy enquiry handler.
 *
 * Receives the contact form, validates it, and emails TERK_EMAIL. Written for
 * plain PHP mail(), which is what standard cPanel and shared hosting provide.
 * No account, no API key, no third party, and enquiry contents never leave
 * Terk's own server.
 *
 * Requires PHP 8.0 or newer. No extensions beyond the defaults: mbstring is
 * used when present and worked around when not.
 *
 * If the host does NOT run PHP, see HANDOFF.md section 4 for the two one-line
 * alternatives. The form degrades on its own: with no handler answering it
 * falls back to composing the enquiry in the visitor's email client.
 */

define('TERK', true);
require_once __DIR__ . '/includes/config.php';

/** Where enquiries land. Change this one line to route them elsewhere. */
const ENQUIRY_TO = TERK_EMAIL;

/** Did this come from the page's JavaScript rather than a plain form post? */
function wants_json(): bool
{
    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    $with   = $_SERVER['HTTP_X_REQUESTED_WITH'] ?? '';
    return str_contains($accept, 'application/json') || $with === 'fetch';
}

function finish(int $code, string $message, bool $ok)
{
    if (wants_json()) {
        http_response_code($code);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => $ok, 'message' => $message]);
    } elseif ($ok) {
        header('Location: ' . url('thanks'), true, 303);
    } else {
        http_response_code($code);
        header('Content-Type: text/plain; charset=utf-8');
        echo $message;
    }
    exit;
}

/**
 * Hand the message to the mail transport.
 *
 * TERK_MAIL_SINK is a development affordance only: set that environment
 * variable to a file path and messages are written there instead of sent, so
 * the whole path can be exercised on a machine with no mail server. It is
 * never set in production, where this is a plain mail() call.
 */
function deliver(string $to, string $subject, string $body, string $headers): bool
{
    $sink = getenv('TERK_MAIL_SINK');
    if ($sink) {
        $record = "=== " . gmdate('c') . " ===\nTo: {$to}\nSubject: {$subject}\n{$headers}\n\n{$body}\n\n";
        return (bool) file_put_contents($sink, $record, FILE_APPEND);
    }
    return @mail($to, $subject, $body, $headers);
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    finish(405, 'Method not allowed.', false);
}

/* Honeypot. Hidden from people and left empty by them; bots fill it in.
   Accept silently so the sender learns nothing, but send nothing. */
if (trim((string) ($_POST['website'] ?? '')) !== '') {
    finish(200, 'Thank you. Your enquiry has been sent.', true);
}

/**
 * Cap a string's length without depending on mbstring, which is not guaranteed
 * on shared hosting. When mb_substr is missing, cut on bytes and then drop any
 * trailing partial UTF-8 sequence so the result is never invalid UTF-8.
 */
function clip(string $value, int $max): string
{
    if (function_exists('mb_substr')) {
        return mb_substr($value, 0, $max, 'UTF-8');
    }
    if (strlen($value) <= $max) {
        return $value;
    }
    $value = substr($value, 0, $max);
    // Continuation bytes (10xxxxxx) at the end mean the character is cut short.
    while ($value !== '' && (ord($value[strlen($value) - 1]) & 0xC0) === 0x80) {
        $value = substr($value, 0, -1);
    }
    // A lead byte left at the end has lost its continuation bytes.
    if ($value !== '' && (ord($value[strlen($value) - 1]) & 0x80) !== 0) {
        $value = substr($value, 0, -1);
    }
    return $value;
}

/**
 * Read a field.
 *
 * The order here matters. Control characters are stripped with a byte-wise
 * pattern that carries no /u modifier, because a unicode pattern returns null
 * on malformed input and would hand back the raw string unsanitised, which is
 * precisely the case that must not slip through. Only once the value is known
 * to be well-formed UTF-8 does anything unicode-aware touch it.
 *
 * Single-line fields lose every line break, so a name cannot forge a mail
 * header or scramble the body's field list. Only the scope of work keeps its
 * line breaks, where they carry meaning.
 */
function field(string $key, int $max, bool $multiline = false): string
{
    $value = (string) ($_POST[$key] ?? '');

    // 1. Byte-wise control-character strip. Cannot fail on any input.
    $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $value);

    // 2. Line breaks: normalised for the scope of work, flattened elsewhere.
    if ($multiline) {
        $value = str_replace(["\r\n", "\r"], "\n", $value);
        $value = preg_replace('/\n{3,}/', "\n\n", $value);
    } else {
        $value = str_replace(["\r", "\n", "\t"], ' ', $value);
        $value = preg_replace('/ {2,}/', ' ', $value);
    }

    // 3. Guarantee valid UTF-8, since the message declares that charset.
    //    Malformed input keeps its ASCII and loses the rest, rather than
    //    producing a message no mail client can render.
    if (!preg_match('//u', $value)) {
        $value = preg_replace('/[\x80-\xFF]/', '', $value);
    }

    return clip(trim($value), $max);
}

$name    = field('name', 120);
$company = field('company', 160);
$email   = field('email', 200);
$phone   = field('phone', 60);
$service = field('service', 120);
$message = field('message', 6000, true);

$missing = [];
if ($name === '')    { $missing[] = 'your name'; }
if ($company === '') { $missing[] = 'company'; }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $missing[] = 'a valid email address'; }
if ($message === '') { $missing[] = 'the scope of work'; }

if ($missing) {
    finish(422, 'Please add ' . implode(', ', $missing) . '.', false);
}

/* Anything that lands in a mail header is stripped to a safe character set
   first. The body carries the submitted text as written. */
$headerEmail = preg_replace('/[^A-Za-z0-9._%+\-@]/', '', $email);

/* A display name is included only when it is unremarkable. Anything carrying
   quotes, angle brackets, colons or control characters is dropped rather than
   escaped, so no crafted name can shape the Reply-To line. */
$headerName = preg_match('/^[\p{L}\p{M} .\'\-]{1,80}$/u', $name) ? $name : '';

/* The From domain is a constant. HTTP_HOST is client-supplied and must never
   reach a mail header. */
$domain = TERK_MAIL_DOMAIN;

/* Host is recorded in the body only, for diagnostics, and sanitised anyway. */
$host = preg_replace('/[^A-Za-z0-9.\-:]/', '', $_SERVER['HTTP_HOST'] ?? TERK_MAIL_DOMAIN);

$subject = str_replace(["\r", "\n"], ' ', sprintf(
    '[%s] Enquiry: %s (%s)',
    TERK_NAME,
    $service !== '' ? $service : 'General',
    $company
));

$rule = str_repeat('-', 46);
$body = implode("\n", [
    'New enquiry from the ' . TERK_NAME . ' website.',
    '',
    'Name:         ' . $name,
    'Company:      ' . $company,
    'Email:        ' . $email,
    'Telephone:    ' . ($phone !== '' ? $phone : 'Not given'),
    'Service line: ' . ($service !== '' ? $service : 'Not stated'),
    '',
    'Scope of work',
    $rule,
    $message,
    $rule,
    'Received ' . gmdate('Y-m-d H:i') . ' UTC via ' . $host,
]);

$headers = implode("\r\n", [
    'From: ' . TERK_NAME . ' website <no-reply@' . $domain . '>',
    'Reply-To: ' . ($headerName !== '' ? '"' . $headerName . '" ' : '') . '<' . $headerEmail . '>',
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
]);

if (deliver(ENQUIRY_TO, $subject, $body, $headers)) {
    finish(200, 'Thank you. Your enquiry has been sent and we will reply to ' . $email . '.', true);
}

finish(500, 'The message could not be sent. Please email ' . ENQUIRY_TO . ' directly.', false);
