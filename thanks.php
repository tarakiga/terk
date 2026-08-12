<?php
define('TERK', true);
$page = [
    'slug'  => 'thanks',
    'title' => 'Enquiry received',
    'desc'  => 'Your enquiry has reached Terk Energy.',
    'noindex' => true,
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
  <section class="plate midpage">
    <div class="shell shell--text">
      <hr class="rule">
      <h1 class="display flow-180 measure-16">Your enquiry has reached us.</h1>
      <p class="lead flow-160">We read every scope that comes in and we will reply to the address you gave. If the work is time-bound and you have not heard back, call us on the numbers below and say so.</p>

      <dl class="detail flow-300 measure-34r">
        <div><dt>Email</dt><dd><a href="mailto:info@terkenergy.com">info@terkenergy.com</a></dd></div>
        <div><dt>Telephone</dt><dd><a href="tel:<?= e(TERK_PHONE_TEL) ?>"><?= e(TERK_PHONE) ?></a></dd><dd><a href="tel:<?= e(TERK_PHONE_2_TEL) ?>"><?= e(TERK_PHONE_2) ?></a></dd></div>
      </dl>

      <div class="actions flow-275">
        <a class="btn btn--gold" href="/">Back to the site <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a>
        <a class="btn btn--ghost" href="/services">Our capabilities</a>
      </div>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php';
