<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Phpt2";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully <br>";

$sql = "INSERT INTO `trip` (`name`,`dest`) VALUES ('Rohan', 'Wuhan')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql. "<br>". mysqli_error($conn);
}

?>