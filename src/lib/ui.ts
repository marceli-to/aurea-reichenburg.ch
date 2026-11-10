// Class lists shared by several components (Tailwind picks them up from this file).

/**
 * Hand-drawn blob buttons (Figma «Button», «Rund-Button»): hover like the landing page, tilt −2° at 80 % opacity,
 * 0.15 s. No position here: each blob sets relative or absolute itself.
 */
export const blob =
  'isolate transition-[rotate,opacity] duration-150 ease-out hover:-rotate-2 hover:opacity-80 focus-visible:-rotate-2 focus-visible:opacity-80';

/** The blob shape inside a blob button: stretched behind the label */
export const blobShape = 'absolute inset-0 -z-10 size-full';

/**
 * Fades a block up as it scrolls into view. Base.astro marks <html> with .js and adds .is-visible
 * (the element also needs data-reveal); without JS or with reduced motion everything is simply visible.
 */
export const reveal =
  'in-[.js]:translate-y-40 in-[.js]:opacity-0 transition-[opacity,translate] duration-900 ease-out [&.is-visible]:translate-y-0 [&.is-visible]:opacity-100 motion-reduce:in-[.js]:translate-y-0 motion-reduce:in-[.js]:opacity-100';
