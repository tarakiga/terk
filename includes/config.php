<?php
/**
 * Terk Energy: site-wide constants and helpers.
 *
 * Everything that appears on more than one page lives here. Change a phone
 * number or a nav label once and every page follows.
 */

if (!defined('TERK')) {
    http_response_code(404);
    exit;
}

/* --- Contact details. The only verified Terk facts on file. --------------- */
const TERK_NAME      = 'Terk Energy';
const TERK_EMAIL     = 'info@terkenergy.com';
const TERK_PHONE     = '+234 817 014 1009';
const TERK_PHONE_TEL = '+2348170141009';
const TERK_WEB       = 'www.terkenergy.com';

/**
 * TERK-PLACEHOLDER 19: the live origin, used to build absolute og:url and
 * og:image values. Without an absolute URL no link preview renders when a page
 * is pasted into an email or a Teams thread, which is exactly how a vendor link
 * travels inside a procurement team. Confirm this is the real domain.
 */
const TERK_ORIGIN = 'https://www.terkenergy.com';

/**
 * The domain used in the From address of outgoing enquiry mail. Deliberately a
 * constant rather than $_SERVER['HTTP_HOST']: the Host header is supplied by
 * the client and must never reach a mail header. Set this to the domain the
 * site is actually served from, or delivery may fail SPF checks.
 */
const TERK_MAIL_DOMAIN = 'terkenergy.com';

/* --- Navigation. Order here is order on screen, in the footer, everywhere. */
const TERK_NAV = [
    ''         => 'Home',
    'about'    => 'About',
    'services' => 'Services',
    'hsse'     => 'HSSE &amp; Quality',
    'contact'  => 'Contact',
];

/** Escape for HTML output. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** A clean, extensionless site URL. `.htaccess` maps these onto the .php files. */
function url(string $slug = ''): string
{
    return $slug === '' ? '/' : '/' . ltrim($slug, '/');
}
