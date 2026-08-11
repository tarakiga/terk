<?php
define('TERK', true);
$page = [
    'slug'  => 'about',
    'title' => 'About',
    'desc'  => 'Terk Energy is an indigenous integrated energy services company serving the Nigerian oil and gas value chain. Our vision, mission, values and quality commitment.',
    'image' => 'platform.jpg',
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">

  <section class="pagehead">
    <div class="pagehead__ph">
      <!-- TERK-PLACEHOLDER 07: stock offshore platform. Replace with Terk's own asset photography. -->
      <img src="/assets/img/platform.jpg" alt="" width="1600" height="1200" fetchpriority="high">
    </div>
    <div class="shell">
      <nav class="crumbs" aria-label="Breadcrumb">
        <a href="/">Home</a><span aria-hidden="true">/</span><span>About</span>
      </nav>
      <h1 class="display">Built to take responsibility for the whole scope.</h1>
      <p class="lead">An indigenous integrated energy company serving the Nigerian oil and gas value chain, offshore and onshore.</p>
    </div>
  </section>

  <section class="band" aria-labelledby="who">
    <div class="shell">
      <div class="split split--wide-text" data-reveal-group>
        <div>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="who" data-reveal style="margin-top:1.6rem">Who we are</h2>
          <div class="prose" data-reveal style="margin-top:1.6rem">
            <p>Terk Energy is an indigenous integrated energy company. Our service offering includes, but is not limited to, EPCIC services; the operation, maintenance and upgrade of oil and gas facilities; alternative crude evacuation; maritime and logistics solutions; and asset development.</p>
            <p>Terk and its affiliates are committed to safety and to sustainability, and we continue to meet the demands of our clients efficiently: on schedule, to specification, and without shortcuts on either count.</p>
            <p>Our experience, our strategic partnerships and our understanding of the Nigerian oil and gas value chain, offshore and onshore, equip us with the technical expertise and the resources to deliver diverse projects when given the opportunity.</p>
          </div>
        </div>
        <div class="ph" data-reveal style="aspect-ratio:4/5">
          <!-- TERK-PLACEHOLDER 08: stock refinery photograph. Replace with Terk's own facility work. -->
          <img src="/assets/img/refinery.jpg" alt="A process plant lit at night, pipework and columns picked out against the dark." width="1600" height="1065" loading="lazy">
        </div>
      </div>
    </div>
  </section>

  <section class="plate band" aria-labelledby="vm">
    <div class="shell">
      <div class="statement" data-reveal-group>
        <div><h2 class="label" id="vm" data-reveal>Vision and mission</h2></div>
        <div>
          <p class="pull" data-reveal>To be a leading integrated energy service provider in Africa.</p>
          <hr class="rule" data-reveal style="margin:clamp(2rem,3.5vw,3rem) 0">
          <p class="prose" data-reveal style="max-width:56ch">Our mission is to create a reputable organization through hard work and diligence, whilst making a positive impact on our community and our environment.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="band" aria-labelledby="values">
    <div class="shell shell--text">
      <div class="head">
        <hr class="rule" data-reveal>
        <h2 class="h2" id="values" data-reveal style="margin-top:1.6rem">Our core values</h2>
        <p class="lead" data-reveal style="margin-top:1.35rem">Five commitments that decide how we take on work and how we behave once we have it.</p>
      </div>
      <ul class="rows rows--gold" data-reveal-group>
        <li data-reveal><span class="rows__term">Teamwork</span><span class="rows__def">We win together, leveraging diverse strengths for collective success.</span></li>
        <li data-reveal><span class="rows__term">Excellence</span><span class="rows__def">We hold ourselves to the highest standards in everything we do.</span></li>
        <li data-reveal><span class="rows__term">Customer obsession</span><span class="rows__def">We put our clients at the centre, always seeking to exceed expectations.</span></li>
        <li data-reveal><span class="rows__term">Ownership</span><span class="rows__def">We take responsibility, act with integrity, and deliver on our commitments.</span></li>
        <li data-reveal><span class="rows__term">Innovation</span><span class="rows__def">We constantly improve, adapt, and pioneer better solutions.</span></li>
      </ul>
    </div>
  </section>

  <section class="sunk band" aria-labelledby="org">
    <div class="shell shell--text">
      <div class="head">
        <hr class="rule" data-reveal>
        <h2 class="h2" id="org" data-reveal style="margin-top:1.6rem">How the company is organised</h2>
        <p class="lead" data-reveal style="margin-top:1.35rem">Delivery, assurance and commercial functions are held in-house rather than assembled per project.</p>
      </div>
      <ul class="scope scope--two" data-reveal>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>EPC project management</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Engineering and construction leadership</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Procurement</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>EHSSQ</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Vessel operations</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Shipping and chartering</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Gas and commercial analysis</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Finance, tax and project accounting</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Legal and corporate services</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Administration and human resources</li>
      </ul>
    </div>
  </section>

  <section class="plate band" aria-labelledby="close">
    <div class="shell">
      <div class="split" data-reveal-group>
        <div>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="close" data-reveal style="margin-top:1.6rem">Tell us the scope.</h2>
          <p class="lead" data-reveal style="margin-top:1.35rem">Send us the tender document, the scope of work, or the problem you are trying to solve.</p>
          <div class="actions" data-reveal style="margin-top:2.35rem">
            <a class="btn btn--gold" href="/contact">Start a conversation <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a>
            <a class="btn btn--ghost" href="/services">Our capabilities</a>
          </div>
        </div>
        <div data-reveal>
          <dl class="detail">
            <div><dt>Email</dt><dd><a href="mailto:info@terkenergy.com">info@terkenergy.com</a></dd></div>
            <div><dt>Telephone</dt><dd><a href="tel:+2348170141009">+234 817 014 1009</a></dd></div>
            <div><dt>Web</dt><dd><a href="https://www.terkenergy.com">www.terkenergy.com</a></dd></div>
          </dl>
        </div>
      </div>
    </div>
  </section>

</main>
<?php require __DIR__ . '/includes/footer.php';
