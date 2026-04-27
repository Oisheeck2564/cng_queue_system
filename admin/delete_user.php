<?php
session_start();
include __DIR__ . '/../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
}

header("Location: view_users.php");
exit();