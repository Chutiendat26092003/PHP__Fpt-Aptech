<?php
    function static_variable() {
        static $X = 10;
        $Y = 20;

        $X++;

        $Y++;

        echo "Static: " .$X;
        echo "Non-static: " .$Y."</br>";
    }
    static_variable();

    static_variable();
?>