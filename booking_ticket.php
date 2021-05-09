<?php
include_once "includes/header.php";
include_once "database/db.php";
$db = db :: get();
if(isset($_GET["id"])){
    $queryString = "SELECT * FROM FLIGHT WHERE FLIGHT_ID=".$_GET["id"];
    $result = $db->getRow($queryString);

    $queryString = "SELECT * FROM AIRLINE INNER JOIN F_HAS_A ON airline.airline_id = f_has_a.airline_id WHERE f_has_a.flight_id =".$_GET["id"];
    $result2 = $db->getRow($queryString);

    $queryString = "SELECT * FROM HOTEL INNER JOIN F_HAS_H ON hotel.hotel_id = f_has_h.hotel_id WHERE f_has_h.flight_id =".$_GET["id"];
    $result3 = $db->query($queryString);

    $queryString = "SELECT * FROM INSURANCE";
    $result4 = $db->query($queryString);
}else{
    $result = array();
    $result[] = "Nincs adat";
    $result2[] = "Nincs adat";
    $result3[] = "Nincs adat";
}

?>
    <!-- start banner Area -->
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Profil adatok
                    </h1>
                    <p class="text-white link-nav"><a href="index.php">Kezdőlap</a> <span class="lnr lnr-arrow-right"> </span> <a href="#">Út adatok</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start szolgáltatások Area -->
    <section class="other-issue-area section-gap">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <b style="font-size: x-large">Út információk</b>
                </div>
                <form action="add_ticket.php?userId=<?php echo $_SESSION["USER"]["USER_ID"] ?>&insuranceId=<?php echo "5" ?>&flightId=<?php echo $result["FLIGHT_ID"] ?>&isChildren=0" method="post">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Indulási hely:</b> <?php echo $result["DEPARTURE_NAME"] ?></li>
                        <li class="list-group-item"><b>Indulási dátum:</b> <?php echo $result["DEPARTURE_DATE"] ?></li>
                        <li class="list-group-item"><b>Érkezési hely:</b> <?php echo $result["ARRIVE_NAME"] ?></li>
                        <li class="list-group-item"><b>Érkezési dátum:</b> <?php echo $result["ARRIVE_DATE"] ?></li>
                        <li class="list-group-item"><b>Légitársaság:</b> <?php echo $result2["AIRLINE_NAME"] ?></li>
                        <li class="list-group-item"><b>Látogatható hotelek:</b> <?php foreach($result3 as $hotel) ?><?php echo $hotel["HOTEL_NAME"] ?></li>
                        <li class="list-group-item"><b>Jegy ár:</b> <?php echo $result["FLIGHT_PRICE"] ?>Ft</li>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <div class="form-select" id="default-select">
                                <select name="insuranceId" id="insuranceId">
                                    <option value="0">Nincs</option>
                                    <?php foreach($result4 as $ic) :?>
                                        <option value="<?php echo $ic["INSURANCE_ID"] ?>"><?php echo $ic["INSURANCE_NAME"] ?> (<?php echo $ic["INSURANCE_PRICE"] ?>Ft)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <li class="list-group-item"><button type="submit" name="adultTicket" id="adultTicket" class="btn btn-outline-primary" style="width: 100%">Felnőtt jegy foglalás</button></li>
                        <li class="list-group-item"><button type="submit" name="childrenTicket" id="childrenTicket" class="btn btn-outline-primary" style="width: 100%">Gyermekjegy foglalás</button></li>
                    </ul>
                </form>
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