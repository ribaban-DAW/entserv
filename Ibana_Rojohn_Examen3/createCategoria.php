<?php

require_once "db.php";

// Crea una app con php en el que se pidan datos por pantalla y se inserten en la tabla de categorías.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;

    try {
        $conn = getDBConnection();
        $query = "INSERT INTO categorias(nombre) VALUES (:nombre)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":nombre" => $nombre,
        ));

        echo "<p>Se ha creado la categoría correctamente</p>";
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido crear la categoría. Motivo: " . $e->getMessage() . "</p>";
    }
}


?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear Categoría</h1>
    <form method="POST">
        <div>
            <label for="nombre">Nombre Categoría</label>
            <input id="nombre" name="nombre" type="text" required>
        </div>

        <button type="submit">Crear</button>
    </form>
</body>
</html>
