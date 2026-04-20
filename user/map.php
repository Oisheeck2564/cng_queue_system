<?php include '../config/db.php'; ?>
<?php include '../includes/header.php'; ?>

<h3 class="mb-3">📍 Station Map</h3>

<div id="map" style="height:500px;"></div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
var map = L.map('map').setView([22.3569, 91.7832], 12);

// OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap'
}).addTo(map);

// Fetch stations
fetch('stations_api.php')
.then(res => res.json())
.then(data => {
    data.forEach(station => {

        let color = "green";
        if (station.crowd_level === "High") color = "red";
        if (station.crowd_level === "Medium") color = "orange";

        L.circleMarker([station.latitude, station.longitude], {
            color: color,
            radius: 10
        }).addTo(map)
        .bindPopup("<b>" + station.name + "</b><br>Crowd: " + station.crowd_level);
    });
});
</script>

<?php include '../includes/footer.php'; ?>