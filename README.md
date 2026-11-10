# auréa Reichenburg

Website for auréa, 60 rental apartments in Reichenburg SZ (letting: Sanjo Management AG, design: Stoz).
Astro 7, Tailwind 4, static output, deployed by rsync.

## Setup

```sh
nvm use            # Node 24
npm install
cp .env.example .env   # add the Mapbox token (pk.…)
npm run dev        # http://127.0.0.1:4323, or https://aurea-reichenburg.ch.test via Herd proxy
npm run build      # astro check + build to dist/
```

## Where things live

- `src/data/site.ts` – contact, navigation, external links (empty links render as `#` until known), Beyonity embeds
  (navigator on Angebot, show-flat tour on Wohnen), map settings
- `src/data/content.ts` – apartment counts, highlights, move-in dates, FAQ and Baubeschrieb (placeholder answers)
- `src/data/images.ts` – renderings with alt texts and the slider contents
- `src/components/Split.astro` – the half image / half text section used on every page
- `src/assets/images/` – renderings (max 2880 px); Astro builds AVIF/WebP in several widths
- `src/pages/robots.txt.ts`, `sitemap.xml.ts`, `llms.txt.ts` – generated at build time
- `public/og.jpg` – social preview (hero + logo)

The Mapbox token is restricted to aurea-reichenburg.ch, staging.aurea-reichenburg.ch and
https://aurea-reichenburg.ch.test: locally the map only loads through the Herd proxy
(`herd proxy aurea-reichenburg.ch http://127.0.0.1:4323 --secure`), not on 127.0.0.1.

Fonts: Adelle Sans from the landing page's Adobe Fonts kit `jbj1dvt` (the domain must be allowed in the kit).
Sizes and spacing come from the Figma file (text styles Mobile/… and Desktop/…). Regular text is set 5 % smaller than
in Figma, because the designer's desktop Adelle Sans Regular runs narrower than the web font (see `global.css`).

## Deploy

`./deploy.sh` (staging) or `./deploy.sh production`, `--dry-run` to preview. Builds the committed state, needs
`PUBLIC_MAPBOX_TOKEN` in `.env`. Staging gets a noindex header and a blocking robots.txt.
SSH: `aurea-reichenbur@aurea-reichenburg.ch`, port 2121 (password). The web roots at the top of `deploy.sh` are still empty.
