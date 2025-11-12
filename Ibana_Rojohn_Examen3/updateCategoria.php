<?php

require_once "db.php";

// Crea una app con php en la que se pida un número (id). Al darle a enviar debe cargar
// un formulario con los datos de la categoría que tenga el id indicado en el primer
// formulario. Se debe poder modificar el nombre de la categoría y guardar los datos modificados.

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$currentCategory = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;
    try {
        $conn = getDBConnection();
        $query = "UPDATE categorias SET nombre = :nombre WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":nombre" => $nombre,
            ":id" => $id,
        ));


        header("location: preupdateCategoria.php");
    } catch (PDOException $e) {
        echo "<p>No se ha podido actualizar la categoría. Motivo: " . $e->getMessage() . "</p>";
        echo "<a href=\"preupdateCategoria.php\">Volver</a>";
    }
} else {
    try {
        $conn = getDBConnection();
        $query = "SELECT nombre FROM categorias WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":id" => $id,
        ));

        $currentCategory = $stmt->fetch();
    } catch (PDOException $e) {
        echo "<p>No se han podido obtener las categorías. Motivo: " . $e->getMessage() . "</p>";
        echo "<a href=\"preupdateCategoria.php\">Volver</a>";
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
    <h1>Actualizar Categoría</h1>
    <form method="POST">
        <div>
            <label for="id">ID Categoría</label>
            <input id="id" name="id" type="number" value="<?php echo $id?>" min="0" step="1" disabled>
        </div>
        <div>
            <label for="nombre">Nombre Categoría</label>
            <input id="nombre" name="nombre" type="text" value="<?php echo $currentCategory["nombre"]?>">
        </div>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
