<?php
    session_start();
    $userId = $_SESSION["USER"]["USER_ID"];
    $userEmail = $_SESSION["USER"]["USER_EMAIL"];
    $insuranceId = $_POST["insuranceId"];
    $flightId = $_GET["flightId"];
    $isChildren = (isset($_POST["childrenTicket"])?1:0);
    $isAdult = (isset($_POST["adultTicket"])?1:0);
    $classNumber = 1;
    $seatNumber = 1;
    $ticketPrice = 0;

    include_once "database/db.php";
    $db = db::get();

    if($insuranceId == 0){
        $icPrice["INSURANCE_PRICE"] = 0;
    }else{
        $insuranceQuery = "SELECT INSURANCE_PRICE FROM INSURANCE WHERE INSURANCE_ID=".$insuranceId;
        $icPrice = $db ->getRow($insuranceQuery);
    }

    $flightQuery = "SELECT FLIGHT_PRICE FROM FLIGHT WHERE FLIGHT_ID=".$flightId;
    $flightPrice = $db ->getRow($flightQuery);

    $ticketPrice = $icPrice["INSURANCE_PRICE"] + $flightPrice["FLIGHT_PRICE"];

    $queryString = "INSERT INTO TICKET values (
            SEQ_TICKET.NEXTVAL,
            ".$db->escape($userId).",
            ".$db->escape($userEmail).",
            ".$db->escape($flightId).",
            ".$db->escape($ticketPrice).",
            ".$db->escape($classNumber).",
            ".$db->escape($seatNumber).",
            ".$db->escape($isChildren).",
            ".$db->escape($isAdult)."
    )";

    $db->executeQuery($queryString);

    header("Location: profil.php?id=".$userId);