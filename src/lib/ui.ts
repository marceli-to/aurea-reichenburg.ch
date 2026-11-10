// Class lists shared by several components (Tailwind picks them up from this file).

/**
 * Hand-drawn blob buttons (Figma «Button», «Rund-Button»): hover like the landing page, tilt −2° at 80 % opacity,
 * 0.15 s. No position here: each blob sets relative or absolute itself.
 */
export const blob =
  'isolate transition duration-150 ease-out hover:-rotate-2 hover:opacity-80 focus-visible:-rotate-2 focus-visible:opacity-80 focus-visible:underline focus-visible:decoration-2 focus-visible:underline-offset-4';

/** The blob shape inside a blob button: stretched behind the label */
export const blobShape = 'absolute inset-0 -z-10 size-full';

/**
 * Fades a block up as it scrolls into view (the element also needs data-reveal). Base.astro marks blocks that start
 * below the visible area with .is-pending and removes it when they come into view; without JS or with reduced
 * motion everything is simply visible.
 */
export const reveal =
  'transition duration-900 ease-out [&.is-pending]:translate-y-40 [&.is-pending]:opacity-0 motion-reduce:[&.is-pending]:translate-y-0 motion-reduce:[&.is-pending]:opacity-100';
