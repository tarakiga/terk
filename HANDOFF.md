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
smtp-test.php   Mail diagnostic. Delete once the form works.
mail-config.example.php  Template for the SMTP credentials
includes/mailer.php      Small SMTP client, no dependencies
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

## 1. Claims removed, and why that matters

Earlier drafts carried a claim that Terk can fund projects upfront so delivery is
not held up waiting on cash release. **That has been removed everywhere** at your
instruction: from the home page hero, from the value proposition, from the
services page, and from the project record.

It is worth saying plainly why this was the right call. That sentence came from
Dajo Energy's profile, not from you. It is the kind of claim a procurement team
tests, and being unable to evidence it during a pre-qualification is worse than
never having made it. If Terk does have that capability and can evidence it, it
can be added back deliberately, with whatever limits are true.

**Nothing else on the site makes a commercial claim that has not been verified.**
What remains is the service scope, the vision, mission and values, and the two
HSSE and quality commitments, all of which describe intent rather than track
record. Everything factual that is still missing is marked, and listed in the
next section.

---

## 2. Content still missing

The visible "to be supplied" panels have been removed at your request; they read
as unfinished on a live site. The gaps they marked are still gaps, so they are
listed here instead:

| Page | Not yet published |
|---|---|
| About | Company registration details, year of incorporation, headcount. |
| HSSE & Quality | Certifications and accreditations, HSE performance statistics, vendor registration codes. |
| Contact | Registered and operating office addresses. |

None of these are invented anywhere on the site, which is the important part.
Send them over and they go in.

Deliberately **not built**, per your instruction: Our Certificates, NIPEX Codes,
Our Leadership, and the Projects page. The engagement descriptions that lived on
Projects now sit on `services.php` under "What our engagements involve".

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

Two rules when choosing replacements:

1. **Everyone shown must be African.** Terk is a Nigerian company and its site
   should look like it. Every photograph containing identifiable people was
   re-sourced for this. Apply the same test to anything you swap in.
2. **No other company's name or mark should be legible.** Several otherwise-good
   stock candidates were rejected during sourcing for exactly this.

**Also needed: a vector logo.** `assets/img/terk-mark.png` is the 416 x 563
raster you supplied. It will soften on large screens. Send the SVG, AI or EPS
original and it can be swapped in everywhere at once.

---

## 4. The enquiry form

The form posts to `send.php`, which validates the submission, rejects bots with
a hidden honeypot, and emails the enquiry with the sender's address as Reply-To,
so hitting reply in the inbox answers the enquirer directly. On success the
visitor sees `thanks.php`.

### It sends over SMTP

Your host's PHP `mail()` is not working, which is common on shared hosting and
the reason the first test failed. The form now authenticates to your mailbox and
sends properly, which is better anyway: mail handed straight to a web server
usually fails SPF and lands in spam.

**Setup, three steps:**

1. Copy `mail-config.example.php` and fill in the password.
2. Upload it as `mail-config.php` **one level above `public_html`**, in your home
   directory, so it sits beside the website folder rather than inside it:

   ```
   /home/uXXXXXXXX/mail-config.php     <-- credentials, not reachable over the web
   /home/uXXXXXXXX/public_html/        <-- the website
   ```

3. Set its permissions to **600** (owner read/write only).

`send.php` finds it automatically. If it cannot be placed above the web root, it
will still be found inside the project folder, where `.htaccess` blocks it from
being served, but above the root is materially safer and is the intended place.

The template is filled in for **Titan** (`smtp.titan.email`, port 465), which is
what your account uses. Port 465 is implicit TLS. If the host blocks it, switch
to port 587 and add `'smtp_secure' => 'tls'`.

### When something goes wrong, find out what

`smtp-test.php` runs the whole conversation with the mail server and prints it,
including the exact rejection message. The enquiry form deliberately tells
visitors nothing; this tells you everything.

```
https://www.terkenergy.com/smtp-test?token=YOUR_TEST_TOKEN
```

The token is the `test_token` value you set in `mail-config.php`; without it the
page refuses to run, so nobody who finds the URL can probe your mail setup. From
a shell, `php smtp-test.php` needs no token.

It reports where it looked for the config, whether the password is set, whether
openssl is available, whether the outbound port is open, and then the full
session. **Delete `smtp-test.php` once the form is working.**

Failures are also appended to `terk-mail-errors.log`, written above the web root,
and to the host's PHP error log.

### It was tested

The SMTP client was exercised against a mock mail server: connection, `EHLO`,
`AUTH LOGIN`, `MAIL FROM`, `RCPT TO`, `DATA`, `QUIT`, and the message read back
to confirm the headers are well formed. A real enquiry was submitted through the
form and arrived intact, multi-line scope and all. The failure path was tested
too: with an unreachable server the visitor sees only "please email us directly"
while the real cause is logged.

Testing found two bugs worth mentioning, both now fixed: `mb_substr` is not
guaranteed on shared hosting and crashed every submission, and the subject line
was being quoted so it would have arrived as `"[Terk Energy] Enquiry: ..."`.

**Not tested: delivery to a real mailbox.** That needs the password, which stays
with you. Run `smtp-test.php` once after uploading and you will know in seconds.

### If the site ever moves to a host without PHP

Delete `send.php` and either add `data-netlify="true"` to the `<form>` tag or
point its action at a Formspree endpoint. `terk.js` detects both and stands
aside.

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
