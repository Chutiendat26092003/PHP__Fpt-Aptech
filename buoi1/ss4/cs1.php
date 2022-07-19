<?php
    function Test() {
        $x = 5; //local scope
        echo "<p>Variable x inside function is: $x</p>";
    }
    Test();
    // using x outside the function will generate an error
    echo "<p>Variable x outside function is: $x</p>";
?>
