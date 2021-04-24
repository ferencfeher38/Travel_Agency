<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "user_logic/User.php";
?>
<!doctype html>
<html lang="hu">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Jegyfoglaló rendszer</title>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- elemet ebbe az unordered list-be rakhatunk -->
                <!--<li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>-->
            </ul>
            <?php if(isset($_SESSION["USER"]) && !empty($_SESSION["USER"])) :?>
            <form class="d-flex" method="POST">
                <button class="btn btn-outline-danger" type="submit" name="logout_btn" id="logout_btn">Kijelentkezés</button>
            </form>
            <?php endif; ?>
            <?php if(!isset($_SESSION["USER"]) || empty($_SESSION["USER"])) :?>
                <form class="d-flex" method="POST">
                    <a href="user_logic/login_template.php" class="btn btn-outline-success" type="button" name="btn" id="btn">Bejelentkezés</a>
                </form>
            <?php endif; ?>
        </div>
    </div>
</nav>