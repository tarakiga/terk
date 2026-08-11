# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Stack

Server-rendered PHP, no framework, no build step, no dependencies. The user first chose
static HTML/CSS/JS, then asked for PHP so the enquiry form could actually send; the pages
were converted at the same time so the shared chrome stops being duplicated.

- Pages are `.php` at the project root, one per route.
- `includes/config.php` holds every site-wide constant: contact details, the live origin,
  and the nav array. Change a phone number or a nav label once.
- `includes/header.php` and `includes/footer.php` carry the head, the icon sprite, the
  masthead and the footer. **They are the only place that chrome exists.**
- `send.php` is the enquiry handler. `router.php` reproduces the clean-URL rewrites for
  PHP's built-in server locally; `.htaccess` does it in production.
- Requires PHP 8.0+. No extensions beyond the defaults: mbstring is used when present
  and worked around when absent.
- URLs are extensionless (`/about`, not `/about.php`), enforced by `.htaccess` with a
  301 from the `.php` form so only one URL is ever indexed.

## Users

Primary: **procurement leads, contracts managers, and supply-chain evaluators** at
Nigerian oil & gas operators (IOCs, NOCs, indigenous producers) and at the tier-1
contractors who sub-contract to companies like Terk. They arrive from a tender
shortlist, an NIPEX search, an email introduction, or a referral, and they are doing
one job: **deciding whether this company is credible enough to invite to bid.** They
are usually on desktop, often in a hurry, and comparing several vendors in the same
sitting.

They are looking for specific, checkable things: does this company do the exact scope
we need; have they done it before at our scale; can they fund the work upfront; are
they safe; who do we call. Anything that does not help them answer those questions is
noise to them.

Secondary: **prospective technical/OEM partners** assessing Terk as a local execution
partner, and **candidates** evaluating the company as an employer.

## Product Purpose

Terk Energy is an indigenous integrated energy services company serving the Nigerian
oil and gas value chain, offshore and onshore.

The website exists to convert a cold or lukewarm evaluator into an invitation to bid.
Success is a qualified inbound enquiry: a named person at an operator or contractor
sending a scope-specific message or downloading the company profile. The site is the
digital counterpart to the capability statement that currently travels as a PDF
attachment; it must do that PDF's job faster, and be linkable.

## Positioning

Terk sits at the junction of three things that indigenous energy service companies
usually only have two of:

1. **Technical execution** across EPCIC, marine & logistics, and advisory.
2. **Upfront funding capacity.** Terk can carry 100% project funding so client
   delivery is not gated on the client's own cash release cycle. This is the single
   most differentiating claim in the source material and evaluators care about it
   disproportionately.
3. **Alternative Crude Evacuation (ACE)** as an end-to-end service covering clearance,
   security, shuttle tanker, STS transfer and hydrocarbon accounting, rather than as
   a brokered set of parts. This is a specific, non-generic capability.

The honest position is "indigenous, integrated, and able to fund and clear the work
itself," not "leading provider of quality solutions."

## Operating Context

Evaluation happens against documents, not vibes. The real artifacts in this world are:
tender packages, NIPEX vendor codes, pre-qualification questionnaires, ISO certificates,
HSE statistics, organograms, vessel particulars, and capability statements. Work is
described in the trade's own units: joints of casing, PPF, barrels evacuated, OCTG
grades, FEED scope, STS operations.

The evaluator's environment is corporate desktop, frequently older browsers, sometimes
poor connectivity from an office in Port Harcourt or a rig-adjacent site. Pages must be
light and must not depend on heavy runtime.

## Capabilities and Constraints

Service lines confirmed from the source profile and retained:

- **EPCIC Services:** FEED/detailed engineering design; pipeline construction &
  maintenance; procurement of OCTG, wellheads, pumps; structural, civil and mechanical
  engineering & construction; heavy-duty equipment supply, installation & maintenance;
  upgrade of onshore & offshore production facilities; clean energy solutions.
- **Marine & Logistics Services:** Alternative Crude Evacuation System (ACES); marine
  vessel supply & operations; offshore construction & installation; offshore operations
  support services; land & marine logistics support.
- **Advisory & Consultancy Services:** asset development advisory/consulting;
  technical, commercial and regulatory due diligence; tailored end-to-end ACE solutions;
  gas commercialization.

Company functions confirmed by the source organogram (useful as proof of organizational
depth, not as a page to reproduce): EPC projects, EHSSQ, vessel operations, gas,
finance, legal & corporate services, admin/HR.

**Hard constraint on factual claims.** The reference PDF belongs to Dajo Energy Limited,
a different entity. Per the user's instruction, the site reuses that document's
*structure, service architecture, vision/mission, values and voice* only. The following
must NOT appear as Terk's facts and are not to be reintroduced by later work:

- The 2015 incorporation date.
- Named clients: NNPC, PINL, NEPL, NDDC, Shell, Multisub Energy, AKRZ, Newbury Energy,
  Antan Producing, Buba Integrated Services, Kaduna Refinery, West African Oilfields
  Services, Primesource.
- Specific project figures: 1,800 joints of 3-1/2" L-80, 450 joints of N80 47PPF,
  40,000bbl Olure→Ajapa evacuation, Delta State solar streetlights.
