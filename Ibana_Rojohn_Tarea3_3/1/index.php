<?php
setcookie("nombre1", "valor1");
setcookie("nombre2", "valor2", time() + (60 * 5));
setcookie("nombre3", "valor3", time() + (60 * 60));
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.3.1</title>
</head>
<body>

<?php

// Crea un fichero php en el que se creen 3 cookies en el sistema.
// En el mismo fichero llama a otro documento php que recupere esas
// cookies y muestre por pantalla el nombre de la cookie y el valor
// que tiene cada una.

echo "<h1>Tarea 3.3.1</h1>";
include 'display.php';
?>

</body>
</html>
