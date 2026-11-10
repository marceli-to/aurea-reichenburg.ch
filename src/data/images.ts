// Every rendering with its alt text, so the sliders and single images stay in one place.
import type { ImageMetadata } from 'astro';
import hero from '../assets/images/aurea-aussen-innenhof.jpg';
import teich from '../assets/images/aurea-aussen-teich.jpg';
import balkon from '../assets/images/aurea-balkon-ausblick.jpg';
import arbeitszimmer from '../assets/images/aurea-innen-arbeitszimmer.jpg';
import badDusche from '../assets/images/aurea-innen-bad-dusche.jpg';
import badWanne from '../assets/images/aurea-innen-bad-wanne.jpg';
import kinderzimmer from '../assets/images/aurea-innen-kinderzimmer.jpg';
import kueche from '../assets/images/aurea-innen-kueche.jpg';
import schlafzimmer from '../assets/images/aurea-innen-schlafzimmer.jpg';
import wohnzimmer from '../assets/images/aurea-innen-wohnzimmer.jpg';
import sauna from '../assets/images/aurea-sauna.jpg';

export type Rendering = { src: ImageMetadata; alt: string; position?: string };

export const images = {
  hero: { src: hero, alt: 'Innenhof von auréa mit Wiese, Spielplatz und Holzschindelfassaden vor den Bergen' },
  teich: { src: teich, alt: 'Naturnahe Umgebung mit Blumenwiese zwischen den Häusern von auréa' },
  balkon: { src: balkon, alt: 'Loggia mit Esstisch und Blick auf die Glarner Alpen' },
  arbeitszimmer: { src: arbeitszimmer, alt: 'Zimmer mit Schreibtisch, Liegesofa und Holzboden' },
  badDusche: { src: badDusche, alt: 'Badezimmer mit bodenebener Dusche und Spiegelschrank' },
  badWanne: { src: badWanne, alt: 'Badezimmer mit Badewanne und Spiegelschrank' },
  kinderzimmer: { src: kinderzimmer, alt: 'Kinderzimmer mit Bett, Schreibtisch und Bergsicht' },
  kueche: { src: kueche, alt: 'Offene Küche mit Esstisch und Kochinsel' },
  schlafzimmer: { src: schlafzimmer, alt: 'Schlafzimmer mit Einbauschrank und Doppelbett' },
  wohnzimmer: { src: wohnzimmer, alt: 'Wohnzimmer mit Sofa, Bogenleuchte und Bergsicht' },
  sauna: { src: sauna, alt: 'Sauna mit Holzbänken und Saunakübel' },
} satisfies Record<string, Rendering>;

/** Slider contents, first image as in the design */
export const sliders = {
  zuhause: [images.kueche, images.wohnzimmer, images.schlafzimmer, images.kinderzimmer],
  etappe: [images.wohnzimmer, images.balkon, images.arbeitszimmer, images.badWanne],
  natuerlich: [images.schlafzimmer, images.kinderzimmer, images.arbeitszimmer, images.balkon],
  ausbau: [images.kueche, images.badWanne, images.badDusche, images.wohnzimmer],
};
