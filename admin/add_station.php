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

<h2>Add Station</h2>

<form method="POST">

<input type="text" name="name" class="form-control mb-2" placeholder="Station Name" required>

<input type="text" name="location" class="form-control mb-2" placeholder="Location" required>

<input type="text" name="latitude" class="form-control mb-2" placeholder="Latitude" required>

<input type="text" name="longitude" class="form-control mb-2" placeholder="Longitude" required>

<button class="btn btn-success">Add Station</button>

</form>

<?php include '../includes/footer.php'; ?>