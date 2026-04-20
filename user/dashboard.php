<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
}
include '../includes/header.php';
?>

<h2 class="mb-4">👤 User Dashboard</h2>

<div class="row">

<div class="col-md-4">
<div class="card p-4 text-center">
<h4>📍 Map</h4>
<a href="map.php" class="btn btn-primary">Open</a>
</div>
</div>

<div class="col-md-4">
<div class="card p-4 text-center">
<h4>🚦 Queue Status</h4>
<a href="queue.php" class="btn btn-warning">Check</a>
</div>
</div>

<div class="col-md-4">
<div class="card p-4 text-center">
<h4>📡 Nearby</h4>
<a href="nearby.php" class="btn btn-success">Find</a>
</div>
</div>

</div>

<?php include '../includes/footer.php'; ?>