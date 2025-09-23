<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.1.3</title>
</head>
<body>

<?php

// Crea un tercer fichero en el que investigando y utilizando variables superglobales,
// muestres por pantalla: información sobre el servidor, ruta de la carpeta del servidor,
// nombre del servidor, software de servidor, protocolo, método de la petición.

echo "<h1>Tarea 2.1.3</h1>", PHP_EOL;

// https://www.php.net/manual/en/function.phpinfo.php
echo "<p>Información del servidor: " . phpinfo() . "</p>" . PHP_EOL;

// https://www.php.net/manual/en/reserved.variables.server.php
echo "<p>Ruta de la carpeta del servidor: " . $_SERVER['PHP_SELF'] . "</p>" . PHP_EOL;
echo "<p>Nombre del servidor: " . $_SERVER['SERVER_NAME'] . "</p>" . PHP_EOL;
echo "<p>Software del servidor: " . $_SERVER['SERVER_SOFTWARE'] . "</p>" . PHP_EOL;
echo "<p>Protocolo: " . $_SERVER['SERVER_PROTOCOL'] . "</p>" . PHP_EOL;
echo "<p>Método de la petición: " . $_SERVER['REQUEST_METHOD'] . "</p>" . PHP_EOL;

?>

</body>
</html>
