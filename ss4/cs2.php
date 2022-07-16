<?php
    $x = 5; //global scope;
    function Test() {
        echo "Following line shows an error since variable x is declared outside the function.";
        echo "<p>Variable x inside function is: $x error</p>";
    }
    Test();
    echo "<p>Variable x outside function is: $x</p>"
?>

