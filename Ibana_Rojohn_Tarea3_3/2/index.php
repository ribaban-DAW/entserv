<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.3.2</title>
</head>
<body>

<?php

// Con el fichero de la tarea anterior en la que habéis hecho un login,
// cuando el usuario se loguee correctamente, debéis crear una sesión y
// guardar el nombre. Una vez hecho esto, llamáis a otro fichero php en
// el que lea el nombre del usuario que ha iniciado sesión y le muestre
// un mensaje de bienvenida.

if ($_SERVER['REQUEST_METHOD'] === "POST"
	&& isset($_REQUEST['username']) 
	&& isset($_REQUEST['password'])) {
	session_start();
	$_SESSION["username"] = $_REQUEST['username'];
	echo "<a href=\"login.php\">Click para entrar a una página secreta</a>";
}

echo "<h1>Tarea 3.3.2</h1>";

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
