# Terk Energy: handoff

A five-page PHP site. No framework, no build step, no dependencies beyond PHP
itself. Upload the folder to any host that runs PHP and it works.

```
index.php       Home
about.php       About: who we are, vision, mission, values, organisation
services.php    Services: EPCIC, Marine & Logistics, Advisory
hsse.php        HSSE & Quality: both commitments
contact.php     Contact: details and enquiry form
thanks.php      Confirmation after the form is sent
404.php         Not-found page

send.php        The enquiry handler (see section 4)
.htaccess       Clean URLs, security headers, caching
router.php      Local preview only; Apache ignores it

includes/config.php   every site-wide value: contact details, nav, live domain
includes/header.php   document head, icon sprite, masthead
includes/footer.php   footer and closing tags

assets/css/terk.css   the whole design system, one file
assets/js/terk.js     progressive enhancement only; every page works without it
assets/fonts/         Archivo variable, self-hosted (no Google Fonts call)
assets/img/           photography and logo; see CREDITS.md
```

**Edit the nav, the phone number or the email in `includes/config.php` and every
page follows.** Header and footer markup exists in exactly one place each. This
is the main practical benefit of the PHP conversion.

**Requires PHP 8.0 or newer.** No extensions beyond the defaults.

To preview locally:

```bash
php -S localhost:4173 router.php
```

---

## Read this first: what is real and what is not

The reference PDF in `ref/` is **Dajo Energy Limited's** company profile, which
is a different company. Per your instruction I reused its structure, service
architecture, vision, mission, values and voice, and nothing else.

**Not one client name, project figure, date, address, certificate or person from
that document appears anywhere on this site.** Publishing another company's
track record would be a misrepresentation in any pre-qualification process, so
everywhere the source had a specific, the site carries a visibly marked
placeholder instead. Those markers are meant to be seen. They are not styled to
blend in.

Search the project for `TERK-PLACEHOLDER` and `TERK-CONFIRM` to find every one.

---

## 1. Claims to confirm before this goes live

**`TERK-CONFIRM 01` and `02`: the funding claim.** Two places say Terk can carry
upfront project funding so delivery is not held up waiting on cash release
(`index.php` "Financial responsibility", `services.php` "Funding"). This is the
single most commercially loaded sentence on the site and the strongest thing you
have to say against a competitor, but it came from the reference profile, not
from you. Both currently display a dashed gold **"Confirm before publishing"**
badge next to the heading.

- If it is true: confirm it, add any limits worth stating (project size ceiling,
  instrument type), then **delete the `<span class="unconfirmed">...</span>`** in
  both files.
- If it is not true, or not yet: delete the whole row from both pages.

---

## 2. Content you need to supply

Each of these is a visible dashed-gold "to be supplied" panel on the live page.
Replace the panel with real content, or delete it if the section is not wanted.

| Where | What is missing |
|---|---|
| `about.php` | Company registration details, year of incorporation, headcount. |
| `hsse.php` | Certifications and accreditations, HSE performance statistics, vendor registration codes. |
| `contact.php` | Registered and operating office addresses. |

Deliberately **not built**, per your instruction: Our Certificates, NIPEX Codes,
Our Leadership.

**The Projects page has been removed** at your request. The honest capability
descriptions that lived on it now sit on `services.php` under "What our
engagements involve", where they describe the shape of work Terk is set up to
take without claiming any particular contract. If you would rather they go too,
delete that one section. When you do have a publishable track record, that
section is the natural place to grow it into real case studies.

---

## 3. Photography: 9 images to replace

Every photograph is licensed stock (Pexels, free for commercial use). None shows
Terk's assets, people or projects, and no caption or alt text claims otherwise.
Provenance is in `assets/img/CREDITS.md`.

To swap one: drop your file into `assets/img/` under the **same filename**, then
correct the `width` and `height` attributes on the `<img>` tag to the new file's
real pixel dimensions. Those attributes stop the page jumping while images load,
so wrong numbers are worse than none.

| # | File | Used on | Should become |
|---|---|---|---|
| 01 | `hero-offshore.jpg` | Home hero | Terk operations, wide, with room on the left for text |
| 02 | `pipeyard.jpg` | Home | A Terk yard or delivered tubulars |
| 03, 10, 16 | `welding.jpg` | Home, Services, HSSE | Terk fabrication or construction |
| 04, 11 | `tanker.jpg`, `tanker-alt.jpg` | Home, Services | A Terk marine operation or STS transfer |
| 05, 12 | `advisory.jpg` | Home, Services | Terk's own team |
| 06, 15 | `hsse.jpg` | Home, HSSE | Terk HSE activity, such as a toolbox talk or an inspection |
| 07 | `platform.jpg` | About | A Terk asset or project |
| 08, 17 | `refinery.jpg` | About, Contact | A Terk facility or office |
| 09 | `pipeline.jpg` | Services | Terk pipeline work |

