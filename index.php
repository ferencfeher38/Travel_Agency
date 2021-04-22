<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Bejelentkezés</title>
</head>
<body style="background-color: #2c3034">
<!-- Ide jon a kodunk -->

<div class="container" style="background-color: #86b7fe">
    <div class="jumbotron"><h1>Kérlek jelentkezz be!</h1></div>

    <form>
        <div class="mb-3">
            <label for="email" class="form-label">Email cím</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
        <a class="btn btn-secondary" href="registration.php">Regisztráció</a>
    </form>

</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>