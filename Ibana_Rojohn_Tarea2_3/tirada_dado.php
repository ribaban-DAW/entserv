<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.3.2</title>
</head>
<body>

<?php

// Escribe un programa que muestre una tirada de dado al azar
// (debe mostrar la imagen del dado) y escriba en letras el valor obtenido.

echo "<h1>Tarea 2.3.2</h1>";

$i = rand(1, 6);

$tiradas = [
    1 => ["uno", "https://us.123rf.com/450wm/imagevectors/imagevectors1803/imagevectors180300007/97719825-white-dice-number-1-icon.jpg"],
    2 => ["dos", "https://us.123rf.com/450wm/imagevectors/imagevectors1803/imagevectors180300003/97719821-white-dice-number-2-icon.jpg"],
    3 => ["tres", "https://cdn-icons-png.flaticon.com/512/43/43723.png"],
    4 => ["cuatro", "https://us.123rf.com/450wm/imagevectors/imagevectors1803/imagevectors180300001/97719819-white-dice-number-4-icon.jpg"],
    5 => ["cinco", "https://previews.123rf.com/images/imagevectors/imagevectors1803/imagevectors180300005/97719823-white-dice-number-5-icon.jpg"],
    6 => ["seis", "https://img.freepik.com/fotos-premium/numero-6-dados-limpios-vista-superior_118047-6883.jpg"],
];

echo "<p>Ha salido el número " . $tiradas[$i][0] . "</p>";
echo "<img width=200 src=\"" . $tiradas[$i][1] . "\"/>";

?>

</body>
</html>
