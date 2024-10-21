<?php

session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    echo 'You must be logged in to view this page. ';
    echo '$_SESSION["username"]';
    header("location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login System PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <div class="container my-6">
        <h1>Welcome to the Login System!</h1>
        <p>Your username is: <?php echo $_SESSION['username']; ?></p>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome- <?php echo $_SESSION['username']; ?></h4>
            <p>Hey how are you doing? Welcome to Php Login System. You are loogeed in as <?php echo $_SESSION['username']; ?> This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to Logout <a href="/phpt/LoginSystem/logout.php"> Using this link</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>