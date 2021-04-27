<?php include_once "includes/header.php";

include_once "database/db.php";
$db = db::get();
$queryString = "SELECT * FROM HOTEL";
$result = $db->query($queryString);
?>
			
			  
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Hotelek				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Kezdőlap </a>  <span class="lnr lnr-arrow-right"></span>  <a href="hotels.php"> Hotelek</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start destinations Area -->
			<section class="destinations-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-40 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Népszerű hotelek</h1>
		                    </div>
		                </div>
		            </div>						
					<div class="row">

                        <?php foreach($result as $row): ?>
                        <div class="col-lg-4">
                            <div class="single-destinations">
                                <div class="thumb">
                                    <img src="img/hotels/d5.jpg" alt="">
                                </div>
                                <div class="details">
                                    <h4 class="d-flex justify-content-between">
                                        <span><?php echo $row["HOTEL_NAME"] ?></span>
                                        <!--<div class="star">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                        </div>-->
                                    </h4>
                                    <p>
                                        View on map   |   49 Reviews
                                    </p>
                                    <ul class="package-list">
                                        <li class="d-flex justify-content-between align-items-center">
                                            <span>Medence</span>
                                            <span>Igen</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center">
                                            <span>Konditerem</span>
                                            <span>Nem</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center">
                                            <span>Wi-fi</span>
                                            <span>Igen</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center">
                                            <span>Szoba szervíz</span>
                                            <span>Nem</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center">
                                            <span>Légkondicionáló</span>
                                            <span>Igen</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center">
                                            <span>Étterem</span>
                                            <span>Igen</span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-center">
                                            <span>Ár/éjszaka</span>
                                            <a href="#" class="price-btn">40000Ft</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>


					</div>
				</div>	
			</section>
			<!-- End destinations Area -->
						
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
                            <a>© 2021 utazas.hu | <script>document.write(new Date().getFullYear());</script> Minden jog fenntartva.</a>
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