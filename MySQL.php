<?php

echo "Welcome to the stage where we are ready to get connected to a database <br>";


/*
Ways to connect to a MySQL Database
1. MySQLi extension
2. PDO extension (PHP Data Objects)
*/

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully <br>";
$sql = "CREATE DATABASE Phpt2";

$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Database created successfully";
} else {
    echo "Error creating database: ". mysqli_error($conn);
}


?>