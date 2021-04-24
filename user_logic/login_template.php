<?php
SESSION_START();
?>
<!doctype html>
<html lang="hu">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Bejelentkezés</title>

    <style>
        .centered {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding-top: 30px;
            padding-bottom: 30px;
            width: 40%;
            background-color: white;
        }

        body{
            background-color: grey;
        }
    </style>

</head>
<body>
<!-- Ide jon a kodunk -->

<div class="container centered">
    <div class="jumbotron"><h1>Kérlek jelentkezz be!</h1></div>

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
    <?php endif;?>

    <form method="POST" action="login.php">
        <div class="mb-3">
            <label for="email" class="form-label">Email cím</label>
            <input type="email" class="form-control" id="user_email" name="user_email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
        <a class="btn btn-secondary" href="registration_template.php">Regisztráció</a>
    </form>

</div>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>