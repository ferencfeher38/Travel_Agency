<?php
include_once "includes/header.php";
include_once "database/db.php";
$db = db :: get();
$queryString = "SELECT USERNAME, USER_EMAIL FROM USERS WHERE USER_EMAIL = ".$db->escape($_SESSION["USER"]["USER_EMAIL"]);
$result = $db->getRow($queryString);
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
							<p class="text-white link-nav"><a href="index.html">Kezdőlap </a>  <span class="lnr lnr-arrow-right"></span>  <a href="profil.html"> Profil</a></p>
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
								<h3 class="mb-30">Profil adatok</h3>
                                <div>
                                    <p class="datatitle">Felhasználónév:</p>
                                    <p class="data"><?php echo $result["USERNAME"]?></p>
                                    <p class="datatitle">E-mail:</p>
                                    <p class="data"><?php echo $result["USER_EMAIL"]?></p>
                                    <p class="datatitle">Jegyek:</p>
                                    <p class="data">Ide jönnek majd a jegyek.</p>
                                </div>
							</div>
						</div>
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