---
name: Terk Energy
description: Warm-neutral paper alternating with blue-black plates, gold hairlines as the only ornament, and one variable grotesque worked across its width axis.
colors:
  paper: "#f6f6f3"
  paper-sunk: "#ebebe6"
  white: "#ffffff"
  ink: "#0b1119"
  ink-soft: "#3d4a59"
  ink-faint: "#5b6875"
  rule-light: "#d8d8d1"
  plate: "#0c141e"
  plate-foot: "#080d14"
  on-plate: "#eef1f4"
  on-plate-soft: "#a9b6c4"
  rule-plate: "rgba(233, 240, 248, 0.16)"
  gold: "#b8842a"
  gold-deep: "#8a6116"
  gold-lift: "#dfb35c"
  gold-on-gold: "#1a1204"
  photo-wash: "#17293d"
  status-done: "#2f6a4f"
  error-ink: "#9c2f1c"
  error-stroke: "#b03a24"
  error-on-plate: "#f0a08c"
  on-photo: "#cfd8e2"
  placeholder-plate: "#8794a3"
  foot-faint: "#7d8b9a"
  ok-ink: "#1f5c40"
  ok-stroke: "#2f7a55"
  ok-on-plate: "#8fd3ae"
  print-ink: "#000"
typography:
  display:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "clamp(2.6rem, 5.9vw, 5.25rem)"
    fontWeight: 620
    fontStretch: "116%"
    lineHeight: 0.98
    letterSpacing: "-0.03em"
  headline:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "clamp(2.1rem, 4.2vw, 3.5rem)"
    fontWeight: 620
    fontStretch: "112%"
    lineHeight: 1.04
    letterSpacing: "-0.025em"
  statement:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "clamp(1.75rem, 3vw, 2.6rem)"
    fontWeight: 500
    fontStretch: "104%"
    lineHeight: 1.16
    letterSpacing: "-0.022em"
  title:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "clamp(1.2rem, 1.55vw, 1.5rem)"
    fontWeight: 650
    fontStretch: "106%"
    lineHeight: 1.2
    letterSpacing: "-0.012em"
  lead:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "clamp(1.125rem, 1.5vw, 1.3125rem)"
    fontWeight: 400
    fontStretch: "100%"
    lineHeight: 1.5
    letterSpacing: "-0.006em"
  body:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "1.0625rem"
    fontWeight: 400
    fontStretch: "100%"
    lineHeight: 1.6
    letterSpacing: "normal"
    fontFeature: "tabular-nums"
  interface:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "0.9375rem"
    fontWeight: 400
    fontStretch: "100%"
    lineHeight: 1.45
    letterSpacing: "normal"
  action:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "0.875rem"
    fontWeight: 680
    fontStretch: "94%"
    lineHeight: 1.2
    letterSpacing: "0.11em"
  caption:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "0.8125rem"
    fontWeight: 620
    fontStretch: "92%"
    lineHeight: 1.3
    letterSpacing: "0.12em"
  label:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "0.75rem"
    fontWeight: 680
    fontStretch: "88%"
    lineHeight: 1.3
    letterSpacing: "0.17em"
  control:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "1rem"
    fontWeight: 400
    fontStretch: "100%"
    lineHeight: 1.4
    letterSpacing: "normal"
  nav-mobile:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "1.25rem"
    fontWeight: 620
    fontStretch: "104%"
    lineHeight: 1.3
    letterSpacing: "0.02em"
  marker:
    fontFamily: "Archivo, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif"
    fontSize: "0.6875rem"
    fontWeight: 700
    fontStretch: "88%"
    lineHeight: 1.3
    letterSpacing: "0.14em"
rounded:
  none: "0"
  focus: "1px"
spacing:
  gutter: "clamp(1.25rem, 4.4vw, 4rem)"
  band: "clamp(4.75rem, 8.5vw, 9rem)"
  band-tight: "clamp(3.25rem, 5.5vw, 5.5rem)"
  head-gap: "clamp(2.25rem, 3.6vw, 3.5rem)"
  rule-to-heading: "1.6rem"
  heading-to-lead: "1.35rem"
  body-to-link: "2rem"
  body-to-actions: "2.35rem"