- Lagos (Katia Gardens) and Abuja (Herbert Macaulay Way) office addresses.
- Any named leadership, certificates, or NIPEX codes (explicitly excluded by the user).

Where the source had those specifics, the site carries a clearly marked placeholder for
the client to fill. Placeholders must be visibly marked in the HTML with
`<!-- TERK-PLACEHOLDER: ... -->` comments and must never read as if they were verified
facts.

**Undecided, do not invent:** years in operation, headcount, fleet particulars, HSE
statistics (LTI-free hours etc.), certifications held, NIPEX codes, office addresses,
leadership names, client names, project values.

## Brand Commitments

- **Name:** Terk Energy. Legal-entity suffix undecided; use "Terk Energy" throughout,
  never "Terk Energy Limited," until confirmed.
- **Logo:** `ref/ChatGPT Image Aug 11, 2026, 10_36_55 PM.png`. A teardrop/droplet mark
  with a negative-space "T", rendered in near-black with a gold outline and a gold
  wave sweeping through the lower third. The mark is binding. Its two colors,
  a deep blue-black and a metallic gold, are the brand's colors by evidence.
- **Confirmed contact details** (`ref/contact.txt`, the only verified Terk facts on hand):
  - Email: info@terkenergy.com
  - Website: www.terkenergy.com
  - Phone: +234 817 014 1009
- **Voice:** plain, technical, quietly confident. The source profile's register ("we
  currently offer the following services"), not marketing superlatives. Say what the
  company does in the trade's own vocabulary. No "innovative solutions," no
  "cutting-edge," no exclamation.
- **Vision (retained):** to be a leading integrated energy service provider in Africa.
- **Mission (retained):** to create a reputable organization through hard work and
  diligence whilst making a positive impact on our community and environment.
- **Core values (retained, verbatim):** Teamwork, Excellence, Customer Obsession,
  Ownership, Innovation.
- **Excluded sections** (user instruction): Our Certificates, NIPEX Codes, Our
  Leadership. Do not build these pages or sections. The **Projects page was also
  removed** at the user's request after the first build; its honest capability
  descriptions were moved to `services.html` under "What our engagements
  involve". Do not reinstate a projects route without asking.
- **No em dashes.** The user asked for every em dash to be removed from the
  site and its documentation. Use commas, colons, semicolons or parentheses
  instead. This applies to any copy added later.
- **Visual register (standing preference, user-pinned).** After being shown two
  oblique visual worlds, the user re-rolled with the steer *"something more corporate
  like a petroleum company."* Convention is therefore the commitment: the site executes
  the corporate energy-services standard at full craft, without irony or smuggled
  quirk. Future work does not reopen this as an aesthetic question.
  - **Benchmark set** (assumed; the follow-up question went unanswered): Terk's actual
    competitive set, the oilfield-services and EPC contractors, SLB, Baker Hughes,
    Subsea7, Petrofac, Wood, rather than the supermajors, because Terk is a services
    contractor, not a producer. Their craft level is the bar.
  - **Imagery policy** (assumed, same unanswered round): verified free-license
    photography, downloaded locally to `assets/img/`, every slot marked in the HTML for
    replacement with Terk's own photography. Sources are Pexels (free commercial use,
    no attribution required); provenance is recorded in `assets/img/CREDITS.md`.
    Photographs must never be captioned or framed as depicting Terk's own assets,
    people, or projects.

## Evidence on Hand

- `ref/Dajo Energy Limited - Company Profile_2025_(V2).pdf`, structural and tonal
  source only; see the hard constraint above.
- `ref/ChatGPT Image Aug 11, 2026, 10_36_55 PM.png`, the Terk logo mark.
- `ref/contact.txt`, verified email, website, phone.

**Absent, and must not be fabricated:** photography of Terk's own operations, vessels,
sites or people; client logos; testimonials; certificates; case-study numbers; team
photos; office addresses. Any imagery used must be either generated/abstract and
obviously non-documentary, or clearly flagged as placeholder for the client to replace.

## Product Principles

1. **An evaluator's checklist beats a brand story.** Every section must help someone
   decide whether to invite Terk to bid. Scope specificity, funding capacity, safety
   posture, and a way to make contact outrank atmosphere.
2. **Never claim what has not been verified.** An honest gap, visibly marked, is worth
   more than a borrowed credential, and a borrowed one is disqualifying in a
   pre-qualification process.
3. **Speak the trade's language.** OCTG, FEED, STS, ACES, EPCIC. Precision reads as
   competence to this audience; simplification reads as distance from the work.
4. **Funding capacity is the headline differentiator.** It should be visible early and
   stated plainly, not buried in a value-proposition grid.
5. **Light and durable.** Corporate desktops, mixed connectivity, no build step. The
   site must work with JavaScript off and stay under a weight an evaluator on a poor
   connection will tolerate.

## Accessibility & Inclusion

No client-stated standard. Treat WCAG 2.2 AA as the floor: full keyboard operability,
visible focus, semantic landmarks, real text over images of text, and reduced-motion
support. The audience skews toward older corporate browsers and an older median age
than consumer web, do not rely on hover-only affordances or sub-16px body text.
