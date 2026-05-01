<?php
include __DIR__ . '/../config/db.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>CNG Queue System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* NAVBAR GRADIENT */
.navbar-custom {
    background: linear-gradient(135deg, #17b0b0, #1a8e8a);
    padding: 12px 20px;
}

/* BRAND STYLE */
.navbar-brand {
    font-size: 20px;
    letter-spacing: 1px;
    color: #fff !important;
    margin-right: 40px; /* spacing from menu */
}

/* BUTTON STYLE */
.nav-btn {
    border-radius: 20px;
    padding: 6px 14px;
    font-size: 14px;
}

/* SEARCH BOX */
.search-box {
    width: 250px;
    border-radius: 20px;
    border: none;
    padding: 6px 12px;
}
.search-box:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(255,255,255,0.5);
}
</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-custom navbar-expand-lg">
  <div class="container-fluid">

    <!-- BRAND -->
    <a class="navbar-brand fw-bold" href="/cng_queue_system">
      CNG Queue System
    </a>

    <!-- MENU + SEARCH -->
    <div class="d-flex align-items-center gap-2 flex-wrap">

      <a href="/cng_queue_system" class="btn btn-light nav-btn">Home</a>

      <a href="/cng_queue_system/user/map.php" class="btn btn-light nav-btn">Stations</a>

      <a href="/cng_queue_system/auth/login.php" class="btn btn-outline-light nav-btn">Login</a>

      <!-- SEARCH BOX -->
      <form class="d-flex ms-3" action="/cng_queue_system/search.php" method="GET">
        <input class="search-box" type="search" name="q" placeholder="Search stations...">
      </form>

    </div>

  </div>
</nav>

<div class="container mt-4">