components:
  button-primary:
    backgroundColor: "{colors.ink}"
    textColor: "{colors.paper}"
    rounded: "{rounded.none}"
    padding: "0.95rem 1.6rem"
  button-primary-hover:
    backgroundColor: "{colors.gold-deep}"
    textColor: "{colors.white}"
  button-gold:
    backgroundColor: "{colors.gold}"
    textColor: "{colors.gold-on-gold}"
    rounded: "{rounded.none}"
    padding: "0.95rem 1.6rem"
  button-gold-hover:
    backgroundColor: "{colors.gold-lift}"
    textColor: "{colors.gold-on-gold}"
  button-ghost:
    backgroundColor: "transparent"
    textColor: "{colors.ink}"
    rounded: "{rounded.none}"
    padding: "0.95rem 1.6rem"
  button-ghost-hover:
    backgroundColor: "{colors.ink}"
    textColor: "{colors.paper}"
  button-masthead:
    backgroundColor: "{colors.gold}"
    textColor: "{colors.gold-on-gold}"
    padding: "0.72rem 1.15rem"
  link-drawn:
    textColor: "{colors.gold-deep}"
    rounded: "{rounded.none}"
  link-drawn-on-plate:
    textColor: "{colors.gold-lift}"
  rule-gold:
    backgroundColor: "{colors.gold}"
    height: "1px"
  rule-faint:
    backgroundColor: "{colors.rule-light}"
    height: "1px"
  input-text:
    backgroundColor: "{colors.white}"
    textColor: "{colors.ink}"
    rounded: "{rounded.none}"
    padding: "0.9rem 1rem"
  input-text-on-plate:
    backgroundColor: "rgba(238, 241, 244, 0.05)"
    textColor: "{colors.on-plate}"
  nav-link:
    textColor: "{colors.on-plate}"
    padding: "0.6rem 0"
  nav-link-current:
    textColor: "{colors.gold-lift}"
  marker-tbc:
    backgroundColor: "rgba(184, 132, 42, 0.07)"
    textColor: "{colors.ink-soft}"
    rounded: "{rounded.none}"
    padding: "clamp(1.25rem, 2.4vw, 1.85rem)"
  marker-unconfirmed:
    backgroundColor: "rgba(184, 132, 42, 0.09)"
    textColor: "{colors.gold-deep}"
    rounded: "{rounded.none}"
    padding: "0.2rem 0.5rem"
  index-item:
    backgroundColor: "transparent"
    textColor: "{colors.on-plate}"
    padding: "1.5rem 1.75rem"
  scope-item:
    textColor: "{colors.ink}"
    padding: "0.9rem 0"
  row-ruled:
    textColor: "{colors.ink-soft}"
    padding: "clamp(1.5rem, 2.6vw, 2.25rem) 0"
---

# Design System: Terk Energy

## Overview

**Creative North Star: "Paper and Plate"**

This is a capability statement that happens to be a website. It behaves like a printed
document produced by a company that builds things offshore: a warm-neutral paper stock,
a blue-black plate that the paper alternates against, a gold hairline scored between
sections, and no decoration beyond that. Nothing floats. Nothing is contained in a box.
Every division on every page is one pixel of a line, and the only reason a section reads
as a section is that the ground beneath it changed colour.

The system is built out of a single variable grotesque, Archivo, self-hosted, and it
uses both of that face's axes. Weight does the ordinary work. **Width does the
distinctive work:** display type expands to 112–116%, body sits at 100%, and labels
condense to 88% with heavy tracking. Type gets narrower as it gets smaller, which is the
inverse of the usual instinct and is the single most fragile thing in the system. Strip
the `font-stretch` declarations and the site still functions, still passes contrast, and
stops being itself entirely.

Photographs are the third material. Ten unrelated stock frames are pushed through one
calibrated desaturate-and-blue-wash grade so they read as one art direction rather than
as ten purchases. The refusals are as load-bearing as the affirmations: no cards, no
shadows, no rounded corners, no icon grids, no counter rows, no centred hero. The
category's default composition was explicitly rejected in favour of a left-ranged,
document-like one.

**Key Characteristics:**

- Two grounds only, warm paper (`#f6f6f3`) and blue-black plate (`#0c141e`), alternating down every page.
- Gold hairlines (`#b8842a`, 1px) as the only ornament; neutral hairlines as the only structural divider.
- One type family, worked across weight *and* width; width falls as size falls (116% → 88%).
- Zero radius, zero shadow. Depth is ground tone and photographic scrim, never elevation.
- One photographic grade family, applied so every frame belongs to the same world.
- Two deliberately foreign markers, `.tbc` and `.unconfirmed`, that flag unverified content in dashed gold.
- Progressive enhancement: every page is complete, readable and unanimated with JavaScript absent.

## Colors

A warm-neutral paper against a blue-black plate taken from the company mark, with a
single metallic accent split into three contrast-calibrated values.

### Primary

