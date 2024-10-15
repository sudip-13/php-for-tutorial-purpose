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

$sql = "CREATE TABLE `trip` (`sno` INT(6) NOT NULL AUTO_INCREMENT, `name` VARCHAR(12) NOT NULL,`dest` VARCHAR(6) NOT NULL,PRIMARY KEY (`sno`))";

$result=mysqli_query($conn, $sql);

if ($result) {
    echo "table created successfully";
} else {
    echo "Error creating table: ". mysqli_error($conn);
}


?>