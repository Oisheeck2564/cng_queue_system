<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit();
}

include '../includes/header.php';

// Flash message (login success)
if (isset($_SESSION['login_success'])) {
    $msg = $_SESSION['login_success'];
    unset($_SESSION['login_success']);
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

<!-- ✅ LOGIN SUCCESS POPUP -->
<?php if (!empty($msg)) { ?>
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="loginToast" class="toast align-items-center text-bg-success border-0 show" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <?= $msg ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        let toast = document.getElementById("loginToast");
        if (toast) toast.style.display = "none";
    }, 3000);
</script>
<?php } ?>

<?php include '../includes/footer.php'; ?>