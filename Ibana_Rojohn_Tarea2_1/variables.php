<!DOCTYPE html>
<html>
<head>
	<title>Tarea 2.1.1</title>
</head>
<body>

<?php

// Debes crear un fichero donde crees 3 variables, dos de tipo entero y otra de tipo decimal.
// Debéis mostrar por pantalla el nombre y el valor de cada una y el resultado de aplicar los
// operadores suma, resta, multiplicación, división, potencia y módulo en primer lugar entre
// el primer valor y el segundo y después entre el primer valor y el tercero.

function sum($n1, $n2) {
	return $n1 + $n2;
}

function rest($n1, $n2) {
	return $n1 - $n2;
}

function mult($n1, $n2) {
	return $n1 * $n2;
}

function div($n1, $n2) {
	return $n1 / $n2;
}

function pot($n1, $n2) {
	return $n1 ** $n2;
}

function mod($n1, $n2) {
	return $n1 % $n2;
}

$i1 = 10;
$i2 = 2;
$d1 = 2.5;

echo "<h1>Tarea 2.1</h1>";
echo "<h2>Operaciones con dos enteros</h2>", PHP_EOL;
echo "<p>$i1 + $i2 = ", sum($i1, $i2), "</p>", PHP_EOL;
echo "<p>$i1 - $i2 = ", rest($i1, $i2), "</p>", PHP_EOL;
echo "<p>$i1 * $i2 = ", mult($i1, $i2), "</p>", PHP_EOL;
echo "<p>$i1 / $i2 = ", div($i1, $i2), "</p>", PHP_EOL;
echo "<p>$i1 ^ $i2 = ", pot($i1, $i2), "</p>", PHP_EOL;
echo "<p>$i1 % $i2 = ", mod($i1, $i2), "</p>", PHP_EOL;

echo "========================================", PHP_EOL;
echo "Operaciones con un entero y un decimal", PHP_EOL;
echo "<p>$i1 + $d1 = ", sum($i1, $d1), "</p>", PHP_EOL;
echo "<p>$i1 - $d1 = ", rest($i1, $d1), "</p>", PHP_EOL;
echo "<p>$i1 * $d1 = ", mult($i1, $d1), "</p>", PHP_EOL;
echo "<p>$i1 / $d1 = ", div($i1, $d1), "</p>", PHP_EOL;
echo "<p>$i1 ^ $d1 = ", pot($i1, $d1), "</p>", PHP_EOL;
echo "<p>$i1 % $d1 = ", mod($i1, $d1), "</p>", PHP_EOL;
?>

</body>
</html>
