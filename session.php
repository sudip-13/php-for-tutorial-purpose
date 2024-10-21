<?php

session_start();
$_SESSION['username'] ="Sudip";
$_SESSION['favCat'] ="Books";

echo "Session saved successfully <br>";


// header("Location: welcome.php");
?>