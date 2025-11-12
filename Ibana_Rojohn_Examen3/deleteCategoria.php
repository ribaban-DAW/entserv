<?php

require_once "db.php";

// Crea una app con php en la que se pida un número, que será el id de una categoría
// y al enviar los datos se elimine esa categoría.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;

    try {
        $conn = getDBConnection();
        $query = "DELETE FROM categorias WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":id" => $id,
        ));

        echo "<p>Se ha eliminado la categoría correctamente</p>";
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido eliminar la categoría. Motivo: " . $e->getMessage() . "</p>";
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
    <h1>Eliminar Categoría</h1>
    <form method="POST">
        <div>
            <label for="id">ID Categoría</label>
            <input id="id" name="id" type="number" min="0" step="1" required>
        </div>

        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
