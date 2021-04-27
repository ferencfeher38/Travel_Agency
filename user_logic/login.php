<?php

$user_email = $_POST["user_email"];
$password = $_POST["password"];

include_once "User.php";
$user = new User();
if($user->login($user_email, $password))
{
    if(isset($_SESSION["USER"])){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        header("Location: ../index.php");
    }else{
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["error"][] = "Általános hiba, kérlek próbáld meg később!";
        header("Location: ../login_template.php");
    }
}
else
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["error"] = $user->getErrors();
    header("Location: ../login_template.php");
}