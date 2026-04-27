<?php
include '../config/db.php';
include '../includes/header.php';

if ($_POST) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $lat = $_POST['latitude'];
    $lng = $_POST['longitude'];

    $conn->query("INSERT INTO stations (name,location,latitude,longitude)
                  VALUES ('$name','$location','$lat','$lng')");

    echo "<p class='text-success'>Station Added!</p>";
}
?>
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
<h2>Add Station</h2>

<form method="POST">

<input type="text" name="name" class="form-control mb-2" placeholder="Station Name" required>

<input type="text" name="location" class="form-control mb-2" placeholder="Location" required>

<input type="text" name="latitude" class="form-control mb-2" placeholder="Latitude" required>

<input type="text" name="longitude" class="form-control mb-2" placeholder="Longitude" required>

<button class="btn btn-success">Add Station</button>

</form>

<?php include '../includes/footer.php'; ?>