<?php
//  $a=readfile("file.txt");
//  echo $a;

// readfile("file.txt");
// readfile("1.png")
// readfile("file.html")


// $fileptr=fopen("file.txt","r");
// if(!$fileptr){
//     die("Unable to open file.");
// }


// $content=fread($fileptr,filesize("file.txt"));
// echo $content;
// fclose($fileptr);

// echo fgets($fileptr);


/* reached end of line
while($a=fgets($fileptr)){
    echo $a."<br>";
}
*/


// read file character by character
// while($c=fgetc($fileptr)){
//     echo $c ;
//     if($c==="."){
//         break;
//     }
// }

// fclose($fileptr);

// $fptr=fopen("myfile2.txt","w");

// fwrite($fptr,"Hello, World!\n now");
// fclose($fptr);

$fptr=fopen("myfile2.txt","a");
fwrite($fptr,"\n It is 12.00 pm right now");
fclose($fptr);

$cat=$_COOKIE['category'];

session_start();

echo "You are in $cat category. <br>";

if(isset($_SESSION["username"])){

    $username=$_SESSION['username'];
    
    echo "welcome $username";
}
else{
    echo "Please login to continue";
}
?>