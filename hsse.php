<?php
define('TERK', true);
$page = [
    'slug'  => 'hsse',
    'title' => 'HSSE &amp; Quality',
    'desc'  => "Terk Energy's health, safety, security and environment commitment, and our quality management commitment.",
    'image' => 'pipeyard.jpg',
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">

  <section class="pagehead">
    <div class="pagehead__ph">
      <!-- TERK-PLACEHOLDER 15: standing in with the yard photograph. The safety image
           this banner wants is a Terk toolbox talk or site inspection. Drop it in as
           assets/img/hsse.jpg and change the two references on this page back. -->
      <img src="/assets/img/pipeyard.jpg" alt="" width="2000" height="1500" fetchpriority="high">
    </div>
    <div class="shell">
      <nav class="crumbs" aria-label="Breadcrumb">
        <a href="/">Home</a><span aria-hidden="true">/</span><span>HSSE &amp; Quality</span>
      </nav>
      <h1 class="display">HSSE carries equal priority with the milestone.</h1>
      <p class="lead">Time and resources are allocated to health, safety, security and environment as a matter of leadership, not as a condition of the contract.</p>
    </div>
  </section>

  <!-- ================= HSSE ================= -->
  <section class="band" aria-labelledby="hsse">
    <div class="shell shell--text">
      <div class="head">
        <hr class="rule" data-reveal>
        <h2 class="h2" id="hsse" data-reveal style="margin-top:1.6rem">Our HSSE commitment</h2>
        <p class="prose" data-reveal style="margin-top:1.5rem">Terk Energy demonstrates leadership and commitment to HSE by the proper allocation of time and resources to HSES matters, and by giving HSES equal priority with work completion and milestone achievement. Our leadership commits as follows.</p>
      </div>
      <ul class="scope" data-reveal>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Provide a safe work environment, and high quality, safe equipment for the work.</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Make financial resources available for the purchase of personal protective equipment.</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Employ qualified staff, and train staff in HSES.</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Take part in HSES policy formulation, and in HSES review meetings, audits and inspections.</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Promote an HSES culture throughout company communications.</li>
      </ul>
    </div>
  </section>

  <!-- ================= QUALITY ================= -->
  <section class="plate band" aria-labelledby="quality">
    <div class="shell shell--text">
      <div class="head">
        <hr class="rule" data-reveal>
        <h2 class="h2" id="quality" data-reveal style="margin-top:1.6rem">Our quality commitment</h2>
        <p class="prose" data-reveal style="margin-top:1.5rem">Our primary goal is to achieve the highest standards of quality in all our business practices and operations, without compromise. We are committed to ensuring that our work processes and business activities meet standards and exceed expectations for the quality and satisfaction of all interested parties. To this end, we shall:</p>
      </div>
      <ul class="scope" data-reveal>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Sustain a process approach, where regular monitoring of system performance, factual analysis and market feedback are the basis for effective decision-making and continual improvement.</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Foster mutually beneficial relationships with business partners.</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Evaluate quality risks, managed as an integral part of the system, to ensure services and output are fit for purpose.</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Identify and comply with applicable legal and regulatory requirements.</li>
        <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Ensure that adequate resources are provided for the implementation and maintenance of our quality management system.</li>
      </ul>
      <div class="tbc" data-reveal style="margin-top:2.75rem">
        <b>To be supplied</b>
        Certifications, accreditations, HSE performance statistics and vendor registration codes are not published here. Nothing has been carried across from the reference profile. Send us the certificates you hold and the figures you are willing to publish, and we will add them.
      </div>
    </div>
  </section>

  <!-- ================= CLOSE ================= -->
  <section class="band" aria-labelledby="close">
    <div class="shell">
      <div class="split split--flip" data-reveal-group>
        <div class="ph" data-reveal>
          <!-- TERK-PLACEHOLDER 16: stock fabrication photograph. Replace with Terk's own work. -->
          <img src="/assets/img/welding.jpg" alt="A welder joining steel sections during fabrication work." width="2000" height="1334" loading="lazy">
        </div>
        <div>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="close" data-reveal style="margin-top:1.6rem">Ask for the documents.</h2>
          <p class="lead" data-reveal style="margin-top:1.35rem">If you are running a pre-qualification and need our HSE plan, quality manual or policy statements, ask and we will send them.</p>
          <div class="actions" data-reveal style="margin-top:2.35rem">
            <a class="btn btn--gold" href="/contact">Request documents <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
<?php require __DIR__ . '/includes/footer.php';
