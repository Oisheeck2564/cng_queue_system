<?php
session_start();
if ($_SESSION['user']['role'] != 'admin') {
    header("Location: ../auth/login.php");
}
include '../includes/header.php';
?>
<style>
    body {
        background: linear-gradient(135deg, #3ed8e6, #c7e65e);
        color: #4b2a2a;
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
<h2 class="mb-4">⚙ Admin Dashboard</h2>

<div class="row card-container">

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
<div class="col-md-4">
    <div class="card p-4 text-center">
        <h4>👥 Registered Users</h4>
        <a href="view_users.php" class="btn btn-warning">View Users</a>
    </div>
</div>

</div>

<?php include '../includes/footer.php'; ?>