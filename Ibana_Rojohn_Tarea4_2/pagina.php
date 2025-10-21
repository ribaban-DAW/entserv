<?php

function calculateSquare(int $num) {
    return $num * $num;
}

$num = isset($_REQUEST["num"]) ? $_REQUEST["num"] : null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($num) {
        echo "El cuadrado de " . $num . " es " . calculateSquare($num);
    }
}

?>
