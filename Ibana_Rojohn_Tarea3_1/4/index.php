<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.1.4</title>
</head>
<body>

<?php

// Escriba un programa que escriba la fruta favorita y que conste de dos páginas.
//	 En la primera página se pide elegir la fruta favorita mediante un botón radio (3 frutas).
//	 En la segunda página se muestra el nombre de la fruta.

function getBlob(string $id, string $name, string $value): string {
	$blob = "<div>";
	$blob = $blob . "<label for=\"${id}\">${value}</label>";
	$blob = $blob . "<input id=\"${id}\" name=\"${name}\" value=\"${value}\"type=\"radio\"/>";
	$blob = $blob . "</div>";

	return $blob;
}

echo "<h1>Tarea 3.1.4</h1>";

echo "<form action=\"display.php\" method=\"post\">";
$name = "fruta";
$value = "mango";
echo getBlob($value, $name, $value);
$value = "naranja";
echo getBlob($value, $name, $value);
$value = "kiwi";
echo getBlob($value, $name, $value);
echo "<button type=\"submit\">Enviar</button>";
echo "</form>";

?>

</body>
</html>
