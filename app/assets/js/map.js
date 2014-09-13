$(document).ready(function($) {

    var zoom = 4;
    var proj4326 = new OpenLayers.Projection("EPSG:4326");
    var projmerc = new OpenLayers.Projection("EPSG:900913");
    var lonlat = new OpenLayers.LonLat(-118, 49);
    lonlat.transform(proj4326, projmerc);

    var map = new OpenLayers.Map("map-content");

    // add google streets to base layer
    var gmap = new OpenLayers.Layer.Google("Google Maps");

    var layer_cloud = new OpenLayers.Layer.XYZ(
        "clouds",
        "http://${s}.tile.openweathermap.org/map/clouds/${z}/${x}/${y}.png",
        {
            isBaseLayer: false,
            opacity: 0.7,
            sphericalMercator: true
        }
    );

    var layer_precipitation = new OpenLayers.Layer.XYZ(
        "precipitation",
        "http://${s}.tile.openweathermap.org/map/precipitation/${z}/${x}/${y}.png",
        {
            isBaseLayer: false,
            opacity: 0.7,
            sphericalMercator: true
        }
    );

    var pressure_contour = new OpenLayers.Layer.XYZ(
        "Pressure",
        "http://${s}.tile.openweathermap.org/map/pressure_cntr/${z}/${x}/${y}.png",
        {
            numZoomLevels: 19,
            isBaseLayer: false,
            opacity: 0.4,
            sphericalMercator: true

        }
    );
    pressure_contour.setVisibility(false);

    map.addLayers([gmap, layer_cloud, layer_precipitation, pressure_contour]);
    map.addControl(new OpenLayers.Control.LayerSwitcher());
    map.setCenter(lonlat, zoom);
});