- **Structural Gold** (`--gold` `#b8842a`): the hairline rule, the gold button ground, the underline beneath the track-record table head, and the dashed stroke on both warning markers. It is a **surface and a stroke, never a text colour**, it does not reach AA as small text on paper.
- **Deep Gold** (`--gold-deep` `#8a6116`): the paper-ground text value of the accent, at 5.0:1 on paper. Every gold word on a light ground, labels, `<dt>` terms, form labels, table headers, drawn-underline links, tick glyphs in scope lists, and the focus outline, is this value.
- **Lifted Gold** (`--gold-lift` `#dfb35c`): the plate-ground text value, at 9.5:1 on plate. Same roles as Deep Gold, inverted onto dark. Also the current-page nav indicator and the "Energy" half of the wordmark.
- **Gold-Ground Ink** (`#1a1204`): the near-black brown used for text sitting *on* a gold button. Not a token; a literal, because it exists for exactly one relationship.

### Neutral, paper family

- **Warm Paper** (`--paper` `#f6f6f3`): the default page ground and the text colour of anything sitting on ink.
- **Sunk Paper** (`--paper-sunk` `#ebebe6`): a half-step darker. Used to separate two paper-family bands that would otherwise abut without stepping all the way to plate.
- **Field White** (`--white` `#ffffff`): form inputs only, the one surface that must read as writable.
- **Ink** (`--ink` `#0b1119`): body text on paper, and the primary button ground.
- **Soft Ink** (`--ink-soft` `#3d4a59`, 8.4:1 on paper): prose, leads, row definitions. The default reading colour for anything below heading rank.
- **Faint Ink** (`--ink-faint` `#5b6875`, 5.2:1 on paper): table captions and the "(optional)" qualifier. Its floor is AA and nothing quieter exists.
- **Light Rule** (`--rule-light` `#d8d8d1`): every structural hairline on paper, list rows, table cells, definition rows, band tops.

### Neutral, plate family

- **Plate** (`--plate` `#0c141e`): dark section ground, the hero ground, the page-header ground, the stuck masthead, and the mobile nav panel.
- **Foot Plate** (`#080d14`): a step darker than plate, used only for the footer and for the header's over-hero gradient scrim. It is what lets the footer follow a plate section without the two merging.
- **On Plate** (`--on-plate` `#eef1f4`): headings and body on dark ground.
- **On Plate Soft** (`--on-plate-soft` `#a9b6c4`, 8.6:1 on plate): prose and leads on dark ground; footer links at rest.
- **Plate Rule** (`--rule-plate` `rgba(233, 240, 248, 0.16)`): every structural hairline on dark.

### Tertiary, signal only

- **Photo Wash** (`#17293d`): never a UI colour. It is the blend layer that unifies photography (see Components → Photography).
- **Complete Green** (`#2f6a4f`) and **Open Gold** (`--gold-deep`): the two states of the track-record status dot.
- **Error** (`#b03a24` stroke, `#9c2f1c` text on paper, `#f0a08c` text on plate): form validation only.

### Named Rules

**The Gold-Never-Speaks Rule.** `--gold` sets `background`, `border-color`, and nothing
else. There is not one `color: var(--gold)` in the system and there must never be. Gold
*text* is `--gold-deep` on paper and `--gold-lift` on plate, always, with no exceptions
and no judgement call. Getting this wrong is the single easiest way to drop the site
below AA, and it looks almost right when you do it.

**The Two Grounds Rule.** Every surface belongs to the paper family or the plate family.
There is no mid-grey, no tinted card, no third ground. `--paper-sunk` is a half-step
within the paper family, not a new ground.

**The Contrast-Derived Token Rule.** Each neutral exists at the value it does because a
ratio was measured, and the ratio is recorded in the stylesheet comment beside it. Do not
nudge a neutral for aesthetic reasons; introduce a new token with its own measured ratio
instead.

## Typography

**Display Font:** Archivo (variable, self-hosted, `100–900` weight × `62–125%` width)
**Body Font:** Archivo, the same file
**Label Font:** Archivo, the same file, condensed to 88%

Two `woff2` files ship, split by unicode range (latin and latin-ext), preloaded, with
`font-display: swap`. The fallback stack is `ui-sans-serif, system-ui, -apple-system,
'Segoe UI', sans-serif`, a system grotesque, so a swap is a change of texture rather
than a change of category.

**Character:** An industrial grotesque with no warmth and no eccentricity, made
expressive purely by how far it is stretched. Expanded, it reads as signage on a
structure; condensed and tracked, it reads as a specification sheet header. Numerals are
tabular by default, site-wide, because this world is full of tonnages, grades and
telephone numbers.

