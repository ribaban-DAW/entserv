<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.1.3</title>
</head>
<body>

<?php

// Escriba un programa que dibuje un cuadrado que conste de dos páginas.
//	 En la primera página se solicitan el tamaño del cuadrado en píxeles.
//	 En la segunda página se muestra el cuadrado (relleno de blanco, borde negro de 4px).

echo "<h1>Tarea 3.1.3</h1>";

echo "<form action=\"display.php\" method=\"post\">";
echo "<label for=\"pixels\">Tamaño del cuadrado en píxeles:</label>";
echo "<input id=\"pixels\" name=\"pixels\" type=\"number\" />";
echo "</form>";

?>

</body>
</html>
