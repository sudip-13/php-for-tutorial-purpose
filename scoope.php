<?php

echo "Welcome to scoope of local and global variable <br>";

$a=98;
echo $a; //global variable

function  PrintValue(){
    // $a=97;
    global $a; //accessing global variable from inside function

    $a=1000;

    echo "<br>Local variable inside function: ".$a;
}

PrintValue();
echo "<br>Global variable outside function: ".$a."<br>"; // global variable

echo var_dump($GLOBALS)."<br>";
echo var_dump($GLOBALS['a'])


?>