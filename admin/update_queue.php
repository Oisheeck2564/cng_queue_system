<?php
session_start();

include '../config/db.php';
include '../includes/header.php';

$msg = "";

/* =========================
   UPDATE / INSERT LOGIC
========================= */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $station = intval($_POST['station_id']);
    $level = $_POST['crowd'];

    $check = $conn->query("SELECT * FROM queue_status WHERE station_id=$station");

    if ($check && $check->num_rows > 0) {
        $conn->query("UPDATE queue_status SET crowd_level='$level' WHERE station_id=$station");
        $msg = "updated";
    } else {
        $conn->query("INSERT INTO queue_status (station_id, crowd_level) VALUES ($station, '$level')");
        $msg = "inserted";
    }
}

$result = $conn->query("SELECT * FROM stations");
?>

<style>
body {
    background: linear-gradient(135deg, #1d2671, #c33764);
    color: #fff;
}

/* =========================
   SLIDE POPUP STYLE
========================= */
.slide-toast {
    position: fixed;
    top: 20px;
    right: -350px;
    min-width: 280px;
    max-width: 320px;
    padding: 15px 18px;
    border-radius: 10px;
    color: #fff;
    font-weight: 500;
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    z-index: 9999;
    transition: all 0.5s ease;
}

.slide-toast.show {
    right: 20px;
}

.slide-success {
    background: #28a745;
}

.slide-info {
    background: #0d6efd;
}

.slide-close {
    float: right;
    cursor: pointer;
    font-weight: bold;
}
</style>

<div class="container mt-4">

<h2>Update Queue Status</h2>

<!-- =========================
     SLIDE POPUP MESSAGE
========================= -->
<?php if ($msg) { ?>

<div id="toast" class="slide-toast 
    <?= $msg == "updated" ? "slide-success" : "slide-info" ?>">

    <span class="slide-close" onclick="hideToast()">×</span>

    <?= $msg == "updated" 
        ? "Queue Updated Successfully!" 
        : "Queue Added Successfully!" ?>
</div>

<script>
window.onload = function () {
    let toast = document.getElementById("toast");
    toast.classList.add("show");

    setTimeout(hideToast, 3000);
};

function hideToast() {
    let toast = document.getElementById("toast");
    if (toast) {
        toast.classList.remove("show");
    }
}
</script>

<?php } ?>


<!-- =========================
     FORM
========================= -->
<div class="card p-4 mt-3 text-dark">

<form method="POST">

<select name="station_id" class="form-control mb-2" required>
<?php while($row = $result->fetch_assoc()) { ?>
<option value="<?= $row['id'] ?>">
    <?= $row['name'] ?>
</option>
<?php } ?>
</select>

<select name="crowd" class="form-control mb-2" required>
<option value="Low">Low</option>
<option value="Medium">Medium</option>
<option value="High">High</option>
</select>

<button class="btn btn-danger w-100">Update</button>

</form>

</div>

</div>

<?php include '../includes/footer.php'; ?>