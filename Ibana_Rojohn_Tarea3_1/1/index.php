<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.1.1</title>
</head>
<body>

<?php

// Escriba un formulario de recogida de datos personales que conste de dos páginas.
//  En la primera página se solicita el nombre.
//  En la segunda página se muestra el texto introducido por el usuario (aunque esté en blanco).

echo "<h1>Tarea 3.1.1</h1>";
echo "<form action=\"display.php\" method=\"post\">";
echo "<label for=\"Name\">Nombre</label>";
echo "<input id=\"Name\" name=\"Name\" type=\"text\" />";
echo "</form>";

?>

</body>
</html>
