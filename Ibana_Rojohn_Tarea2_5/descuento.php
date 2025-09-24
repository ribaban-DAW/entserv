<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.5.2</title>
</head>
<body>

<?php
// Crear un php que contenga una función que aplique un descuento según el importe de compra pasado. 
//    a) Para compras hasta 100€ no hay descuento.
//    b) Compras de 100€ a 499,99€, descuento del 10%.
//    c) Compras mayores o iguales a 500€, descuento del 15%.

echo "<h1>Tarea 2.5.2</h1>";

function aplicarDescuento(float $importe): float {
	$descuento = 0;
	if ($importe >= 500) {
		$descuento = 0.15;
	} else if ($importe >= 100) {
		$descuento = 0.1;
	}

	return $importe - $importe * $descuento;
}

$importes = [20, 99.9, 100, 120, 300, 499.99, 500, 500.1];

foreach ($importes as $importe) {
	echo "<p>El importe es " . $importe . "€, tras aplicarle un descuento se queda en " . aplicarDescuento($importe) . "€</p>";
}

?>

</body>
</html>
