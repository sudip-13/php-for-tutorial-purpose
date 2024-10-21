<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['cpassword'];
    $exists = false;


    $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        $exists = true;
        $showError = "Username already exists";
    }

    if (($password == $confirmpassword) && !$exists) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `user` (`Sl. No.`, `username`, `password`, `Dt`) VALUES (NULL, '$username', '$passwordHash', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        } else {
            $showError = mysqli_error($conn);
        }
    } elseif ($password != $confirmpassword) {
        $showError = "Passwords do not match";
    }
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

    <?php

    if ($showAlert) {
        echo "<div class='alert alert-success' role='alert'>
    Account created successfully
  </div>";
    }

    if ($showError) {
        echo "<div class='alert alert-danger' role='alert'>
    $showError</div>";
    }



    ?>
    <div class="container ">
        <h1 class="text-center my-3">signup to website</h1>
        <form style="display: flex; flex-direction: column; align-items: center;"
            action="http://localhost/phpt/LoginSystem/signup.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="username" name="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" maxlength="16" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" name="password" class="form-label">Password</label>
                <input type="password" name="password" maxlength="23" class="form-control" id="password">
            </div>
            <div class="mb-3 col-md-6">
                <label for="cpassword" name="cpassword" class="form-label">Confirm Password</label>
                <input type="text" name="cpassword" class="form-control" id="cpassword" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Make sure that password is same</div>
            </div>

            <button type="submit " class="btn btn-primary col-md-6">signup</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>