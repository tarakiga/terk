<?php
/**
 * Terk Energy: document head, icon sprite and masthead.
 *
 * Every page sets $page before requiring this file:
 *   slug   the nav key, '' for home. Drives <link rel=canonical> and aria-current.
 *   title  the browser title, without the company name.
 *   desc   the meta description and og:description.
 *   image  a filename in assets/img/ for og:image.
 *   noindex  optional bool, for pages that should stay out of search results.
 */

if (!defined('TERK')) {
    http_response_code(404);
    exit;
}

require_once __DIR__ . '/config.php';

$slug    = $page['slug']  ?? '';
$title   = $page['title'] ?? '';
$desc    = $page['desc']  ?? '';
/**
 * The link-share card: the mark, the name and the contact details on the
 * plate. It is the default for every page rather than a photograph, because
 * the common case is the address being pasted into WhatsApp, where the preview
 * is often cropped to a centred square and read at thumbnail size. A branded
 * card survives that; a photograph of a platform does not. Set 'image' on a
 * page to override it with a filename from assets/img/.
 */
$image   = $page['image'] ?? 'og-card.jpg';
$noindex = !empty($page['noindex']);

$fullTitle = $slug === '' && $title !== ''
    ? TERK_NAME . ' | ' . $title
    : ($title !== '' ? $title . ' | ' . TERK_NAME : TERK_NAME);

$canonical = TERK_ORIGIN . url($slug);
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($fullTitle) ?></title>
<meta name="description" content="<?= e($desc) ?>">
<?php if ($noindex): ?>
<meta name="robots" content="noindex">
<?php endif; ?>
<meta name="theme-color" content="#0c141e">
<link rel="canonical" href="<?= e($canonical) ?>">
<link rel="icon" href="/assets/img/terk-mark.png" type="image/png">
<link rel="apple-touch-icon" href="/assets/img/terk-mark.png">
<link rel="preload" href="/assets/fonts/archivo-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="/assets/css/terk.css?v=<?= TERK_ASSETS ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e(TERK_NAME) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:title" content="<?= e($fullTitle) ?>">
<meta property="og:description" content="<?= e($desc) ?>">
<meta property="og:image" content="<?= e(TERK_ORIGIN) ?>/assets/img/<?= e($image) ?>">
<meta property="og:image:type" content="image/jpeg">
<?php if ($image === 'og-card.jpg'): /* Dimensions are declared only for the card, whose size is known. */ ?>
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?= e(TERK_NAME) ?>. <?= e(TERK_EMAIL) ?>. <?= e(TERK_PHONE) ?>. <?= e(TERK_PHONE_2) ?>.">
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<script>document.documentElement.className += ' js';</script>
</head>
<body>

<!--
THESIS: A services contractor's capability statement at the craft level of the majors' own vendor portals, refusing the interchangeable version: centred sentence over a dusk platform, three same-size icon cards, a four-stat counter row.
OWN-WORLD: Warm-neutral paper alternating with blue-black plates; gold hairlines as the only structural ornament; one variable grotesque worked across its width axis: expanded for display, condensed tracked caps for labels; every photograph pushed through one desaturated blue-black grade so ten stock frames read as a single art direction.
STORY: An indigenous integrated energy services company; EPCIC, marine and logistics, advisory; it takes defined scope and holds the schedule; here is how to reach it.
FIRST VIEWPORT: Full-bleed offshore silhouette under a blue-black grade, transparent header, the offer left-ranged at display scale, two actions, and a gold-ruled index of the three service lines pinned across the base of the viewport.
FORM: The category standard played straight, user-pinned by the steer "something more corporate like a petroleum company" after two re-rolls; seed key 31f4148f.
FINISH: unreviewed and undocumented is unfinished; this build ends with the finish review, the verdict, and DESIGN.md
-->

