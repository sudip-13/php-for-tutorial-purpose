<?php
    $name="Harry is a good boy";

    echo "length of string is " . strlen($name) ;

    echo "<br>";
    
    echo "reverse of string is " . strrev($name) ;

    echo "<br>";
    
    echo "Total Word Count " . str_word_count($name) ;

    echo "<br>";
    
    echo "replace 'good' with 'bad' " . str_replace('good', 'bad', $name) ;

    echo "<br>";
    
    echo "position of is " . strpos($name, 'is') ;

    echo "<br>";
    
    // echo "string after replacing 'is' with 'was' " . str_repeat( $name, 10) . " times";

    echo "<pre>";
    echo rtrim("      This is a good boy       ");
    echo "<br>";
    echo ltrim("      This is a good boy       ");
    echo "</pre>";
?>