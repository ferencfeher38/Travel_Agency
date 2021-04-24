<?php include_once "includes/header.php"; ?>

<?php echo (isset($_SESSION["USER"]) ? "Üdv, ".$_SESSION["USER"]["USERNAME"] : "Ki vagy jelentkezve! :(" ) ?>

<?php
    include_once "includes/footer.php";
    if(isset($_POST["logout_btn"]) && isset($_SESSION["USER"])){
        include_once "user_logic/User.php";
        User::logout();
        header("Refresh:0");
    }
?>
