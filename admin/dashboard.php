<?php
session_start();
if ($_SESSION['user']['role'] != 'admin') {
    header("Location: ../auth/login.php");
}
include '../includes/header.php';
?>

<h2 class="mb-4">⚙ Admin Dashboard</h2>

<div class="row">

<div class="col-md-4">
<div class="card p-4 text-center">
<h4>➕ Add Station</h4>
<a href="add_station.php" class="btn btn-success">Add</a>
</div>
</div>

<div class="col-md-4">
<div class="card p-4 text-center">
<h4>🔄 Update Queue</h4>
<a href="update_queue.php" class="btn btn-danger">Update</a>
</div>
</div>

<div class="col-md-4">
<div class="card p-4 text-center">
<h4>📊 View Queue</h4>
<a href="../user/queue.php" class="btn btn-primary">View</a>
</div>
</div>

</div>

<?php include '../includes/footer.php'; ?>