### Hierarchy

- **Display** (620, `clamp(2.6rem, 5.9vw, 5.25rem)`, 116% width, 0.98, −0.03em): the one H1 per page. Balanced wrap; capped at 17ch in the hero and 20ch on inner page headers so it always breaks into a stacked block rather than a wide ribbon.
- **Headline** (620, `clamp(2.1rem, 4.2vw, 3.5rem)`, 112% width, 1.04, −0.025em): section H2s. Inside a service band it steps down to the Statement size (`clamp(1.75rem, 3vw, 2.6rem)`) so a band heading never competes with the page heading.
- **Statement** (500, `clamp(1.75rem, 3vw, 2.6rem)`, 104% width, 1.16, −0.022em): the pull quote in a vision/mission band. Lighter than the headings around it and capped at 22ch, it is a held sentence, not a shout.
- **Title** (650, `clamp(1.2rem, 1.55vw, 1.5rem)`, 106% width, 1.2, −0.012em): H3s and the term column of ruled rows.
- **Lead** (400, `clamp(1.125rem, 1.5vw, 1.3125rem)`, 1.5, −0.006em): the paragraph directly under a heading. Capped at 54ch; the hero's own lead is capped tighter at 46ch.
- **Body** (400, `1.0625rem`, 100% width, 1.6): prose, capped at 68ch. Paragraph spacing is `1.15em` on the following sibling, never a blanket margin.
- **Label** (680, `0.75rem`, 88% width, `0.17em`, uppercase, gold): section markers. Its cousins, table headers, `<dt>` terms, form labels, footer headings, the `.tbc` heading, run 700 weight at 88% width and `0.15em`, which is the same instrument tuned one notch tighter for shorter strings.

Below Body sit three fixed utility steps. They are part of the ramp, not strays,
and nothing else should be invented between them:

- **Interface** (`0.9375rem`): scope-list items, table cells, drawn links, footer
  links, the `.tbc` panel body, and `.foot__blurb`. The default for any text that
  is a control or a list entry rather than prose.
- **Action** (`0.875rem`, 680, 94% width, `0.11em`, uppercase): button type, and
  the `.formnote` under a form.
- **Caption** (`0.8125rem`): status pills, the `.err` line under a field, nav
  items, the footer baseline, and the index notes in the hero strip. The floor.
  Nothing on this site is smaller except the `0.75rem` Label and the `0.6875rem`
  `.unconfirmed` badge, which is deliberately the smallest thing on the page
  because it is a production marker rather than content.

### The width ramp

Width is a continuous axis in this system, not two settings. Read down and it falls
almost monotonically as type gets smaller:

| 116% | display | 106% | H3, row terms | 96% | drawn links |
| 112% | H2 | 104% | pull quote, open mobile nav | 94% | buttons |
| 108% | wordmark | 100% | body, service index names | 92% | nav links |
|  |  |  |  | 88–90% | all labels, breadcrumbs, status |

### Named Rules

**The One Family, Two Axes Rule.** Archivo is the only face. Hierarchy is built from
weight *and width together*; neither axis works alone. When adding a new text role, place
it on the ramp above before choosing anything else, a new size without a width is not in
this system.

**The Condensed Caps Rule.** Every label-rank string is uppercase, 88% width, tracked
`0.14–0.17em`, and gold (`--gold-deep` on paper, `--gold-lift` on plate). This is the only
place uppercase is permitted at all: buttons, nav, breadcrumbs, table heads, form labels,
status pills. Never set a heading or a sentence in caps.

**The No-Kicker Rule.** A short label directly above a heading, in the same column, is a
kicker and this system does not have them. The one label that sits beside a statement
lives in a margin column at ≥62rem and is **visually hidden below it** rather than allowed
to stack into a kicker position, the accessible name survives, the ornament does not.
Preserve that behaviour if you touch the statement band.

## Layout

**Shell.** One container: `max-width 1320px`, centred, with a fluid gutter of
`clamp(1.25rem, 4.4vw, 4rem)`. A `--shell-text` variant narrows to `1120px` and is used
wherever the content is reading matter rather than a text-and-figure pair.

**Bands.** Vertical rhythm is one token: `padding-block: clamp(4.75rem, 8.5vw, 9rem)`,
with a `--band-tight` variant at `clamp(3.25rem, 5.5vw, 5.5rem)` used when several bands
of the same kind run consecutively. There is no vertical spacing scale beyond these two
and the head/heading rhythm below.

