<?php
/**
 * Local development router. NOT used in production.
 *
 * PHP's built-in server ignores .htaccess, so this reproduces its clean-URL
 * behaviour for local preview:
 *
 *   php -S localhost:4173 router.php
 *
 * On a real Apache host the .htaccess file does this job and router.php is
 * never touched. It is safe to upload, and equally safe to delete.
 */

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
$root = __DIR__;

// Never expose the includes directory, matching the .htaccess rule.
if (str_starts_with($path, '/includes/') || str_starts_with($path, '/ref/')) {
    http_response_code(404);
    require $root . '/404.php';
    return true;
}

// Let the built-in server handle real files: css, js, images, fonts.
$file = realpath($root . $path);
if ($path !== '/' && $file && is_file($file) && !str_ends_with($file, '.php')) {
    return false;
}

// Home.
if ($path === '/' || $path === '') {
    require $root . '/index.php';
    return true;
}

// Extensionless -> .php
$candidate = $root . '/' . trim($path, '/') . '.php';
if (is_file($candidate)) {
    require $candidate;
    return true;
}

// A direct .php request still works, exactly as it does behind the rewrite.
if (is_file($root . $path) && str_ends_with($path, '.php')) {
    require $root . $path;
    return true;
}

http_response_code(404);
require $root . '/404.php';
return true;
