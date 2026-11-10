// @ts-check
import { defineConfig } from 'astro/config';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  site: 'https://aurea-reichenburg.ch',
  trailingSlash: 'always',
  // Fixed IPv4 address and its own port, so it runs next to the other Astro projects
  server: { host: '127.0.0.1', port: 4323 },
  vite: {
    plugins: [tailwindcss()],
    // mapbox-gl (~1.9 MB) is its own chunk, loaded only on the Lage page
    build: { chunkSizeWarningLimit: 2000 },
    server: { allowedHosts: ['aurea-reichenburg.ch.test'] },
  },
});
