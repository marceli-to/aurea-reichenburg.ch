import type { APIRoute } from 'astro';
import { contact, project, site } from '../data/site';
import { apartments, applicationsFrom, highlights, moveIn } from '../data/content';

/** A plain Markdown summary of the site for language models (https://llmstxt.org) */
export const GET: APIRoute = () => {
  const url = (path: string) => new URL(path, site.url).href;
  const total = apartments.reduce((sum, { count }) => sum + count, 0);

  const body = `# auréa Reichenburg SZ

> ${site.description}

auréa ist ein Wohnensemble aus drei Mehrfamilienhäusern mit ${total} Mietwohnungen auf rund 7’300 m² am Rand des Quartiers «Obere Allmeind» in Reichenburg SZ. Die Überbauung grenzt direkt an die Landwirtschaftszone und bietet Sicht auf den Säntis und die Glarner Alpen. Alle Wohnungen werden im Minergie-Standard realisiert, die Fassade ist mit Engadiner Lärchenschindeln verkleidet, eine hauseigene Photovoltaikanlage produziert einen grossen Teil des Stroms.

## Wohnungen

${apartments.map(({ count, rooms }) => `- ${count} × ${rooms}-Zimmerwohnung`).join('\n')}
- Garten-, Geschoss- und Attikawohnungen (mit Dachterrassen)
- Ausstattung: Einbauküche mit grossem Kühlschrank inkl. TK-Schubladen, Backofen mit Steamer-Funktion, Induktionskochfeld; barrierefreie Duschen; Komfortlüftung, Free-Cooling, Bodenheizung; Waschturm oder Kombigerät in der Wohnung; Kellerabteil mit Stromanschluss

## Gemeinschaftliche Angebote

${highlights.map(({ label }) => `- ${label}`).join('\n')}

## Bezug und Bewerbung

Die Häuser werden etappenweise fertiggestellt, die Vermietung erfolgt gestaffelt. Voraussichtliche Bezugstermine:

${moveIn.map(({ building, date }) => `- ${building}: ${date}`).join('\n')}

Ab dem ${applicationsFrom} können Bewerbungen für die Wohnungen in Haus 11 eingereicht werden, über den Wohnungsnavigator. Für Haus 9 und 18 ist eine Bewerbung später möglich.

## Adresse und Kontakt

- Projekt: ${project.street}, ${project.postalCode} ${project.city} ${project.canton}, Schweiz
- Vermietung: ${contact.company}, ${contact.street}, ${contact.postalCode} ${contact.city}
- Telefon: ${contact.phone}
- E-Mail: ${contact.email}

## Seiten

- [Startseite](${url('/')})
- [Angebot](${url('/angebot/')}): Übersicht der Überbauung
- [Wohnen](${url('/wohnen/')}): Wohnungstypen, Ausbau, Umgebung, Baubeschrieb
- [Lage](${url('/lage/')}): Lage, Karte und Quartierentwicklung
- [FAQ](${url('/faq/')}): häufige Fragen zu Bewerbung, Bezug und Angeboten
- [Impressum](${url('/impressum/')}), [Datenschutz](${url('/datenschutz/')})
`;

  return new Response(body, { headers: { 'Content-Type': 'text/markdown; charset=utf-8' } });
};
