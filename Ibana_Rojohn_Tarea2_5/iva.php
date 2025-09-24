<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.5.1</title>
</head>
<body>

<?php

// Crea un fichero con una función que calcule el importe con IVA de una cantidad
// pasada. Por defecto el porcentaje de IVA será del 21%, pero se le pueden pasar
// otros valores de IVA. Dentro del fichero debéis crear también un método que aplique
// un incremento del 10% a un importe pasado y que devuelve el cálculo con el parámetro pasado.

echo "<h1>Tarea 2.5.1</h1>";

function calcularIVA(float $cantidad, float $tasaIVA = 0.21): float {
	return $cantidad + $cantidad * $tasaIVA;
}

function aplicarIncremento(float $importe): float {
	$incremento = 0.1;

	return $importe + $importe * $incremento;
}

$cantidad = 20;
$cantidad_iva = calcularIVA($cantidad);
$cantidad_iva_incremento = aplicarIncremento($cantidad_iva);

echo "<p>Empiezo con: " . $cantidad . "€</p>";
echo "<p>Tras aplicarle el IVA por defecto tengo: " . $cantidad_iva . "€</p>";
echo "<p>Y tras aplicarle un incremento del 10% tengo: " . $cantidad_iva_incremento . "€</p>";

?>

</body>
</html>
