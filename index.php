
<?php include_once "includes/header.php"?>
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h6 class="text-white">Európai utazások</h6>
							<h1 class="text-white">Utazzon Európa nagyvárosaiba</h1>
						</div>
						<div class="col-lg-4 col-md-6 banner-right">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Utak</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">Hotelek</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="holiday-tab" data-toggle="tab" href="#holiday" role="tab" aria-controls="holiday" aria-selected="false">Biztosítások</a>
							  </li>
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<form class="form-wrap">
									<input type="text" class="form-control" name="name" placeholder="Honnan? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">
									<input type="text" class="form-control" name="to" placeholder="Hova? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
									<input type="text" class="form-control date-picker" name="start" placeholder="Indulás " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
									<input type="text" class="form-control date-picker" name="return" placeholder="Visszaút " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
									<input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Felnőtt " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
									<input type="number" min="1" max="20" class="form-control" name="child" placeholder="Gyerek " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">
									<a href="#" class="primary-btn text-uppercase">Keresés</a>
								</form>
							  </div>
							  <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
								<form class="form-wrap">
                                    <input type="text" class="form-control" name="name" placeholder="Honnan? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">
                                    <input type="text" class="form-control" name="to" placeholder="Hova? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
                                    <input type="text" class="form-control date-picker" name="start" placeholder="Indulás " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
                                    <input type="text" class="form-control date-picker" name="return" placeholder="Visszaút " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                                    <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Felnőtt " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
                                    <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Gyerek " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">
									<a href="#" class="primary-btn text-uppercase">Keresés</a>
								</form>
							  </div>
                                <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
								<form class="form-wrap">
                                    <input type="text" class="form-control" name="name" placeholder="Honnan? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">
                                    <input type="text" class="form-control" name="to" placeholder="Hova? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
                                    <input type="text" class="form-control date-picker" name="start" placeholder="Indulás " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
                                    <input type="text" class="form-control date-picker" name="return" placeholder="Visszaút " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                                    <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Felnőtt " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
                                    <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Gyerek " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">
									<a href="#" class="primary-btn text-uppercase">Keresés</a>
								</form>							  	
							  </div>
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start szolgáltatások Area -->
			<section class="other-issue-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-9">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Szolgáltatásaink</h1>
		                    </div>
		                </div>
		            </div>					
					<div class="row">
						<div class="col-lg-4 col-md-7">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/o1.jpg" alt="">					
								</div>
								<a href="index.php">
									<h4>Repülőjegy foglalás</h4>
								</a>
								<p>
									Foglalja le előre repülőjegyét.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-7">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/o2.jpg" alt="">					
								</div>
								<a href="hotels.php">
									<h4>Hotelek</h4>
								</a>
								<p>
									Találja meg az Ön igényeihez megfelelő hotelt.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-7">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/o3.jpg" alt="">					
								</div>
								<a href="insurance.php">
									<h4>Biztosítások</h4>
								</a>
								<p>
									Válogassan különböző biztosítások közül.
								</p>
							</div>
						</div>																	
					</div>
				</div>	
			</section>
			<!-- End other-issue Area -->

			<!-- Start popular-destination Area -->
			<section class="popular-destination-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Népszerű utak</h1>
		                        <p>Válogass a legnépszerűbb útjaink között!</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/d1.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">$150</a>			
									<h4>Mountain River</h4>
									<p>Paraguay</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/d2.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">$250</a>			
									<h4>Dream City</h4>
									<p>Paris</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/d3.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">$350</a>			
									<h4>Cloud Mountain</h4>
									<p>Sri Lanka</p>			
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End popular-destination Area -->
			

			<!-- Start price Area -->
			<section class="price-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Lenyűgöző utak elfogadható áron!</h1>
		                        <p>Értelmiségi emberek, mint például a világ tudósai is ezért választják utazásainkat.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Cheap Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Sri Lanka</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nepal</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thiland</span>
										<a href="#" class="price-btn">$1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Singapore</span>
										<a href="#" class="price-btn">$1500</a>
									</li>														
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Luxury Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Sri Lanka</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nepal</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thiland</span>
										<a href="#" class="price-btn">$1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Singapore</span>
										<a href="#" class="price-btn">$1500</a>
									</li>														
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Camping Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Sri Lanka</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Nepal</span>
										<a href="#" class="price-btn">$1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thiland</span>
										<a href="#" class="price-btn">$1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Singapore</span>
										<a href="#" class="price-btn">$1500</a>
									</li>														
								</ul>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End price Area -->
								
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