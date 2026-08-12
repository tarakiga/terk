<?php
/** Terk Energy: site footer and the closing tags. */

if (!defined('TERK')) {
    http_response_code(404);
    exit;
}

require_once __DIR__ . '/config.php';
?>
<footer class="foot">
  <div class="shell foot__top">
    <div>
      <div class="foot__mark">
        <img src="/assets/img/terk-mark.png" alt="" width="416" height="563">
        <span class="brand__name">Terk <span>Energy</span></span>
      </div>
      <p class="foot__blurb">An indigenous integrated energy services company working across the Nigerian oil and gas value chain, offshore and onshore.</p>
    </div>

    <nav aria-labelledby="f-nav">
      <h2 id="f-nav">Company</h2>
      <ul>
<?php foreach (TERK_NAV as $navSlug => $navLabel): ?>
<?php   if ($navSlug === '') { continue; } ?>
        <li><a href="<?= url($navSlug) ?>"><?= $navLabel ?></a></li>
<?php endforeach; ?>
      </ul>
    </nav>

    <div>
      <h2 id="f-contact">Contact</h2>
      <ul aria-labelledby="f-contact">
        <li><a href="mailto:<?= e(TERK_EMAIL) ?>"><?= e(TERK_EMAIL) ?></a></li>
        <li><a href="tel:<?= e(TERK_PHONE_TEL) ?>"><?= e(TERK_PHONE) ?></a></li>
        <li><a href="tel:<?= e(TERK_PHONE_2_TEL) ?>"><?= e(TERK_PHONE_2) ?></a></li>
        <li><a href="https://<?= e(TERK_WEB) ?>"><?= e(TERK_WEB) ?></a></li>
      </ul>
    </div>
  </div>

  <div class="shell foot__base">
    <p>&copy; <?= date('Y') ?> <?= e(TERK_NAME) ?>. All rights reserved.</p>
    <p>Nigeria</p>
  </div>
</footer>

<script src="/assets/js/terk.js?v=<?= TERK_ASSETS ?>" defer></script>
</body>
</html>
