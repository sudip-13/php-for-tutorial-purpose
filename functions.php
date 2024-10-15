<?php

echo "Welcome to function in php <br>";


function processMarks($marksArray){
    $sum = 0;
    foreach($marksArray as $mark){
        $sum += $mark;
    }
    return $sum / count($marksArray);
}

$marks = array(85, 90, 78, 92, 88);

echo "Average marks are: ". processMarks($marks);
?>