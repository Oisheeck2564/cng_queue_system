<?php
include '../config/db.php';
include '../includes/header.php';

if ($_POST) {
    $station = $_POST['station_id'];
    $level = $_POST['crowd'];

    $check = $conn->query("SELECT * FROM queue_status WHERE station_id=$station");

    if ($check->num_rows > 0) {
        $conn->query("UPDATE queue_status SET crowd_level='$level' WHERE station_id=$station");
    } else {
        $conn->query("INSERT INTO queue_status (station_id,crowd_level) VALUES ($station,'$level')");
    }

    echo "<p class='text-success'>Updated!</p>";
}

$result = $conn->query("SELECT * FROM stations");
?>

<h2>Update Queue Status</h2>

<form method="POST">

<select name="station_id" class="form-control mb-2">
<?php while($row = $result->fetch_assoc()) { ?>
<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
<?php } ?>
</select>

<select name="crowd" class="form-control mb-2">
<option>Low</option>
<option>Medium</option>
<option>High</option>
</select>

<button class="btn btn-danger">Update</button>

</form>

<?php include '../includes/footer.php'; ?>