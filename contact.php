<?php
define('TERK', true);
$page = [
    'slug'  => 'contact',
    'title' => 'Contact',
    'desc'  => 'Contact Terk Energy about a scope of work, a tender, or a pre-qualification. info@terkenergy.com',
    'image' => 'refinery.jpg',
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">

  <section class="pagehead">
    <div class="pagehead__ph">
      <!-- TERK-PLACEHOLDER 17: stock refinery photograph. Replace with Terk's own facility or office. -->
      <img src="/assets/img/refinery.jpg" alt="" width="1600" height="1065" fetchpriority="high">
    </div>
    <div class="shell">
      <nav class="crumbs" aria-label="Breadcrumb">
        <a href="/">Home</a><span aria-hidden="true">/</span><span>Contact</span>
      </nav>
      <h1 class="display">Tell us the scope.</h1>
      <p class="lead">Send the tender document, the scope of work, or the problem. We will tell you plainly whether it is work we can take, and who will handle it.</p>
    </div>
  </section>

  <section class="band" aria-labelledby="reach">
    <div class="shell">
      <div class="contactgrid">

        <div data-reveal-group>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="reach" data-reveal style="margin-top:1.6rem">Reach us directly</h2>
          <p class="lead" data-reveal style="margin-top:1.35rem">Email and phone are answered. If your enquiry is time-bound, say so in the subject line.</p>

          <dl class="detail" data-reveal style="margin-top:2.5rem">
            <div><dt>Email</dt><dd><a href="mailto:info@terkenergy.com">info@terkenergy.com</a></dd></div>
            <div><dt>Telephone</dt><dd><a href="tel:+2348170141009">+234 817 014 1009</a></dd></div>
            <div><dt>Web</dt><dd><a href="https://www.terkenergy.com">www.terkenergy.com</a></dd></div>
          </dl>

          <div class="tbc" data-reveal style="margin-top:2.5rem">
            <b>Offices to be supplied</b>
            Registered and operating office addresses are not published here. Nothing has been carried across from the reference company profile; those addresses belong to a different company. Send us yours and they will be listed with the details above.
          </div>
        </div>

        <div data-reveal>
          <!-- TERK-PLACEHOLDER 20: the "Request a capability statement" action in the
               header of every page lands here. An evaluator comparing vendors in one
               sitting wants the document immediately, not a form. Once Terk's capability
               statement PDF exists, put it in assets/, change that header action to link
               to it directly, and leave this form for scope-specific enquiries. -->
          <hr class="rule">
          <h2 class="h2" id="enquiry" style="margin-top:1.6rem;margin-bottom:1.6rem">Send an enquiry</h2>

          <!--
            FORM ENDPOINT. This posts to /send (send.php), which mails
            info@terkenergy.com. Works on any host running PHP, which includes
            standard cPanel and shared hosting.

            If the site is ever moved to a host WITHOUT PHP, delete send.php and
            swap the action for one of:
              · Netlify   add  data-netlify="true"  to the <form> tag below
              · Formspree action="https://formspree.io/f/XXXXXXXX"
            Nothing else changes: terk.js detects an absolute URL or a Netlify
            attribute and stands aside, and if no handler answers at all it
            falls back to composing the enquiry as an email.
          -->
          <form id="enquiry-form" action="<?= url('send') ?>" method="post" novalidate>

            <!-- Honeypot. Hidden from people, filled in by bots; send.php
                 silently discards any submission that carries a value here. -->
            <div class="hp" aria-hidden="true">
              <label for="f-website">Leave this field empty</label>
              <input type="text" id="f-website" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="field">
              <label for="f-name">Your name</label>
              <input type="text" id="f-name" name="name" autocomplete="name" required>
              <span class="err">Enter the name we should reply to.</span>
            </div>

            <div class="field">
              <label for="f-org">Company</label>
              <input type="text" id="f-org" name="company" autocomplete="organization" required>
              <span class="err">Enter the company you are writing on behalf of.</span>
            </div>

            <div class="field">
              <label for="f-email">Email</label>
              <input type="email" id="f-email" name="email" autocomplete="email" required>
              <span class="err">Enter a valid email address, e.g. name@company.com</span>
            </div>

            <div class="field">
              <label for="f-phone">Telephone <span class="opt">(optional)</span></label>
              <input type="tel" id="f-phone" name="phone" autocomplete="tel">
            </div>

            <div class="field">
              <label for="f-line">What is this about?</label>
              <select id="f-line" name="service" required>
                <option value="">Select a service line</option>
                <option>Request the capability statement</option>
                <option>EPCIC Services</option>
                <option>Marine &amp; Logistics Services</option>
                <option>Advisory &amp; Consultancy Services</option>
                <option>Pre-qualification or vendor registration</option>
                <option>Something else</option>
              </select>
            </div>

            <div class="field">
              <label for="f-msg">Scope of work</label>
              <textarea id="f-msg" name="message" required placeholder="Describe the scope, the asset, and the timeline you are working to."></textarea>
              <span class="err">Tell us briefly what the work involves.</span>
            </div>

            <button class="btn btn--gold" type="submit"><span class="btn__label">Send enquiry</span> <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></button>

            <p class="formnote" role="status" aria-live="polite">Your enquiry goes straight to info@terkenergy.com. We do not pass it to anyone else.</p>
          </form>
        </div>

      </div>
    </div>
  </section>

</main>
<?php require __DIR__ . '/includes/footer.php';
