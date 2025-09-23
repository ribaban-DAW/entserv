<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.2.1</title>
</head>
<body>

<?php

// Muestra los números pares que hay entre el 0 y 100 en una tabla y los números impares en una
// lista no numerada. Pon títulos para indicar qué números se muestran.

echo "<h1>Tarea 2.2.1</h1>";
function mostrarTabla($num) {
	return "<td style=\"border: 1px solid black; text-align: center; padding: 3px;\">$num</td>";
}

function mostrarLista($num) {
	return "<li>$num</li>";
}

echo "<h2>Números pares en una tabla</h2>";
echo "<table style=\"border: 1px solid black;\">";
echo "<tbody>";
echo "<tr>";
for ($i = 0; $i <= 100; $i += 2) {
	echo mostrarTabla($i), PHP_EOL;
}
echo "</tr>";
echo "</tbody>";
echo "</table>";

echo "<h2>Números impares en una lista no numerada</h2>";
echo "<ul>", PHP_EOL;
for ($i = 1; $i <= 100; $i += 2) {
	echo mostrarLista($i), PHP_EOL;
}
echo "</ul>", PHP_EOL;

?>

</body>
</html>
