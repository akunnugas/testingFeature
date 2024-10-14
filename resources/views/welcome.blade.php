<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map Style</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Leaflet Search CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script>
        // Initialize map
        var map = L.map('map').setView([-7.9666, 112.6326], 13); // Koordinat Malang

        // Basemap layer (Default style)
        var basemap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Style layers (ganti URL TileLayer sesuai kebutuhan)
        var streetLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Street Style &copy; OpenStreetMap contributors'
        });

        var darkLayer = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            maxZoom: 19,
            attribution: 'Dark Style &copy; CartoDB'
        });

        // Control to switch layers
        var baseMaps = {
            "Street": streetLayer,
            "Dark": darkLayer
        };

        L.control.layers(baseMaps).addTo(map);
    </script>
</body>

</html>