<?php include '../config/db.php'; ?>
<?php include '../includes/header.php'; ?>
<style>
    body {
        background: linear-gradient(135deg, #1d2671, #c33764);
        color: #fff;
    }

    .hero {
        padding: 60px 0;
    }

    @media (min-width: 768px) {
        .hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
        }
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    }

    .btn-custom {
        padding: 12px;
        font-size: 16px;
        border-radius: 8px;
    }

    .feature-box p {
        margin-bottom: 8px;
    }

    img.hero-img {
        width: 100%;
        border-radius: 10px;
        margin-top: 20px;
        object-fit: cover;
        max-height: 250px;
    }

    @media (min-width: 768px) {
        img.hero-img {
            max-height: 320px;
        }
    }
</style>
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