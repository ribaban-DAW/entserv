<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.1.4</title>
</head>
<body>

<?php

// Escriba un programa que escriba la fruta favorita y que conste de dos páginas.
//	 En la primera página se pide elegir la fruta favorita mediante un botón radio (3 frutas).
//	 En la segunda página se muestra el nombre de la fruta.

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_REQUEST['fruta'])) {
    echo "<p>Tu fruta favorita es " . $_REQUEST['fruta'] . "</p>";
}

?>

</body>
</html>
