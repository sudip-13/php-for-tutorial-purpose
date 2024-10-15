<?php

// variables are container for storing information

$name = "John Doe";
// $age = 30;
// $city = "New York";
// echo "This guy is $name, age $age"
$friend="Harry";

echo "This guy is $name, his friend is $friend";
echo "<br>";

$income=4000;
$debt=-6000;
echo $income;
echo "<br>";
echo $debt;
echo "<br>";
$income=4000.45;
$debt=-6000.65;
echo $income;
echo "<br>";
echo $debt;
$is_true=true;
$is_friend=false;
echo "<br>";

echo var_dump($is_true);
echo "<br>";

echo var_dump($is_friend);

$friends=array("dsGV","gagwr","reahb","aeHRbeh","aehrb","ahbE",);
echo var_dump($friends);
echo "<br>";
echo $friends[0];
echo "<br>";

echo $friends[1];
echo "<br>";

echo $friends[2];
echo "<br>";


echo $friends[3];
echo "<br>";


echo $friends[4];
echo "<br>";

echo $friends[5];
echo "<br>";

$name=NULL;
echo var_dump($name);



?>