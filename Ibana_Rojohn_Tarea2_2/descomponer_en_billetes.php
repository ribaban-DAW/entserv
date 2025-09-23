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

// TODO(srvariable): Pensar en un nombre mejor para billete, porque en realidad hay
// tanto billetes como monedas
function descomponerEnBilletes($cantidad) {
	$billetes = [500, 200, 100, 50, 20, 10, 5, 2, 1];
	$billete_cantidad = [];
	foreach ($billetes as $billete) {
		$billete_cantidad[$billete] = 0;
	}
	
	$i = 0;
	while ($cantidad > 0) {
		while ($cantidad >= $billetes[$i]) {
			$cantidad -= $billetes[$i];
			$billete_cantidad[$billetes[$i]] += 1;
		}
		$i++;
	}
	
	return $billete_cantidad;
}

echo "<h1>Tarea 2.2.4</h1>";

$n_rand = rand(1000, 2000);

// NOTA(srvariable): Estaría bien que esto fuese global, así no lo tendría que crear
// de nuevo, pero he probado a hacer global $BILLETES sin éxito, probaré en el futuro
// otra manera
$billetes = [500, 200, 100, 50, 20, 10, 5, 2, 1];
$billete_cantidad = descomponerEnBilletes($n_rand);

$length = count($billetes);
echo "<p>${n_rand}€ son:</p>";
for ($i = 0; $i < $length; $i++) {
	if ($billetes[$i] > 2) {
		echo "<p>" . $billetes[$i] . "€: " . $billete_cantidad[$billetes[$i]] . " billetes</p>";
	} else {
		echo "<p>" . $billetes[$i] . "€: " . $billete_cantidad[$billetes[$i]] . " monedas</p>";
	}
}

?>

</body>
</html>
