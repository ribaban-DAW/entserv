<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.2.3</title>
</head>
<body>

<?php

// Crea un script que a partir de tres variables enteras $a, $b y $c muestre
// por pantalla el valor de las tres ordenadas. Si por ejemplo tenemos los
// siguientes valores 45 13 99, se mostrará:
// 
//      Las variables con valor 45, 13 y 99 ordenadas son: 13 45 99.

function arrayToString($array) {
    $cadena = "";
    $length = count($array);

    for ($i = 0; $i < $length; $i++) {
        if ($i == $length - 1) {
            $cadena = "$cadena $array[$i]";
        } else if ($i == $length - 2) {
            $cadena = "$cadena $array[$i] y ";
        } else {
            $cadena = "$cadena $array[$i], ";
        }
    }

    return $cadena;
}

echo "<h1>Tarea 2.2.3</h1>";

$a = 45;
$b = 13;
$c = 99;

$nums = [$a, $b, $c];

arrayToString($nums);

echo "<p>Los variables con valor " . arrayToString($nums);
sort($nums);
echo " ordenadas son: " . arrayToString($nums) . ".</p>" . PHP_EOL;

?>

</body>
</html>
