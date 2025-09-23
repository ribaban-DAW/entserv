<!DOCTYPE html>
<html>
<head>
	<title>Tarea 2.2.1</title>
</head>
<body>

<?php

// Muestra los números pares que hay entre el 0 y 100 en una tabla y los números impares en una
// lista no numerada. Pon títulos para indicar qué números se muestran.

echo "<h1>Tarea 2.2.1</h1>";
function mostrarTabla($num) {
	return "<tr><td style=\"border: 1px solid black; text-align: center;\">$num</td></tr>";
}

function mostrarLista($num) {
	return "<ul><li>$num</li></ul>";
}

echo "<h2>Números pares en una tabla</h2>";
echo "<table style=\"border: 1px solid black;\">";
for ($i = 0; $i <= 100; $i += 2) {
	echo mostrarTabla($i), PHP_EOL;
}
echo "</table>";

echo "<h2>Números impares en una lista no numerada</h2>";
for ($i = 1; $i <= 100; $i += 2) {
	echo mostrarLista($i), PHP_EOL;
}

?>

</body>
</html>
