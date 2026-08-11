<?php
define('TERK', true);
$page = [
    'slug'  => 'services',
    'title' => 'Services',
    'desc'  => 'EPCIC services, marine and logistics services, and advisory and consultancy for onshore and offshore oil and gas assets in Nigeria.',
    'image' => 'pipeline.jpg',
];
require __DIR__ . '/includes/header.php';
?>
<main id="main">

  <section class="pagehead">
    <div class="pagehead__ph">
      <!-- TERK-PLACEHOLDER 09: stock pipeline photograph. Replace with Terk's own construction work. -->
      <img src="/assets/img/pipeline.jpg" alt="" width="1280" height="1707" fetchpriority="high">
    </div>
    <div class="shell">
      <nav class="crumbs" aria-label="Breadcrumb">
        <a href="/">Home</a><span aria-hidden="true">/</span><span>Services</span>
      </nav>
      <h1 class="display">Three service lines, one point of responsibility.</h1>
      <p class="lead">One point of responsibility across engineering and construction, marine and logistics, and advisory. Each line below lists what we actually take on, along with our technical partners.</p>
    </div>
  </section>

  <!-- ================= EPCIC ================= -->
  <section class="stratum band" id="epcic" aria-labelledby="epcic-h">
    <div class="shell">
      <div class="stratum__grid" data-reveal-group>
        <div class="ph" data-reveal>
          <!-- TERK-PLACEHOLDER 10: stock fabrication photograph. Replace with Terk's own construction work. -->
          <img src="/assets/img/welding.jpg" alt="A welder joining steel sections during fabrication work." width="2000" height="1334" loading="lazy">
        </div>
        <div>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="epcic-h" data-reveal style="margin-top:1.6rem">EPCIC Services</h2>
          <p class="stratum__body" data-reveal>Engineering, procurement, construction, installation and commissioning. We take fixed-scope responsibility on onshore and offshore facilities, from front-end design through to handover, and carry procurement and construction with it.</p>
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
  </section>

  <!-- ================= MARINE ================= -->
  <section class="stratum stratum--flip band" id="marine" aria-labelledby="marine-h">
    <div class="shell">
      <div class="stratum__grid" data-reveal-group>
        <div class="ph" data-reveal>
          <!-- TERK-PLACEHOLDER 11: stock tanker photograph. Replace with Terk's own marine operations. -->
          <img src="/assets/img/tanker-alt.jpg" alt="A large oil tanker under way on open sea." width="1600" height="1600" loading="lazy">
        </div>
        <div>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="marine-h" data-reveal style="margin-top:1.6rem">Marine &amp; Logistics Services</h2>
          <p class="stratum__body" data-reveal>We move crude and cargo. Our Alternative Crude Evacuation System runs end to end, covering regulatory and naval clearance, security, shuttle tanker, ship-to-ship transfer into the mother vessel, and hydrocarbon accounting, all under a single point of responsibility rather than a chain of separate vendors.</p>
          <ul class="scope scope--two" data-reveal>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Alternative Crude Evacuation System (ACES)</li>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Marine vessel supply and operations</li>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Offshore construction and installation</li>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Offshore operations support services</li>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Land and marine logistics support</li>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Hydrocarbon accounting</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= ADVISORY ================= -->
  <section class="stratum band" id="advisory" aria-labelledby="advisory-h">
    <div class="shell">
      <div class="stratum__grid" data-reveal-group>
        <div>
          <hr class="rule" data-reveal>
          <h2 class="h2" id="advisory-h" data-reveal style="margin-top:1.6rem">Advisory &amp; Consultancy Services</h2>
          <p class="stratum__body" data-reveal>Technical and commercial judgement for assets and transactions. We advise on asset development, run due diligence across the technical, commercial and regulatory dimensions, and structure gas commercialization.</p>
          <ul class="scope scope--two" data-reveal>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Asset development advisory and consulting</li>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Technical, commercial and regulatory due diligence</li>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Tailored end-to-end alternative crude evacuation solutions</li>
            <li><svg class="ico" aria-hidden="true"><use href="#i-tick"></use></svg>Gas commercialization</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= WHAT AN ENGAGEMENT INVOLVES ================= -->
  <section class="sunk band" aria-labelledby="shape">
    <div class="shell shell--text">
      <div class="head">
        <hr class="rule" data-reveal>
        <h2 class="h2" id="shape" data-reveal style="margin-top:1.6rem">What our engagements involve</h2>
        <p class="lead" data-reveal style="margin-top:1.35rem">These describe the shape of the work we are set up to take. They are capability, not a claim about any particular contract.</p>
      </div>

      <ul class="rows" data-reveal-group>
        <li data-reveal>
          <span class="rows__term">Tubular procurement package</span>
          <span class="rows__def">Procurement of casing or tubing to a stated grade, weight and range for a drilling programme. Our scope runs across manufacture with the OEM partner, factory acceptance testing, shipping, in-country clearing, and logistics through to delivery at the client's facility, with project execution and the delivery schedule on our side of the line.</span>
        </li>
        <li data-reveal>
          <span class="rows__term">Alternative crude evacuation campaign</span>
          <span class="rows__def">Evacuating crude from a field without pipeline access, using a shuttle tanker and a ship-to-ship transfer into a mother vessel. End to end this covers port and naval clearance, security cover, the marine spread, the transfer itself, hydrocarbon accounting and advisory through to reconciliation.</span>
        </li>
        <li data-reveal>
          <span class="rows__term">Land and marine logistics support</span>
          <span class="rows__def">Sustained logistics for a producing asset or a construction campaign: crew and supply vessel provision, marine coordination, and the land-side movement that has to meet it. Measured on availability and turnaround rather than on mobilisation.</span>
        </li>
      </ul>
    </div>
  </section>

  <!-- ================= HOW WE DELIVER ================= -->
  <section class="plate band" aria-labelledby="deliver">
    <div class="shell shell--text">
      <div class="head">
        <hr class="rule" data-reveal>
        <h2 class="h2" id="deliver" data-reveal style="margin-top:1.6rem">How the work is carried</h2>
      </div>
      <ul class="rows rows--gold" data-reveal-group>
        <li data-reveal>
          <span class="rows__term">Scope</span>
          <span class="rows__def">We take defined scope with a defined interface. Where we are a sub-contractor, we say so; where we hold the whole package, we hold the schedule, the procurement and the site with it.</span>
        </li>
        <li data-reveal>
          <span class="rows__term">Partners</span>
          <span class="rows__def">Original equipment manufacturers and technical partners are named into the scope from the outset rather than found once the contract is signed.</span>
        </li>
        <li data-reveal>
          <span class="rows__term">Assurance</span>
          <span class="rows__def">Factory acceptance testing, inspection and quality hold points are planned into the programme, not bolted on at the end.</span>
        </li>
      </ul>
      <div class="actions" data-reveal style="margin-top:3rem">
        <a class="btn btn--gold" href="/contact">Discuss a scope of work <svg class="ico" aria-hidden="true"><use href="#i-arrow"></use></svg></a>
        <a class="btn btn--ghost" href="/hsse">HSSE &amp; quality</a>
      </div>
    </div>
  </section>

</main>
<?php require __DIR__ . '/includes/footer.php';
