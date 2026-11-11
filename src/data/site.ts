export const site = {
  name: 'auréa Reichenburg',
  /** From `site` in astro.config.mjs (production, or staging when deploy.sh builds for staging), no trailing slash */
  url: import.meta.env.SITE.replace(/\/$/, ''),
  description:
    'auréa in Reichenburg SZ: 60 Mietwohnungen mit 2.5 bis 5.5 Zimmern in drei Mehrfamilienhäusern im Minergie-Standard, mit Schwimmteich, Sauna, Schrebergärten und Bergblick. Bezug ab 2028.',
};

/** The project's address, as in the Lage section */
export const project = {
  street: 'Auhof 9, 11 & 18',
  postalCode: '8864',
  city: 'Reichenburg',
  canton: 'SZ',
  country: 'CH',
  /** [longitude, latitude], the order Mapbox uses (same point as on the landing page) */
  coordinates: [8.986927, 47.167713] as [number, number],
};

/** Letting agent, shown in the footer, the FAQ and the Impressum */
export const contact = {
  company: 'Sanjo Management AG',
  street: 'Ziegelwies 2',
  postalCode: '8852',
  city: 'Altendorf',
  phone: '+41 55 446 60 40',
  email: 'info@sanjo.ch',
  url: 'https://www.sanjo.ch',
};

export const nav = [
  { label: 'angebot', href: '/angebot/' },
  { label: 'wohnen', href: '/wohnen/' },
  { label: 'lage', href: '/lage/' },
  { label: 'faq', href: '/faq/' },
];

export const legalNav = [
  { label: 'Impressum', href: '/impressum/' },
  { label: 'Datenschutz', href: '/datenschutz/' },
];

/**
 * External links. An empty string renders the button anyway, pointing nowhere ("#"),
 * until the address is known.
 */
export const links = {
  /** «zum navigator» buttons: the Angebot page, where the navigator is embedded */
  navigator: '/angebot/',
  constructionPdf: '',
  municipality: 'https://www.reichenburg.ch',
  instagram: 'https://www.instagram.com/sanjo.ch/',
  // From the Figma design
  route: 'https://maps.app.goo.gl/QZdPFWB7m9XH3YA19',
  agency: 'https://www.stoz.ch',
};

/** "+41 55 446 60 40" → "tel:+41554466040" */
export const tel = (phone: string) => `tel:${phone.replace(/\s/g, '')}`;

/** Lage map (Mapbox) */
export const map = {
  style: 'mapbox://styles/mapbox/light-v11',
  zoom: 13.5,
  title: `auréa, ${project.street}, ${project.postalCode} ${project.city}`,
};

/** Beyonity tools, embedded as iframes (URLs from the Figma annotations) */
export const embeds = {
  /** Apartment navigator on Angebot, loads with the page */
  navigator: 'https://navigator5.beyonity.ch/?id=7322A88B',
  /** Realtime tour of the show flat on Wohnen, loads on click behind a preview */
  tour: 'https://tour.beyonity.ch/?id=48935',
};
