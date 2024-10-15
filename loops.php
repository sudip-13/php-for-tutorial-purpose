<?php

echo "Welcome to loops in php <br>";
echo "While loops";
$i = 0;
while ($i < 10) {
    echo "Hello World!  ";
    echo $i + 1;
    echo "<br>";
    $i += 3;
}

echo "for loops";

for ($index = 1; $index < 6; $index++) {
    echo $index, "<br>";
}

echo "For loop ended";

echo "Do while loops";


/*
do {
    Some lines of code to be executed here;
}while(condition)

*/

do {
    echo "$i <br>";
    $i++;
} while ($i < 5);


echo "For Each loop <br>";
$arr = array("a", "b", "c", "d", "e", "f");
foreach ($arr as $value) {
    echo "$value <br>";
}

?>