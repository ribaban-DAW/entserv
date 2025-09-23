<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.2.2</title>
</head>
<body>

<?php

// Muestra los números de piso y puerta de un bloque. Por ejemplo:
//     Piso 1 - puerta 1
//     Piso 1 - puerta 2
//     Así hasta llegar al piso 6 y puerta 4.

echo "<h1>Tarea 2.2.2</h1>";

for ($i = 1; $i < 7; $i++) {
    for ($j = 1; $j < 5; $j++) {
        echo "<p>Piso $i - puerta $j</p>" . PHP_EOL;
    }
}

?>

</body>
</html>
