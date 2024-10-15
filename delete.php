<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Phpt";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM  `employees` WHERE `Sl. No.`=7";

$result = mysqli_query($conn, $sql);
$aff=mysqli_affected_rows($conn);
echo "Affected rows: ". $aff."<br>";

if ($result) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: ". mysqli_error($conn);
}
?>`