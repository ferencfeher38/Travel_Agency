<?php
SESSION_START();
if(isset($_SESSION["USER"])){
    include_once "User.php";
    User::logout();
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    header('Location: ../index.php');
}