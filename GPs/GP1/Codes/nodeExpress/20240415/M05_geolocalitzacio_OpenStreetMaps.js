/*
 * programa que mostra com es pot treballar amb l'API geolocalitzacio
 * i openStreetMaps
 * @author sergi.grau@fje.edu
 * @version 1.0
 * date 03.11.2020
 * format del document UTF-8
 *
 * CHANGELOG
 * 03.11.2020
 * - programa que mostra com es pot treballar amb l'API geolocalitzacio
 * https://geoadmin.github.io/ol3/apidoc/ol.style.Style.html
 *
 * NOTES
 * ORIGEN
 * Desenvolupament en entorn client. Escola del clot
 */

function iniciar() {
  navigator.geolocation.getCurrentPosition(function (position) {
    var pos = {
      lat: position.coords.latitude,
      lng: position.coords.longitude,
    };
    console.log(pos);

    var view = new ol.View({
      center: ol.proj.fromLonLat([pos.lng, pos.lat]),
      zoom: 16,
    });

    var map = new ol.Map({
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM(),
        }),
      ],
      target: "mapa",
      controls: ol.control.defaults({
        attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
          collapsible: false,
        }),
      }),
      view: view,
    });
  });
}

window.addEventListener("load", iniciar, true);
