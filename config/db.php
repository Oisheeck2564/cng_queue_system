<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "cng_system";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional but recommended
$conn->set_charset("utf8mb4");
?>