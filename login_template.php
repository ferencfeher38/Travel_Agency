<?php include_once "includes/header.php"?>
			
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h1 class="text-white">Bejelentkezés</h1>
						</div>
						<div class="col-lg-6 col-md-10 banner-right">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link  <?php echo (isset($_SESSION["registError"]) ? "" : "active")?> " id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Bejelentkezés</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link  <?php echo (isset($_SESSION["registError"]) ? "active" : "")?>" id="regist-tab" data-toggle="tab" href="#regist" role="tab" aria-controls="regist" aria-selected="false">Regisztráció</a>
							  </li>						
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade <?php echo (isset($_SESSION["registError"]) ? "" : "show active")?>" id="login" role="tabpanel" aria-labelledby="login-tab">
								<form class="form-wrap" form method="POST" action="user_logic/login.php">
									<?php if(isset($_SESSION["error"])) :?>
										<div class="alert alert-danger" role="alert">
									<?php foreach($_SESSION["error"] as $error) : ?>
										<p style="margin-bottom: 0;"><?php echo $error ?></p>
									<?php endforeach; ?>
									</div>
									<?php endif; unset($_SESSION["error"]); ?>

									<?php if(isset($_GET["success"])) :?>
										<div class="alert alert-success" role="alert">
												<p style="margin-bottom: 0;">Sikeres regisztráció, jelentkezz be!</p>
										</div>
									<?php endif; unset($_SESSION["success"]);?>
								
									<input type="text" class="form-control" id="user_email" name="user_email" placeholder="E-mail " onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail '">								
									<input type="password" class="form-control" id="password" name="password" placeholder="Jelszó " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jelszó '">						
									<button type="submit" class="primary-btn text-uppercase">Bejelentkezés</button>								
								</form>
							  </div>
							  <div class="tab-pane fade <?php echo (isset($_SESSION["registError"]) ? "show active" : "")?>" id="regist" role="tabpanel" aria-labelledby="regist-tab">
								<form class="form-wrap" form method="POST" action="user_logic/registration.php">
                                    <?php if(isset($_SESSION["registError"])) :?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php foreach($_SESSION["registError"] as $error) : ?>
                                                <p style="margin-bottom: 0;"><?php echo $error ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; unset($_SESSION["registError"]); ?>
									<input type="text" class="form-control" name="username" placeholder="Felhasználónév " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Felhasználónév '">									
									<input type="email" class="form-control" name="user_email" placeholder="E-mail " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email '">
									<input type="password" class="form-control" name="password" placeholder="Jelszó " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jelszó '">									
									<input type="password" class="form-control" name="password_again" placeholder="Jelszó ismét " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jelszó ismét '">										
									<button type="submit" class="primary-btn text-uppercase">Regisztráció</button>					
								</form>							  	
							  </div>
							</div>						
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

								
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

<?php if(isset($_SESSION["error"])) :?>
            <div class="alert alert-danger" role="alert">
                <?php foreach($_SESSION["error"] as $error) : ?>
                    <p style="margin-bottom: 0;"><?php echo $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; unset($_SESSION["error"]); ?>