const initMap = () => {
  mapboxgl.accessToken = 'pk.eyJ1IjoibWFyY2VsaXRvb29vIiwiYSI6ImNtNm1hNG5vdDBmaGUya3NoZnRldnhqd3YifQ.CMI4nKvoE7I8H9Dal7IHyw';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/marcelitoooo/ck16ms7m51nlo1cmwnqrbjuyq?optimize=true',
    center: [8.986927,47.167713],
    zoom: 11
  });
  map.addControl(new mapboxgl.NavigationControl());
  map.scrollZoom.disable();

  var geojson = {
    type: 'FeatureCollection',
    features: [{
      type: 'Feature',
      geometry: {
        type: 'Point',
        coordinates: [8.986927,47.167713]
      },
      properties: {
        title: 'Wohnen in Zürich-Wipkingen',
        description: 'Zürich'
      }
    }]
  };

  // add markers to map
  geojson.features.forEach(function(marker) {

  // create a HTML element for each feature
  var el = document.createElement('div');
  el.className = 'marker';

  // make a marker for each feature and add to the map
  new mapboxgl.Marker(el)
    .setLngLat(marker.geometry.coordinates)
    .addTo(map);
  });
};

const loadMapScript = () => {
  var script = document.createElement('script');
  script.src = 'https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js';
  script.async = true;
  document.head.appendChild(script);

  script.onload = () => {
    const mapEl = document.getElementById('map');
    if (mapEl !== null) {
      initMap();
    }
  }
}

loadMapScript();



