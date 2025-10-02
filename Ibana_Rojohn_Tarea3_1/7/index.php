<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.1.7</title>
</head>
<body>

<?php

// Crea un formulario en el que suba ficheros del equipo del cliente al servidor.
// En el servidor debéis tener creada una carpeta llamada 'subidas',
// que será donde se quedan guardados los ficheros.

echo "<h1>Tarea 3.1.7</h1>";

echo "<form enctype=\"multipart/form-data\" method=\"post\">";
echo "<div>";
echo "<label for=\"fichero\">Subir fichero</label>";
echo "<input name=\"fichero\"type=\"file\"/>";
echo "</div>";
echo "<button type=\"submit\">Enviar</button>";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$upload_dir = './subidas/';
	$filename = basename($_FILES['fichero']['name']);
	$hash = sha1_file($_FILES['fichero']['tmp_name']);
	$upload_file = $upload_dir . $hash . $filename;
	if (move_uploaded_file($_FILES['fichero']['tmp_name'], $upload_file)) {
		echo "<img width=\"500\" src=\"$upload_file\"/>";
	} else {
		echo "<p>Algo ha fallado</p>";
	}
}

?>

</body>
</html>
