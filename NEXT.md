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

## Next

- Content: FAQ answers, Baubeschrieb texts and PDF (placeholders in `src/data/content.ts`, `links.constructionPdf`)
- High-res original of the hero rendering (courtyard; currently 2000 px extracted from the PDF)
- Beyonity navigator: 104 MB / CLS from the iframe, ask Beyonity for a lighter variant or load on click
- Adobe Fonts kit jbj1dvt: set font-display to swap, allow the domain
- Deploy: web roots for live and staging in `deploy.sh`, staging subdomain, back up the Laravel landing page first

## Local testing

- Production build: `npm run build && npx astro preview --host 127.0.0.1 --port 4323`, open https://aurea-reichenburg.ch.test (Herd proxy to 4323; needed for the Mapbox token)
