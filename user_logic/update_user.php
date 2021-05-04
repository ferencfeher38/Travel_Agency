<?php
    SESSION_START();
    $user_id = $_GET["id"];
    $username = $_POST["username"];
    $user_email = $_POST["user_email"];
    $permission = "1";
    $password = "";
    $password_again = "";
    if($_SESSION["USER"]["PERMISSION_ID"] != 0){
        $password = $_POST["password"];
        $password_again = $_POST["password_again"];
    }else{
        $permission = $_POST["permission"];
    }
    include_once "User.php";
    $user = new User();
    if($password != $password_again && $_SESSION["USER"]["PERMISSION_ID"] != 0){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["updateError"][] = "A jelszavak nem egyeznek meg!";
        header("Location: ../edit_profile.php?id=".$user_id);
        return false;
    }
    if($user->update($user_id,$username,$user_email,$password,(int)$permission,($permission == "0" ? "Ugyintezo" : "Felhasznalo"), $_SESSION["USER"]["PERMISSION_ID"]))
    {
        header("Location: ../profil.php?success&id=".$user_id);
    }
    else
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["updateError"] = $user->getErrors();
        header("Location: ../edit_profile.php?id=".$user_id."&asdasd");
    }