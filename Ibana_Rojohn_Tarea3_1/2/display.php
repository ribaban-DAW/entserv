<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.1.2</title>
</head>
<body>

<?php

// Escriba un programa que dibuje un cuadrado que conste de dos páginas.
//	 En la primera página se solicitan el tamaño del cuadrado en píxeles.
//	 En la segunda página se muestra el cuadrado negro.

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_REQUEST['pixels'])) {
    $pixels = $_REQUEST['pixels'];
    $style =  "width: ${pixels}px; height: ${pixels}px; background: black;";
    echo "<div style=\"${style}\"></div>";
}

?>

</body>
</html>
