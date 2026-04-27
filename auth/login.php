<?php
session_start();
include '../config/db.php';

if ($_POST) {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['user'] = $user;

        if ($user['role'] == 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../user/dashboard.php");
        }
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

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
<div class="row justify-content-center">
<div class="col-md-4">

<div class="card p-4">
<h3 class="text-center">Login</h3>

<?php if(isset($error)) echo "<p class='text-danger'>$error</p>"; ?>

<form method="POST">
<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
<button class="btn btn-primary w-100">Login</button>
</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>