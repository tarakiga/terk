<?php
/**
 * Terk Energy mail credentials: TEMPLATE.
 *
 * ---------------------------------------------------------------------------
 * DO NOT put the real credentials in this file, and do not put the real file
 * inside the website folder. Copy it, fill it in, and upload the copy ONE
 * LEVEL ABOVE public_html, in your home directory:
 *
 *     /home/uXXXXXXXX/mail-config.php        <-- the real one, with the password
 *     /home/uXXXXXXXX/public_html/           <-- the website
 *
 * Nothing above public_html is reachable over the web, so the password cannot
 * be served even if PHP is misconfigured or stops executing. After uploading,
 * set the permissions to 600 (owner read/write only).
 *
 * send.php looks for it in this order:
 *   1. the path in the TERK_MAIL_CONFIG environment variable
 *   2. one level above the document root   <-- recommended
 *   3. one level above the project folder
 *   4. inside the project folder           <-- works, but least protected
 * ---------------------------------------------------------------------------
 */

return [
    // Titan (the mail service bundled with many Nigerian hosting accounts).
    'smtp_host' => 'smtp.titan.email',

    // 465 = implicit TLS, the usual choice. If the host blocks it, use 587,
    // which starts plain and upgrades with STARTTLS.
    'smtp_port' => 465,

    // Optional. Leave unset and it is derived from the port:
    // 465 -> 'ssl', 587 -> 'tls', 25 -> 'none'.
    // 'smtp_secure' => 'ssl',

    // The full mailbox address, not just the part before the @.
    'smtp_user' => 'info@terkenergy.com',

    // The mailbox password. If the account has two-factor authentication,
    // generate an app-specific password instead of using the login password.
    'smtp_pass' => '',

    // Must be an address the account above is allowed to send as, or the
    // message will be rejected or fail SPF and land in spam.
    'from_email' => 'info@terkenergy.com',
    'from_name'  => 'Terk Energy',

    // Where enquiries are delivered. Change to route them elsewhere.
    'to_email' => 'info@terkenergy.com',

    // A secret of your choosing. smtp-test.php will not run without it, so the
    // diagnostic cannot be triggered by anyone who finds the URL.
    'test_token' => '',
];
