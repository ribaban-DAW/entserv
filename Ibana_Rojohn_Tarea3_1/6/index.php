<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.1.6</title>
</head>
<body>

<?php

// Crea un formulario de login en el que se simule le login de un usuario.
// Cada vez que un usuario se identifique, se debe mostrar en la parte de
// arriba una barra con el nombre del usuario. 

if ($_SERVER['REQUEST_METHOD'] === "POST"
	&& isset($_REQUEST['username']) 
	&& isset($_REQUEST['password'])) {
	echo "<div>" . $_REQUEST['username'] . "</div>";
}

echo "<h1>Tarea 3.1.6</h1>";

echo "<form action=\"index.php\" method=\"post\">";
echo "<div>";
echo "<label for=\"username\">Nombre de usuario</label>";
echo "<input id=\"username\" name=\"username\" />";
echo "</div>";
echo "<div>";
echo "<label for=\"password\">Contraseña</label>";
echo "<input id=\"password\" name=\"password\" type=\"password\"/>";
echo "</div>";
echo "<button type=\"submit\">Enviar</button>";
echo "</form>";

?>

</body>
</html>