One rule when choosing replacements: **no other company's name or mark should be
legible in any photograph.** Several otherwise-good stock candidates were
rejected during sourcing for exactly this.

**Also needed: a vector logo.** `assets/img/terk-mark.png` is the 416 x 563
raster you supplied. It will soften on large screens. Send the SVG, AI or EPS
original and it can be swapped in everywhere at once.

---

## 4. The enquiry form

The form posts to `send.php`, which validates the submission, rejects bots with
a hidden honeypot, and emails **info@terkenergy.com** with the sender's address
as Reply-To, so hitting reply in the inbox answers the enquirer directly. On
success the visitor sees `thanks.php`.

Nothing to sign up for, no API key, no monthly cap, and enquiry contents never
leave your own server. For a company receiving tender scopes, that last point
matters.

**This was tested, not just written.** Every branch was exercised against a real
PHP 8.4 server: rejected GET requests, silently-dropped bot submissions,
validation errors, successful sends, the no-JavaScript redirect, and two attack
attempts. A crafted name carrying `Bcc: victim@elsewhere.com` was flattened into
a single line and the display name dropped, so no extra recipient header was
produced; a forged `Host` header could not reach the From address. The exact
email the form generates was captured and read.

**What was not tested:** actual delivery. That depends on your host's mail
configuration and cannot be verified from here.

**When you deploy:**

1. Upload everything, keeping the folder structure.
2. Send yourself a test enquiry.
3. If nothing arrives, check spam first. If it is still missing, PHP `mail()` is
   probably disabled on the account. Ask the host to enable it, or switch to
   SMTP; the only file to change is `send.php`.
4. **Set `TERK_MAIL_DOMAIN` in `includes/config.php` to your real domain.** Mail
   sent `From:` a domain that does not match the sending server often fails SPF
   and lands in spam.
5. To route enquiries somewhere other than the general inbox, change the
   `ENQUIRY_TO` line at the top of `send.php`.

**If you ever move to a host without PHP** (Netlify, Vercel, GitHub Pages), the
pages would need converting back to HTML, but the form itself needs only one
change: delete `send.php` and either add `data-netlify="true"` to the `<form>`
tag or point its action at a Formspree endpoint. `terk.js` detects both and
stands aside.

**It never silently fails.** If no handler answers, the form falls back to
opening the visitor's email application with the enquiry already composed. With
JavaScript off it is an ordinary form post. And the email address and phone sit
in plain text beside the form, so there is always a working route.

---

## 5. Two other things to wire up

**`TERK-PLACEHOLDER 19`: the live domain.** `TERK_ORIGIN` in
`includes/config.php` is set to `https://www.terkenergy.com` and drives every
canonical URL and social preview. Confirm it, because if it is wrong no link
preview renders when someone pastes a Terk page into an email or a Teams thread,
which is exactly how a vendor link travels inside a procurement team.

**`TERK-PLACEHOLDER 20`: the capability statement.** "Request a capability
statement" is the most prominent action on every page and currently lands on the
enquiry form, with that option pre-selected in the dropdown. An evaluator
comparing four vendors in one sitting would rather have the document
immediately. Once the PDF exists, put it in `assets/` and repoint that link in
`includes/header.php` straight at it.

---

## 6. How the design works, briefly

Full detail is in `DESIGN.md`. The short version:

- **Two grounds, alternating.** Warm-neutral paper and blue-black plate.
  Sections alternate so the page has rhythm; every page opens on plate and
  closes into the footer's deeper plate.
- **Gold hairlines are the only ornament.** A 1px gold rule sits above each
  section heading. That is the entire decorative vocabulary. No cards, no boxes,
  no drop shadows, no rounded corners.
- **One typeface.** Archivo, self-hosted as a variable font, worked across its
  *width* axis: expanded and heavy for headlines, condensed tracked capitals for
  labels. One font file does the work of four.
- **One photographic grade.** Every image is desaturated and pushed onto the
  same steel-blue axis, so unrelated stock photographs read as one art
  direction. This is what stops the site looking assembled. Keep it when you
  swap in real photography.
- **Services are bands, not cards.** Every competitor ships three identical icon
  cards. Refusing that is why the service sections run full width with real
  scope lists.

Accessibility: WCAG 2.2 AA is the floor. Full keyboard operation, visible focus
rings, semantic landmarks, real text throughout, and `prefers-reduced-motion`
honoured. Nothing is hidden behind hover alone.

---

## 7. Recommended next, once the content lands

Not built, because the facts to build them honestly do not exist yet:

1. **A downloadable capability statement PDF.** The highest-value object in this
   category and the thing your most prominent button promises.
2. **An operating footprint.** Every benchmark competitor carries a map, basin
   list or asset index. Terk's footprint currently exists only as the phrase
   "the Nigerian oil and gas value chain."
3. **Real project case studies**, grown out of the "What our engagements
   involve" section on `services.php`.
4. **A section index on `services.php`.** It is a long page with no wayfinding
   beyond the sticky header.
