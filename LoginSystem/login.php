<?php

$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "Select * from user where username='$username'  ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        $showError = mysqli_error($conn);

        die("Error: " . mysqli_error($conn));
    }
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $verifyPassword = password_verify($password, $row['password']);
            if ($verifyPassword) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: http://localhost/phpt/LoginSystem/welcome.php");
                exit();
            } else {
                $showError = "Invalid credentials!";

            }
        }
    } else {
        $showError = "Invalid credentials!";
        mysqli_close($conn);
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

    if ($login) {
        echo "<div class='alert alert-success' role='alert'>
Account created successfully
</div>";
    }

    if ($showError) {
        echo "<div class='alert alert-danger' role='alert'>
$showError</div>";
    }
    ?>
    <div class="container">
        <h1 class="text-center my-6">Login to website</h1>

        <form style="display: flex; flex-direction: column; align-items: center;"
            action="http://localhost/phpt/LoginSystem/login.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary col-md-6">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>