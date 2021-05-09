<?php
    session_start();
    include_once "database/db.php";
    $db = db::get();
    $queryString = "DELETE FROM TICKET WHERE TICKET_ID=".$_GET["ticketId"];
    $db->executeQuery($queryString);
    header("Location: profil.php?id=".$_SESSION["USER"]["USER_ID"]);