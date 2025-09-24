<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.3.1</title>
</head>
<body>

<?php

// Crea un fichero que nos informe del nombre del día de la semana. Utiliza un array
// para cargar los días de la semana y busca una función que os diga el número del día
// de la semana.

echo "<h1>Tarea 2.3.1</h1>";

$dias_semana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
$i = date("N");

echo "<p>Hoy es " . $dias_semana[$i - 1] . ".</p>";

?>

</body>
</html>
