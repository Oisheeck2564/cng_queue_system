<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

include '../includes/header.php';
?>

<style>
body {
    background: linear-gradient(135deg, #3ed8e6, #c7e65e);
}

.dashboard-title {
    font-weight: bold;
    margin-bottom: 25px;
}

.admin-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    transition: 0.3s;
}

.admin-card:hover {
    transform: translateY(-5px);
}

.admin-btn {
    border-radius: 20px;
    padding: 8px 20px;
}
</style>
<main>
<div class="container mt-4 mb-5">

    <h2 class="dashboard-title">⚙ Admin Dashboard</h2>

    <div class="row g-4">

        <div class="col-md-6 col-lg-3">
            <div class="card admin-card text-center p-4">
                <h5>➕ Add Station</h5>
                <a href="add_station.php" class="btn btn-success admin-btn mt-2">Open</a>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card admin-card text-center p-4">
                <h5>🔄 Update Queue</h5>
                <a href="update_queue.php" class="btn btn-danger admin-btn mt-2">Open</a>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card admin-card text-center p-4">
                <h5>📊 View Queue</h5>
                <a href="../user/queue.php" class="btn btn-primary admin-btn mt-2">Open</a>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card admin-card text-center p-4">
                <h5>👥 Registered Users</h5>
                <a href="view_users.php" class="btn btn-warning admin-btn mt-2">Open</a>
            </div>
        </div>

    </div>

</div>
</main>
<?php include '../includes/footer.php'; ?>