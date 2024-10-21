<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Phpt";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully <br>";

?>