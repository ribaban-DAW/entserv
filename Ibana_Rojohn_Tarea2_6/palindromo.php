<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.6.2</title>
</head>
<body>

<?php

// Crea una función que devuelva verdadero o falso si el texto que se le
// pasa es un palíndromo o no.

echo "<h1>Tarea 2.6.2</h1>";

function esEspacio(string $caracter): bool {
	return $caracter == " ";
}

function esPuntuacion(string $caracter): bool {
	return $caracter == "." || $caracter == "," || $caracter == ";" || $caracter == ":";
}

function convertirASCII(string $caracter): string {
	if ($caracter == "á" || $caracter == "Á") return "a";
	else if ($caracter == "é" || $caracter == "É") return "e";
	else if ($caracter == "í" || $caracter == "Í") return "i";
	else if ($caracter == "ó" || $caracter == "Ó") return "o";
	else if ($caracter == "ú" || $caracter == "Ú") return "u";
	else return $caracter;
}

function limpiarTexto(string $texto): string {
	$nuevoTexto = [];
	$length = strlen($texto);
	for ($i = 0; $i < $length; $i++) {
		$caracter = mb_substr($texto, $i, 1, 'UTF-8');
		if (esEspacio($caracter) || esPuntuacion($caracter)) {
			continue;
		}
		array_push($nuevoTexto, convertirASCII($caracter));
	}

	return implode($nuevoTexto);
}

function esPalindromo(string $texto): bool {
	$textoLimpio = limpiarTexto(strtolower($texto));
	$length = strlen($textoLimpio);

	for ($i = 0; $i < $length / 2; $i++) {
		if ($textoLimpio[$i] != $textoLimpio[$length - $i - 1]) {
			return false;
		}
	}

	return true;
}

$textos = [
	"hola",
	"ojo",
	"ojorojo",
	"           O j O               r o j o",
	// https://es.wikipedia.org/wiki/Pal%C3%ADndromo
	"A la catalana banal, atácala.",
	"Allí por la tropa portado, traído a ese paraje de maniobras, una tipa como capitán usar boina me dejara, pese a odiar toda tropa por tal ropilla."
];

foreach ($textos as $texto) {
	echo "<p>'$texto'" . (esPalindromo($texto) ? " es palíndromo" : " no es palíndromo") . "</p>";
}

?>

</body>
</html>
