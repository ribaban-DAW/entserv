<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.5.3</title>
</head>
<body>

<?php

// Utilizando una función fecha(), muestra por pantalla el resultado de las dos siguientes formas:
//    a) 16/10/23 15:38:25
//    b) Son las 15:38:25 y hoy es 16-10-2023

echo "<h1>Tarea 2.5.3</h1>";

function fecha(): array {
	return [
		"hora" => date("H:i:s"),
		"barras" => date("d/m/y"),
		"guiones" => date("d-m-Y"),
	];
}

$fechaActual = fecha();
echo "<p>" . $fechaActual["barras"] . " " . $fechaActual["hora"] . "</p>";
echo "<p>Son las " . $fechaActual["hora"] . " y hoy es " . $fechaActual["guiones"] . "</p>";

?>

</body>
</html>
