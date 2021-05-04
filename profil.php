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
							<p class="text-white link-nav"><a href="index.php">Kezdőlap</a> <?php echo ((isset($_GET["success"]) || isset($_GET["id"])) && $_SESSION["USER"]["PERMISSION_ID"] == 0 ? '<span class="lnr lnr-arrow-right"></span><a href="allUser.php">Felhasználók</a>' : '')?> <span class="lnr lnr-arrow-right"></span> <a href="#"> Profil</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start Align Area -->
			<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
                        <?php if(isset($_GET["success"])) :?>
                            <div class="alert alert-success" role="alert">
                                <p style="margin-bottom: 0;">Sikeres adatmódosítás!</p>
                            </div>
                        <?php endif; unset($_SESSION["success"]);?>

                        <div class="card">
                            <div class="card-header">
                                <b style="font-size: x-large;"><?php echo (isset($result["USERNAME"]) && $result["USERNAME"] != null ? $result["USERNAME"] : "Nincs ilyen felhasznalo!")?></b>
                                <a href="edit_profile.php?id=<?php echo (isset($result["USER_ID"]) && $result["USER_ID"] != null ? $result["USER_ID"] : "#")?>" class="btn btn-warning float-right" style="padding-bottom: 3px; padding-top: 3px;">Profil szerkesztese</a>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Email: </b><?php echo (isset($result["USER_EMAIL"]) && $result["USER_EMAIL"] != null ? $result["USER_EMAIL"] : "Nincs ilyen felhasznalo!")?></li>
                                <li class="list-group-item"><b>Jogosultság: </b> <?php echo (isset($result["PERMISSION_NAME"]) && $result["PERMISSION_NAME"] != null ? $result["PERMISSION_NAME"] : "Nincs ilyen felhasznalo!")?></li>
                            </ul>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <b style="font-size: x-large">Jegyek</b>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Honnan</th>
                                    <th scope="col">Hova</th>
                                    <th scope="col">Datum</th>
                                    <th scope="col">Ar</th>
                                    <th scope="col">Szerkeszt</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Olasz</td>
                                    <td>Magyar</td>
                                    <td>2020.12.12.</td>
                                    <td>50 000Ft</td>
                                    <td><a href="#" class="btn btn-warning">Szerkeszt</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Magyar</td>
                                    <td>Olasz</td>
                                    <td>2020.12.12.</td>
                                    <td>50 000Ft</td>
                                    <td><a href="#" class="btn btn-warning">Szerkeszt</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Magyar</td>
                                    <td>Nemet</td>
                                    <td>2020.12.12.</td>
                                    <td>150 000Ft</td>
                                    <td><a href="#" class="btn btn-warning">Szerkeszt</a></td>
                                </tr>
                                </tbody>
                            </table>
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