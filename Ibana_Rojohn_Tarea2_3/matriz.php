<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.3.3</title>
    <style>
        td {
            padding: 10px;
        }
        tr>td:first-child {
            border-left: 1px solid black;
        }
        tr>td:last-child {
            border-right: 1px solid black;
        }
    </style>
</head>
<body>

<?php

// Crea una matriz de este tipo y muéstrala por pantalla en una tabla.

echo "<h1>Tarea 2.3.3</h1>";

$matriz = [
    [1, 14, 8, 3],
    [6, 19, 7, 2],
    [3, 13, 4, 1],
];

echo "<table>";
echo "<tbody>";
foreach ($matriz as $fila) {
    echo "<tr>";
    foreach ($fila as $celda) {
        echo "<td> $celda </td>";
    }
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

?>

</body>
</html>
