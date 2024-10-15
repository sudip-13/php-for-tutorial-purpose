<?php
echo "Welcome to associative array <br>";
// $arr=array("this","that","what");
// echo $arr[0];

$favcol = array(
    "tarun" => "Black",
    "Sudip" => "Red",
    8 => "Yellow"

);

// echo $favcol['Sudip'];
// echo '<br>';
// echo $favcol[8];
foreach ($favcol as $key => $val) {
    echo "Favorite color of $key is $val <br>";
}
;

echo "Welcome to Multi-Dimmensional  array <br>";
$multiDim = array(
    array(2, 5, 7, 8),
    array(1, 2, 3, 1),
    array(4, 5, 0, 1)
);

// echo var_dump($multiDim);
for ($i = 0; $i < count($multiDim); $i++) {
    for ($j = 0; $j < count($multiDim[$i]); $j++) {
        echo $multiDim[$i][$j] . " ";
    }


    echo "<br>";
}



?>