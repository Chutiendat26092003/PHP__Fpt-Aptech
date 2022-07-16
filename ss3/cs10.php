<?php
    class Color {
        function Color() {
            $color_name = "Green";
            echo "color is: " .$color_name;
        }
        function ChangeColor() {
            $color_name = "Red";
            echo "<br> updated color is: " .$color_name;
        }
    }
    $objCOlor = new Color();
    $objCOlor ->Color();
    $objCOlor -> ChangeColor();
?>
