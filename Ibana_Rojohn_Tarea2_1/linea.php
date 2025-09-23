<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.1.2</title>
</head>
<body>

<?php

// Crea un tercer fichero en el que investigando y utilizando variables superglobales,
// muestres por pantalla: información sobre el servidor, ruta de la carpeta del servidor,
// nombre del servidor, software de servidor, protocolo, método de la petición.

$random_width = rand(10, 50); // https://www.php.net/manual/en/function.rand.php

echo "<h1>Tarea 2.1.2</h1>";
// Un h1 con un borde que representa la línea con un grosor de 4px y con una anchura aleatoria.
echo "<p style=\"border-bottom: 4px solid black; width: ${random_width}em;\">Línea de tamaño aleatorio</p>";

?>

</body>
</html>
