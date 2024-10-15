<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Phpt";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully <br>";

$sql = "SELECT * FROM `employees`";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Serial No: " . $row["Sl. No."] ." - Email: " . $row["Email"] . " - Name: " . $row["Name"] . " - Description: " . $row["Concern"] .   " - Timestamp: ".$row["timestamp"] . "<br>";
    }
} else {
    echo "0 results";
}

$sql="UPDATE `employees` SET `Concern` = 'what is this server' WHERE `employees`.`Sl. No.` = 2";
$result=mysqli_query($conn, $sql);
$aff=mysqli_affected_rows($conn);
echo "Affected rows: ". $aff."<br>";

if ($result) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: ". mysqli_error($conn);
}

?>