// Texts that appear on more than one page or in llms.txt. Page copy that only appears once lives in the page.

export const apartments = [
  { count: 21, rooms: '2.5' },
  { count: 18, rooms: '3.5' },
  { count: 15, rooms: '4.5' },
  { count: 6, rooms: '5.5' },
];

export const highlights = [
  { icon: 'schwimmteich', label: 'Schwimmteich' },
  { icon: 'schrebergaerten', label: 'Schrebergärten mit Gemüsebeet' },
  { icon: 'spielflaeche', label: 'Spielfläche' },
  { icon: 'sauna', label: 'Sauna mit Ruheraum' },
] as const;

/** Expected move-in dates, in the order the buildings are completed */
export const moveIn = [
  { building: 'Auhof 11', date: '01.03.2028' },
  { building: 'Auhof 18', date: '01.06.2028' },
  { building: 'Auhof 9', date: '01.07.2028' },
];

export const applicationsFrom = '03.03.2027';

// TODO: placeholder text until the client sends the content
const dummy =
  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';

export const faq = [
  'Wann ist der Bezugstermin der Wohnungen?',
  'Ab wann kann ich meine Bewerbung einsenden?',
  'Welche Unterlagen sind für die Bewerbung erforderlich?',
  'Gibt es eine Sicherheitsleistung und wie hoch ist sie?',
  'Sind Haustiere erlaubt?',
  'Welche Parkplätze stehen zur Verfügung und wie viel beträgt der Mietzins?',
  'Kann die Wohnung vor der Bewerbung vor Ort besichtigt werden?',
  'Wie erhalte ich einen Grundrissplan mit den jeweiligen Massen der Wohnung?',
  'Kann die Wohnung zu einem späteren Zeitpunkt vor Ort ausgemessen werden?',
  'Wo befindet sich die Sauna und wie kann sie benützt werden?',
  'Was ist zum Schwimmteich zu wissen?',
  'Was ist zu den Schrebergärten zu wissen?',
].map((question) => ({ question, answer: dummy }));

export const construction = {
  date: '05.2026',
  items: [
    'Fassade',
    'Fenster',
    'Sonnenschutz',
    'Aussenfläche',
    'Wohnbereich',
    'Küche',
    'Nasszellen',
    'Wärme',
    'Allgemeine Schreinerarbeiten',
    'Beleuchtung',
    'Keller',
    'Parkierung',
    'Allgemein',
    'Umgebung',
  ].map((question) => ({ question, answer: dummy })),
};
