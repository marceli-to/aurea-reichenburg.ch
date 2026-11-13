# Progress

## Done (2026-11-10)

- Astro 7 site from the Figma design: Startseite, Angebot, Wohnen, Lage, FAQ, Impressum, Datenschutz, 404
- Sizes and spacing from the Figma text styles and components (Professional plan, Dev seat); tokens in `src/styles/global.css`
- Beyonity navigator (Angebot, loads with the page) and show-flat tour (Wohnen, loads on click), URLs from Figma annotations
- Mapbox map with custom palette (token restricted to the live/staging domains and https://aurea-reichenburg.ch.test)
- AVIF/WebP images, sitemap.xml, robots.txt, llms.txt, JSON-LD (ApartmentComplex, FAQPage), OG image
- Styles as inline Tailwind classes; shared class lists in `src/lib/ui.ts`; theme tokens instead of arbitrary values
- Spacing on a 4 px rhythm (Figma's 5/10 values rounded to the nearest multiple of 4)
- Datenschutz names webkeeper GmbH (Volketswil) as hosting provider
- Accessibility: simple aria fixes (axe clean apart from olive/sand contrast 4.16:1, colours stay as designed); no focus rings by request
- PageSpeed: scroll reveal hides only blocks below the first screen (LCP fix); metric-matched Arial fallback for Adelle Sans (no CLS on font swap). Lighthouse mobile 90–96, desktop 99–100 except Angebot (84, Beyonity iframe: CLS 0.30, ~104 MB)

## Done (2026-11-11)

- Staging live at https://staging.aurea-reichenburg.ch (web root `/staging.aurea-reichenburg.ch/public`, SSH is chrooted)
- Absolute URLs (canonical, OG, JSON-LD, sitemap, llms.txt) follow `SITE_URL`, which deploy.sh sets to the deployed domain
- Typekit stylesheet loads without blocking render; sliders (Swiper) start shortly before they scroll into view; image quality 80
- Staging PageSpeed mobile before these: performance 87–92, accessibility 96 (contrast), SEO 69 (noindex on staging, expected). Server TTFB ~30 ms
- Decided: CSS stays in separate files (cached across pages), not inlined; image quality stays at 80

## Done (2026-11-13)

- Roxy feedback from the client (Dennis Stoz) on staging:
  - Sliders blurry: `Img` default `sizes` now allows for object-cover cropping landscape images into the square Split box (e.g. 89vw/178vw for 16:9)
  - Navigator filter button cut off: section capped at the window below the header (tokens `below-header`, `below-header-lg`)
  - Tour button text "looks smaller": already 18 px bold like the home button, no change
- Hero scroll button centred on mobile (was 56 px left of centre)
- Hero and tour images: `sizes` for their tall mobile crop (sharper on phones, larger downloads)
- Builds need Node 24 (`nvm use 24`); Node 22.19 is too old for Astro

## Next

- Content: FAQ answers, Baubeschrieb texts and PDF (placeholders in `src/data/content.ts`, `links.constructionPdf`)
- High-res original of the hero rendering (courtyard; currently 2000 px extracted from the PDF)
- Beyonity navigator: 104 MB / CLS from the iframe, ask Beyonity for a lighter variant or load on click
- Adobe Fonts kit jbj1dvt: set font-display to swap, allow the domain
- Re-run PageSpeed on staging (median of 2–3 runs); mobile images are larger since 850b51f
- Production: web root in `deploy.sh` (likely `/aurea-reichenburg.ch/public`, confirm with `pwd`), back up the Laravel landing page first
- Roxy widget (kimiyu) is in Base.astro since 8a571a6: confirm it should go live

## Local testing

- Production build (Node 24): `npm run build && npx astro preview --host 127.0.0.1 --port 4323`, open https://aurea-reichenburg.ch.test (Herd proxy to 4323; needed for the Mapbox token)
