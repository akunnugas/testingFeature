<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map Style with Search</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Leaflet Search Plugin -->
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
        // Inisialisasi map
        var map = L.map('map').setView([-7.9666, 112.6326], 13); // Koordinat Malang

        // Basemap layer
        var basemap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Leaflet Control Geocoder untuk fitur pencarian
        L.Control.geocoder({
            defaultMarkGeocode: false
        }).on('markgeocode', function (e) {
            var latlng = e.geocode.center;
            var address = e.geocode.name;

            // Tambah marker di lokasi yang dicari
            var marker = L.marker(latlng).addTo(map).bindPopup(address).openPopup();
            map.setView(latlng, 16);

            // Kirim data lokasi ke backend
            saveLocation(latlng.lat, latlng.lng, address);
        }).addTo(map);

        // Fungsi untuk menyimpan lokasi ke database
        function saveLocation(latitude, longitude, address) {
            fetch('/save-location', {
                method: 'POST', // Pastikan menggunakan metode POST
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Tambahkan CSRF token untuk keamanan
                },
                body: JSON.stringify({
                    latitude: latitude,
                    longitude: longitude,
                    address: address
                })
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
</body>

</html>