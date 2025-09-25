<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.6.1</title>
	<style>
		td {
			padding: 10px;
			border: 1px solid black;
		}
	</style>
</head>
<body>

<?php

// Crear y rellenar un array de 100 elementos con valores aleatorios.
// Una vez relleno se debe mostrar el array. Después debes pasarlo por
// una función que ordene los valores y vuelva a mostrar el resultado del
// array ordenado.

echo "<h1>Tarea 2.6.1</h1>";

function mostrarArray(array $array) {
	echo "<table>";
	echo "<tbody>";
	echo "<tr>";
	foreach ($array as $elemento) {
		echo "<td>$elemento</td>";
	}
	echo "</tr>";
	echo "</tbody>";
	echo "</table>";
}

$array = [];
for ($i = 0; $i < 100; $i++) {
	$array[$i] = rand(0, 10000);
}

echo "<p>Array sin ordenar</p>";
mostrarArray($array);
echo "<p>Array ordenado</p>";
sort($array);
mostrarArray($array);

?>

</body>
</html>
