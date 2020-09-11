
(function() {
  var latlng = {
    lat: {{ $appartamento->latitudine }},
    lng: {{$appartamento->longitudine}}
  };

  var placesAutocomplete = places({
    appId: 'plT92Q60ZYBJ',
    apiKey: 'b2d1f81e1e0aa1ead87da414255dda36',
    container: document.querySelector('#input-map')
  }).configure({
    aroundLatLng: latlng.lat + ',' + latlng.lng,
    aroundRadius: 10 * 1000,
    type: 'address'
  });

  var map = L.map('map-example', {
    scrollWheelZoom: false,
    zoomControl: false
  });

  var osmLayer = new L.TileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      minZoom: 16,
      maxZoom: 20,
      attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
    }
  );
  //
  var markers = [];

  map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
  map.addLayer(osmLayer);
  //
  // placesAutocomplete.on('suggestions', handleOnSuggestions);
  // placesAutocomplete.on('cursorchanged', handleOnCursorchanged);
  // placesAutocomplete.on('change', handleOnChange);
  //
  // function handleOnSuggestions(e) {
  //   markers.forEach(removeMarker);
  //   markers = [];
  //
  //   if (e.suggestions.length === 0) {
  //     map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
  //     return;
  //   }
  //
  //   e.suggestions.forEach(addMarker);
  //   findBestZoom();
  // }
//
//   function handleOnChange(e) {
//     markers
//       .forEach(function(marker, markerIndex) {
//         if (markerIndex === e.suggestionIndex) {
//           markers = [marker];
//           marker.setOpacity(1);
//           findBestZoom();
//         } else {
//           removeMarker(marker);
//         }
//       });
//   }
//
//   function handleOnClear() {
//     map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
//   }
//
//   function handleOnCursorchanged(e) {
//     markers
//       .forEach(function(marker, markerIndex) {
//         if (markerIndex === e.suggestionIndex) {
//           marker.setOpacity(1);
//           marker.setZIndexOffset(1000);
//         } else {
//           marker.setZIndexOffset(0);
//           marker.setOpacity(0.5);
//         }
//       });
//   }
//
  function addMarker(suggestion) {
    var marker = L.marker(suggestion.latlng, {opacity: .4});
    marker.addTo(map);
    markers.push(marker);
  }
//
//   function removeMarker(marker) {
//     map.removeLayer(marker);
//   }
//
//   function findBestZoom() {
//     var featureGroup = L.featureGroup(markers);
//     map.fitBounds(featureGroup.getBounds().pad(0.5), {animate: false});
//   }
})();
