<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.1.5</title>
</head>
<body>

<?php

// Escriba un programa que escriba la fruta favorita y que conste de dos páginas.
//	 En la primera página se pide elegir la fruta favorita mediante un botón radio (3 frutas).
//	 En la segunda página muestra el dibujo de la fruta.

// NOTA: Supongo que aún no hay que utilizar ningún tipo de API, así que como sé los valores de
// las frutas (porque las he introducido yo), están los valores hardcodeados.
$imagen = [
    "mango" => "https://i.pinimg.com/736x/1c/07/bc/1c07bc36d3bc2a21d8316ca95c08dabc.jpg",
    "naranja" => "https://i.pinimg.com/474x/18/c2/98/18c2984fdd38d5c512bec54a883b3f10.jpg",
    "kiwi" => "https://i.ytimg.com/vi/frrUeTS8VUk/maxresdefault.jpg",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_REQUEST['fruta'])) {
    $fruta = $_REQUEST['fruta'];
    echo "<p>Tu fruta favorita es " . $_REQUEST['fruta'] . "</p>";
    echo "<img src=\"" . $imagen[$fruta] . "\" width=300/>";
}

?>

</body>
</html>
