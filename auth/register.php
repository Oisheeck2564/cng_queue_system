<?php
include '../config/db.php';

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $conn->query("INSERT INTO users (name,email,password) VALUES ('$name','$email','$pass')");
    echo "<p class='text-success'>Registered Successfully!</p>";
}
?>

<?php include '../includes/header.php'; ?>

<div class="row justify-content-center">
<div class="col-md-4">

<div class="card p-4">
<h3>Register</h3>

<form method="POST">
<input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

<button class="btn btn-success w-100">Register</button>
</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>