<svg class="sprite" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><defs>
<symbol id="i-epcic" viewBox="0 0 24 24"><path d="M4 21 12 3l8 18M7.6 13h8.8M5.9 17.2h12.2M12 8.5V21"/></symbol>
<symbol id="i-marine" viewBox="0 0 24 24"><path d="M3.2 14.4h17.6L18 20H6zM12 14.4V4.2M12 6.4h6l-2.4 2.4L18 11.2h-6M2.5 22c1.6-1.1 3.2-1.1 4.8 0s3.2 1.1 4.8 0 3.2-1.1 4.8 0 3.2 1.1 4.8 0"/></symbol>
<symbol id="i-advisory" viewBox="0 0 24 24"><path d="M5 2.8h9.4L19.2 7v14.2H5zM14.2 2.8V7h5M8 16.6l2.9-3.2 2 2.1 3.3-4"/></symbol>
<symbol id="i-arrow" viewBox="0 0 24 24"><path d="M3.5 12h17M14 5.5l6.5 6.5L14 18.5"/></symbol>
<symbol id="i-tick" viewBox="0 0 24 24"><path d="M4 12.6 9.1 17.7 20 6.8"/></symbol>
<symbol id="i-mail" viewBox="0 0 24 24"><path d="M2.8 4.8h18.4v14.4H2.8zM2.8 4.8 12 13l9.2-8.2"/></symbol>
<symbol id="i-phone" viewBox="0 0 24 24"><path d="M7.4 2.8 10 7.6l-2.2 2c1 2.4 3.2 4.6 5.6 5.6l2-2.2 4.8 2.6v4.4c-8.2.4-16-7.4-15.6-15.6z"/></symbol>
<symbol id="i-globe" viewBox="0 0 24 24"><path d="M12 2.6a9.4 9.4 0 1 0 0 18.8 9.4 9.4 0 0 0 0-18.8zM2.8 12h18.4M12 2.6c5 5.2 5 13.6 0 18.8-5-5.2-5-13.6 0-18.8z"/></symbol>
<symbol id="i-pin" viewBox="0 0 24 24"><path d="M12 21.6c4.4-5 6.6-8.6 6.6-11.6a6.6 6.6 0 1 0-13.2 0c0 3 2.2 6.6 6.6 11.6zM12 12.6a2.6 2.6 0 1 0 0-5.2 2.6 2.6 0 0 0 0 5.2z"/></symbol>
</defs></svg>

<a class="skip" href="#main">Skip to content</a>

<header class="masthead">
  <div class="shell masthead__in">
    <a class="brand" href="<?= url() ?>" aria-label="<?= e(TERK_NAME) ?> home">
      <img src="/assets/img/terk-mark.png" alt="" width="416" height="563">
      <span class="brand__name">Terk <span>Energy</span></span>
    </a>

    <nav class="nav" id="nav" aria-label="Main">
<?php foreach (TERK_NAV as $navSlug => $navLabel): ?>
      <a href="<?= url($navSlug) ?>"<?= $navSlug === $slug ? ' aria-current="page"' : '' ?>><?= $navLabel ?></a>
<?php endforeach; ?>
<?php /* An evaluator comparing vendors in one sitting wants the document, not a
         form. On the contact page the form is already in front of them, so the
         action there is the direct address instead. */ ?>
<?php if ($slug === 'contact'): ?>
      <a class="btn btn--gold" href="mailto:<?= e(TERK_EMAIL) ?>">Email us directly</a>
<?php else: ?>
      <a class="btn btn--gold" href="<?= TERK_PROFILE ?>" download>Download company profile</a>
<?php endif; ?>
    </nav>

<?php if ($slug === 'contact'): ?>
    <a class="btn btn--gold" href="mailto:<?= e(TERK_EMAIL) ?>">Email us directly</a>
<?php else: ?>
    <a class="btn btn--gold" href="<?= TERK_PROFILE ?>" download>Download company profile</a>
<?php endif; ?>

    <button class="burger" type="button" aria-expanded="false" aria-controls="nav">
      <span class="burger__txt">Menu</span>
    </button>
  </div>
</header>
