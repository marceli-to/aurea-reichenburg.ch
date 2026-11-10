// Mapbox map (see src/components/Map.astro). Settings come from src/data/site.ts via data-map.

type Config = { token: string; style: string; zoom: number; title: string; center: [number, number] };

const LOCALE = {
  'ScrollZoomBlocker.CtrlMessage': 'Zum Zoomen Strg + Scrollen verwenden',
  'ScrollZoomBlocker.CmdMessage': 'Zum Zoomen ⌘ + Scrollen verwenden',
  'TouchPanBlocker.Message': 'Karte mit zwei Fingern bewegen',
  'NavigationControl.ZoomIn': 'Vergrössern',
  'NavigationControl.ZoomOut': 'Verkleinern',
  'NavigationControl.ResetBearing': 'Nach Norden ausrichten',
};

// The design's map: warm light grey land, white roads, soft blue water, pale green parks, grey labels.
// Layers are matched by source layer and type, not by id, so this survives changes to the base style.
const PALETTE = {
  land: '#e9e7e2',
  green: '#cfe0b4',
  building: '#dddad3',
  water: '#a9c8f2',
  road: '#ffffff',
  roadCase: '#d9d6cf',
  line: '#a3a09a',
  path: '#f4f3ef',
  text: '#5e5d59',
  halo: 'rgba(255, 255, 255, 0.85)',
};

/** Only these landuse classes are green; farmland, wood and settlement stay land-grey as in the design */
const GREEN_CLASSES = ['park', 'pitch', 'cemetery', 'playground'];

/** The landing page's pin, in oxblood */
const PIN =
  '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40.8 52.8" width="40" height="52" aria-hidden="true" style="display:block"><path d="M40.8,20.4A20.4,20.4,0,0,0,0,20.4C0,31.7,20.4,52.8,20.4,52.8S40.8,31.7,40.8,20.4ZM10.9,20a9.5,9.5,0,1,1,9.5,9.5A9.6,9.6,0,0,1,10.9,20Z" fill="#964f4c"/></svg>';

function applyPalette(map: import('mapbox-gl').Map) {
  for (const layer of map.getStyle()?.layers ?? []) {
    const id = layer.id;
    const source = 'source-layer' in layer ? layer['source-layer'] : undefined;
    const set = (property: string, value: unknown) => map.setPaintProperty(id, property as never, value as never);

    if (layer.type === 'background') set('background-color', PALETTE.land);
    else if (layer.type === 'symbol') {
      // No shops, restaurants and other points of interest, as in the design
      if (source === 'poi_label' || source === 'transit_stop_label') map.setLayoutProperty(id, 'visibility', 'none');
      set('text-color', PALETTE.text);
      set('text-halo-color', PALETTE.halo);
    } else if (source === 'water' || source === 'waterway') set(layer.type === 'fill' ? 'fill-color' : 'line-color', PALETTE.water);
    else if (source === 'building') set('fill-color', PALETTE.building);
    else if (source === 'landcover') set('fill-color', PALETTE.land);
    else if ((source === 'landuse' || source === 'landuse_overlay') && layer.type === 'fill') {
      set('fill-color', ['match', ['get', 'class'], GREEN_CLASSES, PALETTE.green, PALETTE.land]);
    } else if (source === 'road' && layer.type === 'line') {
      // Rails dashed grey as in the design; streets white; field and forest paths barely visible
      const thin = /rail|ferry|aerial/.test(id);
      const path = /path|steps|pedestrian|track/.test(id);
      set('line-color', thin ? PALETTE.line : path ? PALETTE.path : id.endsWith('-case') ? PALETTE.roadCase : PALETTE.road);
    } else if (source === 'admin' || source === 'aeroway') set(layer.type === 'fill' ? 'fill-color' : 'line-color', PALETTE.line);
  }
}

export async function initMap(el: HTMLElement) {
  const config: Config = JSON.parse(el.dataset.map ?? '{}');
  if (!config.token) return;

  const [{ default: mapboxgl }] = await Promise.all([import('mapbox-gl'), import('mapbox-gl/dist/mapbox-gl.css')]);
  mapboxgl.accessToken = config.token;

  const map = new mapboxgl.Map({
    container: el,
    style: config.style,
    center: config.center,
    zoom: config.zoom,
    // One finger scrolls the page, two fingers move the map
    cooperativeGestures: true,
    attributionControl: false,
    locale: LOCALE,
  });
  map.addControl(new mapboxgl.NavigationControl({ showCompass: false }), 'top-right');
  map.addControl(new mapboxgl.AttributionControl({ compact: true }));
  // Before the first frame, so the base colours never flash up
  map.once('style.load', () => applyPalette(map));

  const node = document.createElement('div');
  node.innerHTML = PIN;
  node.title = config.title;
  new mapboxgl.Marker({ element: node, anchor: 'bottom' }).setLngLat(config.center).addTo(map);

  const reveal = () => el.classList.remove('opacity-0');
  map.once('load', reveal);
  // 'load' never fires if the style or tiles fail: reveal anyway instead of leaving an invisible area
  map.once('error', reveal);
}
