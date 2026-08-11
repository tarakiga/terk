# Image credits and replacement register

Every photograph on this site is **licensed stock, not Terk Energy's own material**.
None of them depict Terk's assets, people, sites or projects, and no caption or
alt text on the site claims that they do.

All are from [Pexels](https://www.pexels.com), under the
[Pexels licence](https://www.pexels.com/license/): free for commercial use,
no attribution required. Attribution is recorded here anyway, as a courtesy and
so the provenance of every file is traceable.

| File | Subject | Photographer | Source |
|---|---|---|---|
| `hero-offshore.jpg` | Offshore rig at sunset | Anoop VS | [pexels.com/photo/34389698](https://www.pexels.com/photo/offshore-oil-rig-at-sunset-in-calm-sea-34389698/) |
| `platform.jpg` | Offshore platform at sea | Jan-Rune Smenes Reite | [pexels.com/photo/3207536](https://www.pexels.com/photo/oil-platfrom-rig-in-the-middle-of-the-ocean-3207536/) |
| `tanker.jpg` | Oil tanker at sea, dusk | Punit Singh | [pexels.com/photo/36563588](https://www.pexels.com/photo/oil-tanker-at-sea-during-sunset-36563588/) |
| `tanker-alt.jpg` | Oil tanker, side profile | Eyüpcan Timur | [pexels.com/photo/33333666](https://www.pexels.com/photo/massive-oil-tanker-sailing-on-open-sea-33333666/) |
| `pipeline.jpg` | Pipelines across terrain | Jijo Johnny | [pexels.com/photo/19319100](https://www.pexels.com/photo/pipelines-on-the-mountainside-19319100/) |
| `pipeyard.jpg` | Steel tubulars in a yard | Shuaizhi Tian | [pexels.com/photo/33791802](https://www.pexels.com/photo/industrial-steel-pipes-with-overhead-crane-in-yard-33791802/) |
| `welding.jpg` | Welder at work | Hoang NC | [pexels.com/photo/15888226](https://www.pexels.com/photo/a-welder-at-work-15888226/) |
| `refinery.jpg` | Refinery at night | Tom Fisk | [pexels.com/photo/10407689](https://www.pexels.com/photo/oil-refinery-at-night-10407689/) |

**Two files are the client's own, not stock.** `hsse.jpg` and `advisory.jpg` were
supplied by Terk Energy and show African workers, one of them wearing Terk-branded
PPE. They replaced stock photographs whose subjects were not African. Because they
carry Terk's own mark and colour, both are rendered with the lighter `.ph--own`
grade rather than the heavy unifying grade used on stock; see DESIGN.md.

Both were delivered with a generation sparkle in the bottom-right corner. That
corner has been cropped away, and each file was resampled from the full-resolution
original rather than the smaller export: `hsse.jpg` is 1400 x 1958 and
`advisory.jpg` is 1800 x 1078.

All remaining files were re-fetched at reduced widths (1280–1920px) after the first build,
bringing the set from 6.9 MB to 4.5 MB. Per-page image payload is now 0.58 MB
(contact) to 2.3 MB (home), and on every page only the header image loads
eagerly, everything below the fold is `loading="lazy"`. Keep replacements in
that range: the audience includes offices on poor connections, and every
photograph sits under a heavy dark grade where fine detail is invisible anyway.

`terk-mark.png` is Terk Energy's own logo, supplied by the client
(`ref/ChatGPT Image Aug 11, 2026, 10_36_55 PM.png`). **Ask the client for a
vector original (SVG, AI or EPS)**, the supplied file is a 416 × 563 raster and
will soften on large displays.

## Replacing these

Each slot is marked in the HTML with a numbered comment, `TERK-PLACEHOLDER nn`.
Search the project for `TERK-PLACEHOLDER` to find all of them. To swap an image,
drop the new file in this folder under the same name and the site picks it up
no code change needed, provided the new file is roughly the same aspect ratio.

Images that were deliberately rejected during sourcing, for reasons worth keeping
on file: several otherwise-good candidates showed real third-party company logos
on hard hats and hi-vis vests, and one carried a photographer's watermark burnt
into the frame. The primary offshore-platform shot (`platform.jpg`) shows a real
operating semi-submersible with legible hull markings; it is used only as a
secondary interior image, and the hero uses the unbranded silhouette instead.
Apply the same test to any replacement: **no other company's name or mark
should be legible in a photograph on Terk's site.**
