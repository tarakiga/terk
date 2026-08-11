<?php
define('TERK', true);
http_response_code(404);
$page = [
    'slug'    => '404',
    'title'   => 'Page not found',
    'desc'    => 'That page is not on the Terk Energy site.',
    'image'   => 'hero-offshore.jpg',
    'noindex' => true,
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">
  <section class="plate" style="min-height:74vh;display:flex;align-items:center;padding-block:var(--band)">
    <div class="shell shell--text">
      <hr class="rule">
      <h1 class="display" style="margin-top:1.8rem;max-width:14ch">That page is not here.</h1>
      <p class="lead" style="margin-top:1.6rem">The address may have changed, or the link that brought you here may be out of date. Everything on the site is one click away below.</p>

      <div class="actions" style="margin-top:2.75rem">
        <a class="btn btn--gold" href="<?= url() ?>">Back to the home page <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a>
        <a class="btn btn--ghost" href="<?= url('services') ?>">Our capabilities</a>
      </div>

      <p style="margin-top:3rem" class="lead">If you were looking for something specific, write to <a class="link" href="mailto:<?= e(TERK_EMAIL) ?>"><?= e(TERK_EMAIL) ?></a> and we will point you at it.</p>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php';
