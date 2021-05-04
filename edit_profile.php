<?php
include_once "includes/header.php";
include_once "database/db.php";
$db = db :: get();
if(isset($_GET["id"]) && $_GET["id"] >= 0 && $_SESSION["USER"]["PERMISSION_ID"] == 0){
    $queryString = "SELECT * FROM USERS WHERE USER_ID = ".$db->escape($_GET["id"]);
    $result = $db->getRow($queryString);
}else{
    $queryString = "SELECT * FROM USERS WHERE USER_EMAIL = ".$db->escape($_SESSION["USER"]["USER_EMAIL"]);
    $result = $db->getRow($queryString);
}
?>
    <head>
        <style>
            .datatitle {
                font-size: 20px;
            }
            .data {
                font-size: 15px;
            }
        </style>
    </head>
    <!-- start banner Area -->
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Profil adatok
                    </h1>
                    <p class="text-white link-nav"><a href="index.php">Kezdőlap </a>  <span class="lnr lnr-arrow-right"></span>  <a href="profil.php?id=<?php echo $_GET["id"]?>"> Profil</a> <span class="lnr lnr-arrow-right"></span> <a href="profil.php"> Profil szerkesztése</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start Align Area -->
    <div class="whole-wrap">
        <div class="container">
            <div class="section-top-border">


                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h3 class="mb-30">Profil adatok módosítása</h3>
                        <?php if(isset($_SESSION["updateError"])) :?>
                            <div class="alert alert-danger" role="alert">
                                <?php foreach($_SESSION["updateError"] as $error) : ?>
                                    <p style="margin-bottom: 0;"><?php echo $error ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; unset($_SESSION["updateError"]); ?>
                        <form method="POST" action="user_logic/update_user.php?id=<?php echo $result["USER_ID"] ?>">
                            <div class="mt-10">
                                <input type="text" name="username" id="username" placeholder="Felhasználónév" value="<?php echo $result["USERNAME"] ?>" required class="single-input">
                            </div>
                            <div class="mt-10">
                                <input type="text" name="user_email" id="user_email" placeholder="Email" value="<?php echo $result["USER_EMAIL"] ?>" required class="single-input">
                            </div>

                            <?php if($_SESSION["USER"]["PERMISSION_ID"] != 0) : ?>
                                <div class="mt-10">
                                    <input type="password" name="password" id="password" placeholder="Jelszó" required class="single-input">
                                </div>
                                <div class="mt-10">
                                    <input type="password" name="password_again" id="password_again" placeholder="Jelszó mégegyszer" required class="single-input">
                                </div>
                            <?php else : ?>
                                <div class="input-group-icon mt-10">
                                    <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <div class="form-select" id="default-select">
                                        <select name="permission" id="permission">
                                            <option value="1" <?php echo ($result["PERMISSION_ID"] == 1 ? "selected" : "") ?>>Felhasználó</option>
                                            <option value="0" <?php echo ($result["PERMISSION_ID"] == 0 ? "selected" : "") ?>>Ügyintéző</option>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="single-element-widget">
                                <div class="button-group-area">
                                    <button type="submit" class="genric-btn success-border large">Adatok módosítása</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h3 class="mb-30">Profil adatok</h3>
                        <div>
                            <p class="datatitle">Felhasználónév:</p>
                            <p class="data"></p>
                            <p class="datatitle">E-mail:</p>
                            <p class="data"></p>
                            <p class="datatitle">Jegyek:</p>
                            <p class="data">Ide jönnek majd a jegyek.</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- End Align Area -->

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">

            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">

                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="single-footer-widget">
                            <h6>Kövessen minket!</h6>
                            <p>
                                Ne maradjon le semmiről! Találkozzunk a közösségi oldalakon, ahol rendszeresen jelentkezünk repülőjegy akciókkal, nyereményjátékokkal és úti cél ajánlókkal!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Menütérkép</h6>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li><a href="index.html">Kezdőlap</a></li>
                                    <li><a href="about.html">Rólunk</a></li>
                                    <li><a href="contact.html">Kapcsolat</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li><a href="hotels.html">Hotelek</a></li>
                                    <li><a href="insurance.html">Biztosítások</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">

                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <a>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

<?php include_once "includes/footer.php"?>