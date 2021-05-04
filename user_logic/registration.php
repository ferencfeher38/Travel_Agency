<?php
    $username = $_POST["username"];
    $user_email = $_POST["user_email"];
    $password = $_POST["password"];
    $password_again = $_POST["password_again"];
    $permission_id = $_POST["permission"];
    var_dump($username);
    var_dump($user_email);
    var_dump($password);
    include_once "User.php";
    $user = new User();
    if($password != $password_again){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["registError"][] = "A jelszavak nem egyeznek meg!";
        header("Location: ../login_template.php");
        return false;
    }
    if($user->register($username,$user_email,$password,1,"felhasznalo"))
    {
        header("Location: ../login_template.php?success");
    }
    else
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["registError"] = $user->getErrors();
        header("Location: ../login_template.php");
    }