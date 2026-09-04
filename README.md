# Elementor Extra Animations

**Version 1.0.0**

Redesigns Elementor's entrance animations to feel smaller, smoother, and
more modern, and adds 5 new ones. No custom panel, no JS, no dependencies —
two files, and every animation is still controlled entirely from
Elementor's own **Motion Effects > Entrance Animation** section.

## Files

| File | What it does |
|---|---|
| `elementor-extra-animations.php` | Adds 5 new options — Rise, Blur In, Scale Up, Reveal Up, Drift In — to Elementor's Entrance Animation dropdown. That's the only thing it does. |
| `elementor-extra-animations.css` | The actual animations: redesigned shapes for all 30 of Elementor's stock entrance animations, plus the 5 new Elementor Extra ones. |
| `elementor-extra-animations-demo.html` | Standalone demo page — not part of the install. Open it in a browser and scroll to see each animation trigger live, with a readout showing the exact `class` attribute flipping from `elementor-invisible` to `animated`. Useful for previewing the shapes/timing before installing, or for showing a client how the scroll-trigger works. |

## What's controllable, and from where

Everything lives in Elementor's own panel — **select any element → Advanced
tab → Motion Effects**:
- **Entrance Animation** — pick any stock animation, or one of the 5
  Elementor Extra ones (grouped under "Elementor Extra" in the dropdown).
- **Animation Duration** (Slow / Normal / Fast) and **Animation Delay
  (ms)** — Elementor's own native fields. This kit doesn't add a duration
  or speed control of its own; it reads whatever these are set to.

There is nothing else to configure. No separate "Elementor Extra Timing" section,
no site-wide settings panel.

## How it works

Elementor's stock animations come from the animate.css library, and every
option in the dropdown shares one global set of `@keyframes` with anything
else on the site that also loads animate.css. Rewriting those directly
would change animations outside our control. Instead, this kit's CSS
targets `.elementor-element.animated.{exact-class}` — a combination only
Elementor's own JS ever produces — and repoints just that combination at
new, smaller keyframes:

- **Fading** — soft blur-to-focus alongside a noticeable (32px) move.
- **Zooming** — a subtle scale (0.94 → 1), no blur, so it stays visually
  distinct from Fading.
- **Sliding** — a clearly bigger move (40px) than Fading, no scale, no
  blur — the most kinetic of the three.
- **Bouncing** — reuses the Zooming shapes, paired with a back-out
  ("spring") timing curve instead of ease-out. The overshoot in the curve
  itself reads as a bounce.
- **Rotating / Roll / Light Speed** — animate.css swings some of these up
  to 200°; restrained to small tilts/skews so they read as refined rather
  than dated.

Duration comes from Elementor's own `animated` / `animated-slow` /
`animated-fast` classes — that's what its native Animation Duration field
already outputs — so this kit never needs to read or override it. Same
mechanism applies to the 5 Elementor Extra animations, since Elementor's duration
control is attached to the element, not to which animation was picked.

Respects `prefers-reduced-motion: reduce` (Elementor doesn't check this
itself).

## Install

1. **PHP.** Install [WPCode](https://wordpress.org/plugins/insert-headers-and-footers/) → Add Snippet → PHP Snippet → paste `elementor-extra-animations.php` (everything below the `<?php` line) → Insertion: **Run Everywhere** → Save & activate.
2. **CSS.** Elementor → Custom Code → Add New → paste `elementor-extra-animations.css`, wrapped in `<style>` / `</style>` → any location → Publish.
3. Elementor → Tools → **Regenerate CSS**, then hard-refresh (or open in a private window) to clear any cached stylesheets.

That's the whole install. Open any element's Advanced tab → Motion Effects
to use it.

## Coming from an earlier version of this kit

If you previously installed a version with an **Elementor Extra Timing** section
(Exact Duration / Start At / Stagger Children) or a **Motion Kit** section
in Site Settings (Animation Speed / Smooth Default Animations): those
controls are gone, along with the JS file that powered Start At and
Stagger Children. Remove the old JS snippet from Elementor → Custom Code —
it has nothing left to do. Duration is now purely Elementor's native
Slow/Normal/Fast field; there's no site-wide speed multiplier anymore.

## Requirements

- WordPress + Elementor (free tier is enough).
- A way to add a PHP snippet — [WPCode](https://wordpress.org/plugins/insert-headers-and-footers/) (used above), a child theme's `functions.php`, or any PHP-snippet plugin.
- **Elementor Pro** for the Custom Code screen used to add the CSS. No Pro? Use WPCode's CSS Snippet type instead — same result.

## Testing notes

Checked before every release: `php -l` on the PHP, a real CSS parser on
the stylesheet, every `animation-name` cross-checked against its
`@keyframes` (no orphans either direction), and all 30 stock Elementor
entrance animations confirmed to have a redesign rule. No live
WordPress/Elementor install in the environment this was built in, so a
visual pass on staging is still worth doing.

Last run: `php -l` reported no syntax errors; a WP-shimmed execution of
the filter confirmed all 5 `eea-*` keys register correctly alongside an
existing animation group; the CSS parsed with 0 errors; all 22
`animation-name` declarations matched 1:1 against 22 `@keyframes` blocks
with no orphans in either direction; all 30 stock classes and all 5
`eea-*` classes were confirmed present.

## Author

Built by [Johan Azacon](https://www.linkedin.com/in/johanazacon/).

## License

Add a license (MIT is a common choice for a kit like this) before making
the repo public — none is included yet.
