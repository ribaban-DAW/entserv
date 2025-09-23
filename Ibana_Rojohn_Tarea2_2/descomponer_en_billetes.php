<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.2.4</title>
</head>
<body>

<?php

// Crea un programa en el que se genere un número aleatorio entre 1000 y 2000.
// Con este número debéis generar un código que nos devuelva esa cantidad en
// billetes y monedas de euros, utilizando el menor número de ellos posible.

function descomponerPrecio($cantidad) {
	$precios = [500, 200, 100, 50, 20, 10, 5, 2, 1];
	$precio_cantidad = [];
	foreach ($precios as $precio) {
		$precio_cantidad[$precio] = 0;
	}
	
	$i = 0;
	while ($cantidad > 0) {
		while ($cantidad >= $precios[$i]) {
			$cantidad -= $precios[$i];
			$precio_cantidad[$precios[$i]] += 1;
		}
		$i++;
	}
	
	return $precio_cantidad;
}

function obtenerTipo($precio, $cantidad) {
	if ($precio > 2) {
		return ($cantidad == 1) ? "billete" : "billetes";
	}

	return ($cantidad == 1) ? "moneda" : "monedas";
}

echo "<h1>Tarea 2.2.4</h1>";

$n_rand = rand(1000, 2000);

// NOTA(srvariable): Estaría bien que esto fuese global, así no lo tendría que crear
// de nuevo, pero he probado a hacer global $precioS sin éxito, probaré en el futuro
// otra manera
$precios = [500, 200, 100, 50, 20, 10, 5, 2, 1];
$precio_cantidad = descomponerPrecio($n_rand);

$length = count($precios);
echo "<p>${n_rand}€ son:</p>";
for ($i = 0; $i < $length; $i++) {
	$cantidad = $precio_cantidad[$precios[$i]];
	$tipo = obtenerTipo($precios[$i], $cantidad);
	echo "<p>" . $precios[$i] . "€: " . $cantidad . " " . $tipo . "</p>";
}

?>

</body>
</html>
