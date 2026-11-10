# Progress

## Done (2026-11-10)

- Astro 7 site from the Figma design: Startseite, Angebot, Wohnen, Lage, FAQ, Impressum, Datenschutz, 404
- Sizes and spacing from the Figma text styles and components (Professional plan, Dev seat); tokens in `src/styles/global.css`
- Beyonity navigator (Angebot, loads with the page) and show-flat tour (Wohnen, loads on click), URLs from Figma annotations
- Mapbox map with custom palette (token restricted to the live/staging domains and https://aurea-reichenburg.ch.test)
- AVIF/WebP images, sitemap.xml, robots.txt, llms.txt, JSON-LD (ApartmentComplex, FAQPage), OG image
- Styles as inline Tailwind classes; shared class lists in `src/lib/ui.ts`

## Next

- Content: FAQ answers, Baubeschrieb texts and PDF (placeholders in `src/data/content.ts`, `links.constructionPdf`)
- High-res original of the hero rendering (courtyard; currently 2000 px extracted from the PDF)
- Deploy: web roots for live and staging in `deploy.sh`, staging subdomain, back up the Laravel landing page first
- Datenschutz: name the hosting provider
- Optional: drop `class="blank"` / `mt-[1lh]` in `Prose` and use the normal block gap
