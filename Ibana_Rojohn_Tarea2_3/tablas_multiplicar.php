<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.3.4</title>
    <style>
        td, th {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>

<?php

// Crea automáticamente en código un array con las tablas de multiplicar del
// 0 al 10 y después muéstralo por pantalla en tablas.

echo "<h1>Tarea 2.3.4</h1>";

echo "<table>";
echo "<thead>";
echo "<tr>";
for ($i = 0; $i <= 10; $i++) {
    echo "<th>" . $i . "</th>";
}
echo "</tr>";
echo "</thead>";
echo "<tbody>";
for ($i = 0; $i <= 10; $i++) {
    echo "<tr>";
    for ($j = 0; $j <= 10; $j++) {
        echo "<td>" . $j . " * " . $i . " = " . $i * $j . "</td>";
    }
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>

</body>
</html>
