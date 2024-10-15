<?php

// Quick Quiz -
// 1. Create an if else ladder using more than one elseif
// 2. Write a program to allow a driver to drive ony when his age is greater than or equal to 65


$age = 25;

echo "Age of driver is : $age";

if ($age >= 25) {
    if ($age <= 65) {
        echo "<br> Driver is eligible to drive on the road";
    } else {
        echo "<br> Driver is not eligible to drive on the road";
    }
}
else{
    echo "<br> Driver is not eligible to drive on the road";
}

?>