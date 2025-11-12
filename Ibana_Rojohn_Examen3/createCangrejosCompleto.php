<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;
    $categoria = isset($_REQUEST["categoria"]) ? $_REQUEST["categoria"] : null;
    $fechaRecogida = isset($_REQUEST["fechaRecogida"]) ? $_REQUEST["fechaRecogida"] : null;
    $fechaAdopcion = isset($_REQUEST["fechaAdopcion"]) ? $_REQUEST["fechaAdopcion"] : null;
    $idAcogedor = isset($_REQUEST["idAcogedor"]) ? $_REQUEST["idAcogedor"] : null;

    if ($fechaAdopcion == "") {
        $fechaAdopcion = null;
    }

    try {
        $conn = getDBConnection();
        $query = "INSERT INTO cangrejos(nombre, categoria, fechaRecogida, fechaAdopcion, idAcogedor) VALUES (:nombre, :categoria, :fechaRecogida, :fechaAdopcion, :idAcogedor)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":nombre" => $nombre,
            ":categoria" => $categoria,
            ":fechaRecogida" => $fechaRecogida,
            ":fechaAdopcion" => $fechaAdopcion,
            ":idAcogedor" => $idAcogedor,
        ));

        echo "<p>Se ha creado el cangrejo correctamente</p>";
        echo "<a href=\"readCangrejosCompleto.php\">Volver</a>";
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido crear el cangrejo. Motivo: " . $e->getMessage() . "</p>";
        echo "<a href=\"readCangrejosCompleto.php\">Volver</a>";
    }
}

function getCategorias() {
    try {
        $conn = getDBConnection();
        $query = "SELECT id, Nombre FROM categorias";
        $stmt = $conn->query($query);
        $stmt->execute();
        $categorias = $stmt->fetchall(PDO::FETCH_ASSOC);

        return $categorias;
    } catch (PDOException $e) {
        echo "<p>No se ha podido obtener las categorías</p>";
        echo "<a href=\"read.php\">Volver</a>";
        die();
    }
}

function getAdoptantes() {
    try {
        $conn = getDBConnection();
        $query = "SELECT id, nif, nombre FROM adoptantes";
        $stmt = $conn->query($query);
        $stmt->execute();
        $adoptantes = $stmt->fetchall(PDO::FETCH_ASSOC);

        return $adoptantes;
    } catch (PDOException $e) {
        echo "<p>No se ha podido obtener las categorías</p>";
        echo "<a href=\"read.php\">Volver</a>";
        die();
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
    <h1>Crear Cangrejo</h1>
    <form method="POST">
        <div>
            <label for="nombre">Nombre</label>
            <input name="nombre" id="nombre" type="text" required>
        </div>
        <div>
            <label for="categoria">Nombre Categoría</label>
            <select name="categoria" id="categoria" required>
                <?php
                    $categorias = getCategorias();
                    foreach ($categorias as $categoria) {
                        echo "<option value=\"${categoria["id"]}\">${categoria["Nombre"]}</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="fechaRecogida">Fecha Recogida</label>
            <input name="fechaRecogida" id="fechaRecogida" type="date" required>
        </div>
        <div>
            <label for="fechaAdopcion">Fecha Adopción</label>
            <input name="fechaAdopcion" id="fechaAdopcion" type="date">
        </div>
        <div>
            <label for="idAcogedor">NIF + Nombre Acogedor</label>
            <select name="idAcogedor" id="idAcogedor" required>
                <?php
                    $adoptantes = getAdoptantes();
                    foreach ($adoptantes as $adoptante) {
                        echo "<option value=\"${adoptante["id"]}\">${adoptante["nif"]} + ${adoptante["nombre"]}</option>";
                    }
                ?>
            </select>
        </div>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
