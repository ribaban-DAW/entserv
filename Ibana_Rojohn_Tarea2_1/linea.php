<!DOCTYPE html>
<html>
<head>
	<title>Tarea 2.1.2</title>
</head>
<body>

<?php

// Crea un tercer fichero en el que investigando y utilizando variables superglobales,
// muestres por pantalla: información sobre el servidor, ruta de la carpeta del servidor,
// nombre del servidor, software de servidor, protocolo, método de la petición.

$random_width = rand(1, 10); // https://www.php.net/manual/en/function.rand.php

// Un h1 con un borde que representa la línea con un grosor de 4px y con una anchura aleatoria.
echo "<h1 style=\"border-bottom: 4px solid black; width: ${random_width}em;\">Línea de tamaño aleatorio</h1>";

?>

</body>
</html>
