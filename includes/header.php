<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "user_logic/User.php";
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Travel</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                    <ul>
                        <li><a href="#">Visit Us</a></li>
                        <li><a href="#">Buy Tickets</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                    <div class="header-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a>Repülőjegy</a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="index.php">Jegyfoglalás</a></li>
                    <li><a href="about.php">Rólunk</a></li>
                    <li><a href="hotels.php">Hotelek</a></li>
                    <li><a href="insurance.php">Biztosítások</a></li>
                    <li><a href="contact.php">Kapcsolat</a></li>
                    <?php if(isset($_SESSION["USER"]) && !empty($_SESSION["USER"])) :?>
                            <li><a class="nav-link active" aria-current="page" href="profil.php">Profil </a></li>
                            <li><a href="user_logic/logout.php" type="submit" name="logout_btn" id="logout_btn">Kijelentkezés</a></li>
                    <?php endif; ?>
                    <?php if(!isset($_SESSION["USER"]) || empty($_SESSION["USER"])) :?>
                        <form class="d-flex" method="POST">
                            <li><a href="login_template.php" type="button" name="btn" id="btn">Bejelentkezés</a></li>
                        </form>
                    <?php endif; ?>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>
<!-- #header -->