"""Terk Energy: prepare the photographs for the printed profile.

Two jobs, both of which have to happen here rather than in the document's CSS.

Size. The site's images are stored whole and sized for a screen at full width.
Most of those pixels fall outside the crop on the page. Each one is cut to the
shape of the box it occupies and sized for about 200dpi there, finer than a
laser printer or a digital press resolves at these dimensions.

Grade. The site pushes every photograph through one desaturated blue-black
grade so that a set of separately sourced frames reads as a single art
direction. On the web that is a CSS filter. In a PDF it cannot be: a filtered
image can no longer be carried as the JPEG it came from, so the renderer
rasterises the whole page instead and the file goes from two megabytes to
twelve. Baking the same grade into the file keeps both the look and the size.

Run when a photograph in assets/img changes, or when a box on the page changes
shape:

    python print/prepare-images.py

Then rebuild the PDF with print/build.ps1.
"""
import colorsys
import pathlib

from PIL import Image, ImageEnhance

ROOT = pathlib.Path(__file__).resolve().parent.parent
OUT = ROOT / "print" / "img"
OUT.mkdir(exist_ok=True)

DPI = 200
MM = DPI / 25.4

WASH = (0x17, 0x29, 0x3D)   # the blue-black the site washes photographs with

# The site's two grades, from assets/css/terk.css.
#   grey, contrast, brightness, wash opacity
GRADE_STOCK = (0.66, 1.09, 0.92, 0.55)   # .ph
GRADE_OWN = (0.24, 1.04, 0.98, 0.20)     # .ph--own, Terk's own photography
GRADE_COVER = (0.85, 1.05, 0.42, 0.45)   # the cover, held right down

# filename -> (width mm, height mm, vertical focus 0 = top, grade)
# The box sizes must match the ones in company-profile.html.
PLAN = {
    "hero-offshore.jpg": (210, 297, 0.5, GRADE_COVER),
    "pipeyard.jpg": (82, 96, 0.5, GRADE_STOCK),
    "pipeline.jpg": (174, 78, 0.5, GRADE_STOCK),
    "welding.jpg": (174, 84, 0.5, GRADE_STOCK),
    "tanker-alt.jpg": (174, 84, 0.5, GRADE_STOCK),
    "advisory.jpg": (174, 84, 0.42, GRADE_OWN),
    "hsse.jpg": (174, 104, 0.30, GRADE_OWN),
}


def grade(img, grey, contrast, brightness, wash):
    """The CSS grade, applied to the pixels instead of at render time."""
    img = Image.blend(img, img.convert("L").convert("RGB"), grey)
    img = ImageEnhance.Contrast(img).enhance(contrast)
    img = ImageEnhance.Brightness(img).enhance(brightness)

    # mix-blend-mode: color, which takes hue and saturation from the wash and
    # keeps the luminosity of the photograph underneath.
    h, s, _ = colorsys.rgb_to_hsv(*[c / 255 for c in WASH])
    hue = Image.new("L", img.size, round(h * 255))
    sat = Image.new("L", img.size, round(s * 255))
    washed = Image.merge("HSV", (hue, sat, img.convert("HSV").getchannel("V"))).convert("RGB")
    return Image.blend(img, washed, wash)


def darken_down_page(img, top=0.30, bottom=0.86):
    """A vertical fall-off across the cover, so the text at the foot holds."""
    px = img.load()
    height = img.height
    for y in range(height):
        k = top + (bottom - top) * (y / (height - 1))
        k = 1 - k
        for x in range(img.width):
            r, g, b = px[x, y]
            px[x, y] = (round(r * k), round(g * k), round(b * k))
    return img


for name, (box_w, box_h, focus, params) in PLAN.items():
    img = Image.open(ROOT / "assets" / "img" / name).convert("RGB")
    target_w, target_h = round(box_w * MM), round(box_h * MM)
    target_ratio = target_w / target_h

    # Crop to the shape of the box: the same result as CSS object-fit: cover.
    if img.width / img.height > target_ratio:
        crop_w = round(img.height * target_ratio)
        left = (img.width - crop_w) // 2
        img = img.crop((left, 0, left + crop_w, img.height))
    else:
        crop_h = round(img.width / target_ratio)
        top = round((img.height - crop_h) * focus)
        img = img.crop((0, top, img.width, top + crop_h))

    if img.width > target_w:
        img = img.resize((target_w, target_h), Image.LANCZOS)

    img = grade(img, *params)
    if name == "hero-offshore.jpg":
        img = darken_down_page(img)

    dst = OUT / name
    img.save(dst, "JPEG", quality=84, optimize=True, progressive=False)
    print(f"{name:22} {img.width:>5} x {img.height:<5} {dst.stat().st_size // 1024:>5} KB")
