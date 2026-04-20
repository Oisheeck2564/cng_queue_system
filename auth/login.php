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