**Heading rhythm.** A repeated four-value sequence carries every section on every page:
gold rule → `1.6rem` → heading → `1.35rem` → lead → `2rem` to a link or `2.35rem` to an
action row. A section head block clears `clamp(2.25rem, 3.6vw, 3.5rem)` before its
content. These are currently written as inline `style` attributes on the elements; the
*values* are the system, the inline delivery is not (see Don'ts).

**The alternation.** Sections sequence by ground, and the sequence is the page structure:

| Page | Sequence after the header |
| --- | --- |
| `index.php` | hero (plate) → paper → **plate** → paper ×4 (head + three service bands) → **plate** → paper → **plate** → footer |
| `about.php` | page header (plate) → paper → **plate** → paper → sunk → **plate** → footer |
| `services.php` | page header (plate) → paper ×3 (three service bands) → sunk → **plate** → footer |
| `hsse.php` | page header (plate) → paper → **plate** → paper → footer |
| `contact.php` | page header (plate) → paper → footer |
| `thanks.php` | **plate** → footer |
| `404.php` | **plate** → footer |

Every page opens on a plate and closes into the footer's deeper plate. Between them,
plate bands are punctuation: they carry the statement, the value proposition, and the
closing call, and never two in a row. `.sunk` exists for the one problem alternation
can't solve, two paper bands that must sit adjacent without a ground change.

**Grids.** Three, all of them two-column and all of them collapsing at `62rem`:

- **Split**, text and figure, `1fr 1fr`, or `1.15fr 0.85fr` when the text carries more weight. A `--flip` modifier reorders so the figure leads.
- **Stratum**, the service band, `0.92fr 1.08fr`, alternating flipped down the page. The figure is `aspect-ratio: 5/4` and `align-self: start`, so its height comes from its own width and a long scope list can never inflate it over the copy.
- **Contact**, `1fr 1fr`, details beside the form.

**Breakpoints** (all `rem`, so they respond to the user's text size):
`34rem` detail rows go two-column · `44rem` scope lists go two-column ·
`52rem` ruled rows go term-and-definition · `56rem` desktop nav appears, mobile panel
retires · `62rem` all two-column grids engage, margin labels appear.

**Measures.** Prose 68ch, lead 54ch, hero lead 46ch, footer blurb 34ch, pull quote 22ch,
inner-page display 20ch, hero display 17ch. Measure is set per role, never globally.

### Named Rules

**The Alternation Rule.** A page is read as a sequence of grounds. Adding a section means
deciding where it sits in the paper/plate rhythm before deciding anything about its
contents. Two plate bands never touch inside `<main>`.

**The Full-Bleed Rule.** Ground colour always spans the viewport; the shell constrains
content only. A section that tints a container instead of a band is a card, and this
system has no cards.

## Elevation & Depth

**There are no shadows.** Not one `box-shadow` in the system creates elevation, the only
`box-shadow` declaration anywhere is `inset 0 0 0 1px` on a focused form field, which is a
border-doubling trick, not a lift. There are no drop shadows, no offset shadows, no glows,
no `filter: drop-shadow`, and no translucent floating panels.

Depth is produced three ways, all of them flat:

1. **Ground tone.** Four values step from light to dark down a fixed ladder: paper
   (`#f6f6f3`) → sunk paper (`#ebebe6`) → plate (`#0c141e`) → foot plate (`#080d14`).
   Adjacency on that ladder is the entire depth model.
2. **The photographic scrim.** Photographs recede under a blue-black gradient; the hero's
   is directional (heavy left, near-clear right) so the copy sits in front of the image
   without a panel behind it.
3. **The one true overlay.** The fixed masthead. Transparent over the hero with a
   top-down `rgba(8, 13, 20, 0.62) → 0` gradient; past 40px of scroll it commits to solid
   plate with a plate hairline beneath. The service index at the base of the hero is the
   only element using `backdrop-filter` (`blur(2px)` over `rgba(8, 13, 20, 0.42)`), and it
   degrades to a plain translucent band where unsupported.

### Named Rules

**The No-Shadow Rule.** If a new element needs to separate from what is behind it, change
the ground or draw a hairline. Reaching for a shadow means the layout problem hasn't been
solved yet.

## Shapes

**Everything is square.** `border-radius` is `0` on every surface in the system, buttons,
inputs, selects, textareas, images, photographic frames, markers, the mobile nav panel.
The only radius in the entire stylesheet is `1px` on the focus outline, and it exists to
keep the outline's corners from looking mechanically sharp against square content.

**Strokes are hairlines.** Every border in the system is `1px`. There are exactly two
stroke weights of meaning: solid (structural) and dashed (unverified). Dashed appears
only on the two warning markers and nowhere else, it is a semantic signal, not a style.

**Icons are drawn, not filled.** The nine-symbol inline SVG sprite is stroke-only:
`fill: none`, `stroke: currentColor`, `stroke-width: 1.6` (2 at scope-list size, 1.25 at
large), with `stroke-linecap: square` and `stroke-linejoin: miter`. Square caps and mitred
joins, matching the zero-radius rule. Icons take their colour from context and are always
`aria-hidden`.

**Figures are ratioed, never cropped by height.** `4/3` in a split, `5/4` in a service
band, `4/5` for a portrait column figure. Set the ratio; let width decide the rest.

### Named Rules

**The Square Corner Rule.** Radius is zero. A rounded corner anywhere on this site is a
bug, not a variation.

**The Hairline-Only Rule.** Structural separation is one pixel of a line and nothing else.
No boxes, no panels, no filled containers, no pills, no bordered cards. The one exception
is `.tbc`, and it is an exception *because* it must look foreign.

## Components

### Buttons

- **Shape:** square (0 radius), `1px` transparent border reserved so ghost and solid variants share a box.
- **Type:** `0.875rem`, weight 680, **94% width**, `0.11em` tracking, uppercase.
- **Primary:** ink ground (`#0b1119`), paper text, `0.95rem 1.6rem`. Hover swaps the ground to Deep Gold with white text.
- **Gold:** structural gold ground (`#b8842a`) with gold-ground ink (`#1a1204`). This is the recruiting action, the capability-statement request in the masthead and the lead action in a hero or closing band. Hover lifts to `--gold-lift`.
- **Ghost:** transparent with a 32%-alpha ink border on paper, 40%-alpha light border on plate; hover fills solid and inverts. Always the *second* action, never alone.
- **Hover / active:** 0.24s on the decelerating ease; the trailing arrow icon translates `4px` right on hover; `:active` presses `1px` down. Disabled drops to 45% opacity and removes pointer events.
- **Masthead variant:** the same gold button at `0.72rem 1.15rem` / `0.75rem` type, `white-space: nowrap`.

### Links

- **Drawn underline** (`.link`): Deep Gold on paper, Lifted Gold on plate, 660 weight at 96% width. The underline is a `linear-gradient` background sized `100% 1px` at the bottom edge, on hover it **retracts to zero width** over 0.34s rather than appearing. The link is underlined at rest and un-underlines under the cursor; that inversion is deliberate.
- **Body and footer links** take colour from context; footer links go from On-Plate-Soft to Lifted Gold on hover.
- **Detail links** (`<dd>` in a contact list) carry a 55%-alpha gold bottom border that solidifies to Deep Gold on hover.

### Inputs / Fields

- **Style:** white ground on paper, `1px #c9c9c1` border, square, `0.9rem 1rem`, `1rem` type. Textareas start at `9rem` and resize vertically only.
- **Label:** condensed gold caps (`0.75rem`, 700, 88%, `0.15em`), stacked `0.5rem` above the control. Optional qualifiers run in Faint Ink at lighter weight.
- **Hover:** border darkens to `#9aa0a4`. **Focus:** border becomes Deep Gold and an `inset 0 0 0 1px` doubles it, a two-pixel gold edge with no glow and no outline offset.
- **Select:** native appearance removed; the chevron is two 45°/135° `linear-gradient` triangles painted in Deep Gold, with `2.75rem` of right padding reserved.
- **Error:** `:user-invalid` only, never on load, never on blur-before-input. The border goes `#b03a24` and a sibling `.err` message reveals in `#9c2f1c`. Every required field has its message written into the markup.
- **Plate variant** exists in full (5%-alpha white ground, plate-rule border, Lifted Gold focus and labels) though no form currently sits on a plate.

### Navigation

- **Masthead:** fixed, `5rem` minimum height, transparent over the hero with a gradient scrim, solid plate past 40px scroll. `scroll-padding-top: 6rem` keeps anchored headings clear of it.
- **Links:** `0.8125rem`, 620 weight, **92% width**, `0.12em`, uppercase, On-Plate. A gold hairline underneath scales in from the left on hover; the current page holds it scaled and takes Lifted Gold text.
- **Mobile (<56rem):** the horizontal nav and its adjacent button are hidden, a bordered `Menu` toggle appears, and the panel becomes a fixed full-height plate sheet below the header. Inside the panel links restyle completely, `1.25rem`, 104% width, sentence case, ruled, no underline animation, because they are now a document list, not a bar. Body scroll locks; Escape closes and returns focus to the toggle; a resize past 896px closes it.
- **Footer:** three columns at ≥56rem, headings in condensed gold caps, a `1px` plate rule above the base row.

### Photography

The signature treatment, and the reason ten unrelated stock frames read as one commission.
There are three calibrated grades, and the differences between them are intentional:

- **Standard frame** (`.ph`): `grayscale(0.66) contrast(1.09) brightness(0.92)`, plus a `#17293d` layer at `mix-blend-mode: color` and 55% opacity, plus a vertical scrim (30% → 12% → 46%). The container carries `isolation: isolate` so the blend cannot escape into the page beneath. A `--flat` modifier swaps the vertical scrim for a flat 28% wash.
- **Page header** (`.pagehead__ph`): pushed further, `grayscale(0.72) contrast(1.06) brightness(0.62)`, wash at 60%, plus a 96° horizontal scrim from 94% to 50%, because display type sits directly on it.
- **Hero** (`.hero__ph`): deliberately *lighter*, `grayscale(0.34) contrast(1.12) brightness(0.94) saturate(0.86)` and **no colour-blend wash**, so the rig keeps enough of itself to be legible at full-bleed scale. Its scrim is asymmetric instead: 94° from 93% opaque behind the copy to 10% at the right edge, so the image survives where the text isn't. Below 62rem, where copy spans the full width, that asymmetric scrim is replaced with a vertical one.

Every image carries intrinsic `width`/`height`, `loading="lazy"` below the fold, and
`fetchpriority="high"` on the hero. Decorative images take `alt=""`; content images
describe the scene, not the company.

### Service Index (signature)

The three-service strip pinned across the base of the first viewport, a `1fr 1fr 1fr`
grid on a translucent plate band with a blurred backdrop, each cell separated by a plate
hairline on its left edge and introduced by a Lifted Gold stroke icon. Below 62rem the
columns stack, the left borders become top borders, and the descriptive note is dropped
entirely rather than compressed. This is the element that replaces the category's
three-icon card row; it is a ruled index, not cards, and it must stay that way.

### Ruled Rows and Scope Lists (signature)

The system's two list forms, both built from hairlines and nothing else:

- **Ruled rows** (`.rows`): a term/definition pair. Stacked below 52rem; above it, a `minmax(12rem, 0.42fr) 1fr` grid on a shared baseline. A `--gold` modifier puts the term in Deep Gold. This is the value-proposition and company-values pattern.
- **Scope lists** (`.scope`): ruled single lines with a small gold tick, two-up above 44rem. An odd final item spans both columns so no half-length rule is left hanging.

### Track Record Table

A real `<table>` with a caption, wrapped in an `overflow-x: auto` scroller and given a
`46rem` minimum width (`34rem` below 44rem). Head cells are condensed gold caps sitting on
a **structural gold** bottom border, the one place the gold rule appears as part of a
component rather than as a standalone ornament. Body cells are top-aligned with light
hairlines. Status is a text pill preceded by a `0.5rem` **square** dot in `currentColor`:
Deep Gold for open, `#2f6a4f` for complete.

### The Markers (signature, do not soften)

Two components exist to make unverified content impossible to miss. They are the only
place in the system where a dashed stroke or a filled container appears, and that
foreignness is the entire function.

- **`.tbc`**, a block panel: `1px dashed` structural gold, a 7%-alpha gold ground, a condensed gold-caps heading, and body copy explaining what is missing and who must supply it. It marks content that is absent.
- **`.unconfirmed`**, an inline badge: dashed gold, 9%-alpha ground, `0.6875rem` condensed caps in Deep Gold, sitting inside a heading or term. It marks a claim that is written but not verified.

Both have full plate-ground variants. They ship *in production* and are removed by
deleting the element once the content is confirmed, never by restyling them.

### Motion

One authored moment and one grammar for everything else. All of it is gated on `html.js`,
which is set by an inline script in `<head>` before first paint, so nothing is ever hidden
from a reader without JavaScript.

- **The hero opening:** the photograph unfolds from a `inset(46% 0 46% 0)` clip to full frame over 1.25s while scaling 1.14 → 1 over 1.8s. Copy and the service index fade up 18px, staggered `0.085s` apart after a `0.42s` delay, with the index counted as the last item in the sequence.
- **Reveal:** `[data-reveal]` elements start 14px low and transparent and settle on intersection (`threshold: 0.08`, `rootMargin: 0 0 -12% 0`), unobserved after firing. `[data-reveal-group]` re-indexes stagger *within its own group* rather than globally, so a section deep in the page doesn't inherit a two-second delay.
- **The rule draws.** A `[data-reveal]` on a gold rule scales it in from the left over 0.85s instead of fading it. This is the system's one piece of pure ornament-in-motion.
- **Photographs settle** out of a `scale(1.07)` push-in over 1.5s.
- **Easing and duration:** one curve, `cubic-bezier(0.16, 1, 0.3, 1)`, and a base duration of `0.62s`. Interaction transitions run 0.2–0.34s; entrances run 0.6–1.8s.
- **Reduced motion:** `prefers-reduced-motion: reduce` sets every revealed element to its final state, cancels the hero clip and the image push-in, disables smooth scrolling, and clamps all remaining transitions and animations to `0.01ms`. Without `IntersectionObserver`, everything reveals immediately.

### Focus and Skip

`:focus-visible` draws a `2px` Deep Gold outline at `3px` offset (Lifted Gold on plate and
hero). The skip link is a solid ink block in condensed caps, parked above the viewport and
sliding down on focus.

### Print

The site prints as the document it imitates: masthead, service index, burger and skip link
are removed; every ground is forced to white with black ink; **all photography is dropped
entirely**; and external link hrefs are appended in parentheses after their text. Written
for the evaluator who prints a vendor page into a tender pack.

## Do's and Don'ts

### Do:

- **Do** place a new section in the paper/plate sequence first. Check the table in Layout, the page's ground rhythm is its structure, and two plate bands must never touch.
- **Do** set `font-stretch` on every new text role. Use the width ramp in Typography: 112–116% for display, 100% for reading, 88–94% for anything small and tracked.
- **Do** use `--gold-deep` for gold text on paper and `--gold-lift` for gold text on plate. Never `--gold`.
- **Do** separate things with a `1px` hairline, `--rule-light` on paper, `--rule-plate` on plate, and use the gold `.rule` element as a section opener above a heading, followed by `1.6rem`.
- **Do** wrap any new photograph in `.ph`, so it inherits the grade, the wash, the scrim and the `isolation: isolate` that contains the blend. An ungraded image will not belong to this site.
- **Do** write base component styles for **paper first**, then add a `.plate ...` descendant override for the dark ground. The cascade runs light → dark; `.detail`, `.field`, `.tbc`, `.rows` and `.scope` are all built this way and this direction has already been inverted once by mistake.
- **Do** make every header, footer and SVG-sprite edit in `includes/header.php` or `includes/footer.php`, which are the only place that chrome exists. Site-wide values (contact details, nav labels, the live origin) live in `includes/config.php`, and the nav is a single array rendered into both the masthead and the footer. This replaced markup that was duplicated by hand across six files and drifted silently; do not reintroduce a copy.
- **Do** gate anything that hides content on `html.js`, and give it a `prefers-reduced-motion` off-switch. The site must be complete with `terk.js` absent.
- **Do** leave `.tbc` and `.unconfirmed` exactly as loud as they are, and remove them by deleting the element once the fact is confirmed.
- **Do** keep photography out of print and give every image intrinsic `width`/`height`.

### Don't:

- **Don't** add a card, a panel, a tinted container, a pill, or a bordered box. If content needs to separate, change the ground or draw a hairline.
- **Don't** add a `box-shadow`, a `drop-shadow`, a glow, or any radius above `0`. The only exceptions in the system are the inset focus ring and the `1px` on the focus outline.
- **Don't** set `color: var(--gold)`. Structural gold is a ground and a stroke only.
- **Don't** put a short label directly above a heading in the same column. That is a kicker; the statement band goes to the trouble of visually hiding its own label to avoid becoming one.
- **Don't** set headings or sentences in uppercase. Caps are reserved for label rank at 88–94% width with `0.11–0.17em` tracking.
- **Don't** reach for a second typeface, an icon font, or an emoji glyph. Icons are stroked SVG symbols in the page sprite with square caps and mitred joins.
- **Don't** normalise the three photographic grades to one set of numbers. The hero is deliberately less desaturated and carries no colour-blend wash so the rig stays readable; the page header is deliberately darker because display type sits on it.
- **Don't** add new spacing values by hand. The rhythm is `1.6rem` after a rule, `1.35rem` after a heading, `2rem` to a link, `2.35rem` to an action row, and `--band` / `--band-tight` between sections.
- **Don't** keep writing that rhythm as inline `style` attributes. The values are canon; the delivery mechanism is technical debt, promote a repeated inline margin into a class rather than adding a forty-first one.
- **Don't** use `--plate-raised`, `--steel`, or `--measure-tight`. They are declared in `:root` and referenced nowhere; they are not part of this system.
- **Don't** introduce a mid-tone grey ground. Four grounds exist and they are a ladder, not a palette.
