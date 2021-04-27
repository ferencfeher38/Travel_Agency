<?php include_once "includes/header.php";

    include_once "database/db.php";
    $db = db::get();
    $queryString = "SELECT * FROM INSURANCE";
    $result = $db->query($queryString);
?>
			
			  
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Biztosítások				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Kezdőlap </a>  <span class="lnr lnr-arrow-right"></span>  <a href="insurance.php"> Biztosítások</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start insurence Area -->
			<section class="insurence-one-area section-gap">
				<div class="container">
					<div class="row align-items-center">

                        <?php foreach ($result as $row) :?>

                            <div class="col-lg-4 insurence-left">
                                <h1><?php echo $row["INSURANCE_NAME"] ?></h1>
                                <div class="list-wrap">
                                    <ul>
                                        <li><b><?php echo "Ár: ".$row["INSURANCE_PRICE"]."Ft" ?></b></li>
                                    </ul>
                                </div>
                            </div>

                        <?php endforeach; ?>

				</div>	
			</section>
			<!-- End insurence-one Area -->					

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">

					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<div class="single-footer-widget">
								<h6>About</h6>
								<p>
									 Szöveg
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
											<li><a href="index.php">Kezdőlap</a></li>
											<li><a href="about.php">Rólunk</a></li>			          					          		          
											<li><a href="contact.php">Kapcsolat</a></li>
										</ul>
									</div>
									<div class="col">
										<ul>
											<li><a href="hotels.php">Hotelek</a></li>
											<li><a href="insurance.php">Biztosítások</a></li>	
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