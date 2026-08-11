<?php
define('TERK', true);
$page = [
    'slug'  => '',
    'title' => 'Integrated energy services, offshore and onshore',
    'desc'  => 'Terk Energy is an indigenous integrated energy services company working across the Nigerian oil and gas value chain: EPCIC services, marine and logistics, and advisory and consultancy.',
    'image' => 'hero-offshore.jpg',
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">

  <!-- ================= HERO ================= -->
  <section class="hero">
    <div class="hero__ph ph--flat">
      <!-- TERK-PLACEHOLDER 01: stock offshore silhouette. Replace with Terk's own operations photography. -->
      <img src="/assets/img/hero-offshore.jpg" alt="" width="1920" height="2560" fetchpriority="high">
    </div>

    <div class="shell hero__body">
      <h1 class="display">Integrated energy services, offshore and onshore.</h1>
      <p class="hero__lead">Terk Energy works across the Nigerian oil and gas value chain: engineering and construction, marine and logistics, advisory. We execute the scope, and where a project calls for it, we carry the funding with it.</p>
      <div class="actions">
        <a class="btn btn--gold" href="/services">Our capabilities <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a>
        <a class="btn btn--ghost" href="/contact">Tell us your scope</a>
      </div>
    </div>

    <div class="index">
      <div class="shell">
        <div class="index__grid">
          <a class="index__item" href="/services#epcic">
            <svg class="ico" aria-hidden="true"><use href="#i-epcic"></use></svg>
            <span class="index__name">EPCIC Services
              <span class="index__note">Engineering, procurement, construction, installation and commissioning.</span>
            </span>
          </a>
          <a class="index__item" href="/services#marine">
            <svg class="ico" aria-hidden="true"><use href="#i-marine"></use></svg>
            <span class="index__name">Marine &amp; Logistics
              <span class="index__note">Alternative crude evacuation, vessel supply, offshore support.</span>
            </span>
          </a>
          <a class="index__item" href="/services#advisory">
            <svg class="ico" aria-hidden="true"><use href="#i-advisory"></use></svg>
            <span class="index__name">Advisory &amp; Consultancy
              <span class="index__note">Asset development, due diligence, gas commercialization.</span>
            </span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= THE COMPANY ================= -->
  <section class="band" aria-labelledby="company">
    <div class="shell">
      <div class="split split--wide-text" data-reveal-group>
        <div>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="company" data-reveal style="margin-top:1.6rem">An indigenous integrated energy company.</h2>
          <div class="prose" data-reveal style="margin-top:1.6rem">
            <p>Terk Energy serves the Nigerian oil and gas value chain, offshore and onshore. Our offering covers engineering, procurement, construction, installation and commissioning; the operation, maintenance and upgrade of oil and gas facilities; alternative crude evacuation; maritime and logistics solutions; and asset development.</p>
            <p>We are committed to safety and to sustainability. Working alongside our technical partners, we meet client requirements on schedule and to specification, without trading either against the other.</p>
            <p>Our understanding of the value chain, our strategic partnerships and our technical capacity equip us to take on diverse projects and deliver them to standard.</p>
          </div>
          <p style="margin-top:2rem" data-reveal><a class="link" href="/about">More about the company <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a></p>
        </div>

        <div class="ph" data-reveal style="aspect-ratio:4/5">
          <!-- TERK-PLACEHOLDER 02: stock pipe yard. Replace with Terk's own yard or project photography. -->
          <img src="/assets/img/pipeyard.jpg" alt="Steel tubulars racked in an industrial storage yard beneath an overhead crane." width="2000" height="1500" loading="lazy">
        </div>
      </div>
    </div>
  </section>

  <!-- ================= VISION / MISSION ================= -->
  <section class="plate band" aria-labelledby="vision">
    <div class="shell">
      <div class="statement" data-reveal-group>
        <div>
          <h2 class="label" id="vision" data-reveal>Vision and mission</h2>
        </div>
        <div>
          <p class="pull" data-reveal>To be a leading integrated energy service provider in Africa.</p>
          <hr class="rule" data-reveal style="margin:clamp(2rem,3.5vw,3rem) 0">
          <p class="prose" data-reveal style="max-width:56ch">Our mission is to create a reputable organization through hard work and diligence, whilst making a positive impact on our community and our environment.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= CAPABILITIES ================= -->
  <section aria-labelledby="capabilities">
    <div class="shell band band--tight">
      <div class="head" style="margin-bottom:0">
        <hr class="rule" data-reveal>
        <h2 class="h2" id="capabilities" data-reveal style="margin-top:1.6rem">What we do</h2>
        <p class="lead" data-reveal style="margin-top:1.35rem">Three service lines, delivered with our technical partners across onshore and offshore assets.</p>
      </div>
    </div>

    <div class="stratum band band--tight">
      <div class="shell">
        <div class="stratum__grid" data-reveal-group>
          <div class="ph" data-reveal>
            <!-- TERK-PLACEHOLDER 03: stock fabrication photograph. Replace with Terk's own construction work. -->
            <img src="/assets/img/welding.jpg" alt="A welder joining steel sections during fabrication work." width="2000" height="1334" loading="lazy">
          </div>
          <div>
            <h3 class="h2" data-reveal>EPCIC Services</h3>
            <p class="stratum__body" data-reveal>From front-end engineering design through to commissioning, we take fixed-scope responsibility on onshore and offshore facilities, and carry procurement and construction with it.</p>
            <ul class="scope scope--two" data-reveal>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>FEED and detailed engineering design</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Pipeline construction and maintenance</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Procurement of OCTG, wellheads and pumps</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Structural, civil and mechanical engineering and construction</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Heavy-duty equipment supply, installation and maintenance</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Upgrade of onshore and offshore production facilities</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Clean energy solutions</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="stratum stratum--flip band band--tight">
      <div class="shell">
        <div class="stratum__grid" data-reveal-group>
          <div class="ph" data-reveal>
            <!-- TERK-PLACEHOLDER 04: stock tanker photograph. Replace with Terk's own marine operations. -->
            <img src="/assets/img/tanker.jpg" alt="A laden oil tanker under way on open water at dusk." width="1600" height="1200" loading="lazy">
          </div>
          <div>
            <h3 class="h2" data-reveal>Marine &amp; Logistics Services</h3>
            <p class="stratum__body" data-reveal>We move crude and cargo. Our alternative crude evacuation runs end to end, covering clearance, security, shuttle tanker, ship-to-ship transfer and hydrocarbon accounting, all under one point of responsibility.</p>
            <ul class="scope scope--two" data-reveal>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Alternative Crude Evacuation System (ACES)</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Marine vessel supply and operations</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Offshore construction and installation</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Offshore operations support services</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Land and marine logistics support</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="stratum band band--tight">
      <div class="shell">
        <div class="stratum__grid" data-reveal-group>
          <div class="ph" data-reveal>
            <!-- TERK-PLACEHOLDER 05: stock planning photograph. Replace with Terk's own team. -->
            <img src="/assets/img/advisory.jpg" alt="Two people in hard hats reviewing a technical drawing on site." width="2000" height="1333" loading="lazy">
          </div>
          <div>
            <h3 class="h2" data-reveal>Advisory &amp; Consultancy Services</h3>
            <p class="stratum__body" data-reveal>Technical and commercial judgement for assets and transactions, from due diligence through to gas commercialization.</p>
            <ul class="scope scope--two" data-reveal>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Asset development advisory and consulting</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Technical, commercial and regulatory due diligence</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Tailored end-to-end alternative crude evacuation solutions</li>
              <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Gas commercialization</li>
            </ul>
            <p style="margin-top:2.25rem" data-reveal><a class="link" href="/services">Full scope of services <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= VALUE PROPOSITION ================= -->
  <section class="plate band" aria-labelledby="value">
    <div class="shell shell--text">
      <div class="head">
        <hr class="rule" data-reveal>
        <h2 class="h2" id="value" data-reveal style="margin-top:1.6rem">What a client gets when they award us the work.</h2>
      </div>

      <ul class="rows rows--gold" data-reveal-group>
        <li data-reveal>
          <span class="rows__term">Our intent</span>
          <span class="rows__def">To support our clients' objective to be leading players in the energy industry, and to become a trusted project delivery partner and services contractor.</span>
        </li>
        <li data-reveal>
          <span class="rows__term">Technical responsibility</span>
          <span class="rows__def">We work continually to hold the technical capacity to deliver quality service on our clients' projects in the safest, most economical, innovative and efficient manner.</span>
        </li>
        <!-- TERK-CONFIRM 01: funding capability. Carried over from the reference profile's value proposition. Confirm this is true of Terk Energy, add any limits (project size, instrument type), then delete the .unconfirmed span. -->
        <li data-reveal>
          <span class="rows__term">Financial responsibility <span class="unconfirmed">Confirm before publishing</span></span>
          <span class="rows__def">Terk Energy is financially viable and, where a project requires it, capable of providing a funding solution so that delivery is not held up waiting on cash release.</span>
        </li>
        <li data-reveal>
          <span class="rows__term">Competitive advantage</span>
          <span class="rows__def">In-depth client understanding, a customer-focused and value-oriented approach, and strategic partnerships that give us execution speed and reduced downtime.</span>
        </li>
      </ul>
    </div>
  </section>

  <!-- ================= HSSE ================= -->
  <section class="band" aria-labelledby="hsse">
    <div class="shell">
      <div class="split split--flip" data-reveal-group>
        <div class="ph" data-reveal>
          <!-- TERK-PLACEHOLDER 06: stock site-safety photograph. Replace with Terk's own HSE activity. -->
          <img src="/assets/img/hsse.jpg" alt="Two workers in personal protective equipment reviewing a checklist on an industrial site." width="2000" height="3000" loading="lazy">
        </div>
        <div>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="hsse" data-reveal style="margin-top:1.6rem">Safety carries the same priority as the schedule.</h2>
          <div class="prose" data-reveal style="margin-top:1.6rem">
            <p>We allocate time and resources to health, safety, security and environment as a matter of leadership, and we give HSSE equal priority with work completion and milestone achievement.</p>
            <p>That means a safe work environment and safe equipment, qualified and trained staff, funded provision of personal protective equipment, and HSSE in our audits, inspections and reviews rather than alongside them.</p>
          </div>
          <p style="margin-top:2rem" data-reveal><a class="link" href="/hsse">Our HSSE and quality commitments <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a></p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= CLOSE ================= -->
  <section class="plate band" aria-labelledby="close">
    <div class="shell">
      <div class="split" data-reveal-group>
        <div>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="close" data-reveal style="margin-top:1.6rem">Tell us the scope.</h2>
          <p class="lead" data-reveal style="margin-top:1.35rem">Send us the tender document, the scope of work, or the problem you are trying to solve. We will tell you plainly whether it is work we can take.</p>
          <div class="actions" data-reveal style="margin-top:2.35rem">
            <a class="btn btn--gold" href="/contact">Start a conversation <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a>
          </div>
        </div>
        <div data-reveal>
          <dl class="detail">
            <div>
              <dt>Email</dt>
              <dd><a href="mailto:info@terkenergy.com">info@terkenergy.com</a></dd>
            </div>
            <div>
              <dt>Telephone</dt>
              <dd><a href="tel:+2348170141009">+234 817 014 1009</a></dd>
            </div>
            <div>
              <dt>Web</dt>
              <dd><a href="https://www.terkenergy.com">www.terkenergy.com</a></dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </section>

</main>
<?php require __DIR__ . '/includes/footer.php';
