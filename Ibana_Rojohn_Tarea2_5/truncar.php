<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.5.4</title>
</head>
<body>

<?php

// Crea una función que se llame Truncar y se le pase un número decimal.
// Esta función debe retornar sólo la parte entera del número

echo "<h1>Tarea 2.5.4</h1>";

function truncar(float $num): int {
	// Otra manera de realizar el ejercicio sería obtener el valor absoluto del número,
	// restarle 1 mientras sea mayor que 1, y luego restarle lo que sobre al valor original.
	// Por ejemplo:
	// 10.51
	// 9.51
	// 8.51
	// ...
	// 0.51
	// 10.51 - 0.51 = 10
	return $num;
}

$n = 25.9;
echo "<p>El número sin truncar es: " . $n . "</p>";
echo "<p>El número truncado es: " . truncar($n) . "</p>";

?>

</body>
</html>
