<?php

require_once "db.php";

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$currentCangrejo = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;
    $categoria = isset($_REQUEST["categoria"]) ? $_REQUEST["categoria"] : null;
    $fechaRecogida = isset($_REQUEST["fechaRecogida"]) ? $_REQUEST["fechaRecogida"] : null;
    $fechaAdopcion = isset($_REQUEST["fechaAdopcion"]) ? $_REQUEST["fechaAdopcion"] : null;
    $idAcogedor = isset($_REQUEST["idAcogedor"]) ? $_REQUEST["idAcogedor"] : null;

    try {
        $conn = getDBConnection();
        $query = "UPDATE cangrejos SET nombre = :nombre, categoria = :categoria, fechaRecogida = :fechaRecogida, fechaAdopcion = :fechaAdopcion, idAcogedor = :idAcogedor WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":nombre" => $nombre,
            ":categoria" => $categoria,
            ":fechaRecogida" => $fechaRecogida,
            ":fechaAdopcion" => $fechaAdopcion,
            ":idAcogedor" => $idAcogedor,
            ":id" => $id,
        ));

        header("location: readCangrejosCompleto.php");
    } catch (PDOException $e) {
        echo "<p>No se ha podido actualizar la categoría. Motivo: " . $e->getMessage() . "</p>";
        echo "<a href=\"readCangrejosCompleto.php\">Volver</a>";
    }
} else {
    try {
        $conn = getDBConnection();
        $select = "SELECT can.id, can.Nombre, can.Categoria, cat.Nombre AS NombreCategoria, can.FechaRecogida, can.FechaAdopcion, can.IdAcogedor, ado.nif AS NIFAdoptante, ado.Nombre AS NombreAdoptante ";
        $from = "FROM cangrejos AS can INNER JOIN categorias AS cat ON can.Categoria = cat.id INNER JOIN adoptantes AS ado ON can.IdAcogedor = ado.id ";
        $where = "WHERE can.id = :id";
        $query = $select . $from . $where;
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":id" => $id,
        ));

        $currentCangrejo = $stmt->fetch();
    } catch (PDOException $e) {
        echo "<p>No se han podido obtener los cangrejos. Motivo: " . $e->getMessage() . "</p>";
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
    <h1>Actualizar Cangrejo</h1>
    <form method="POST">
        <div>
            <label for="id">ID</label>
            <input name="id" id="id" type="text" value="<?php echo $id?>" disabled>
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input name="nombre" id="nombre" type="text" value="<?php echo $currentCangrejo["Nombre"]?>">
        </div>
        <div>
            <label for="categoria">Nombre Categoría</label>
            <select name="categoria" id="categoria" required>
                <?php
                    $categorias = getCategorias();
                    foreach ($categorias as $categoria) {
                        if ($categoria["id"] == $currentCangrejo["Categoria"]) {
                            echo "<option value=\"${categoria["id"]}\" selected>${categoria["Nombre"]}</option>";
                        } else {
                            echo "<option value=\"${categoria["id"]}\">${categoria["Nombre"]}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="fechaRecogida">Fecha Recogida</label>
            <input name="fechaRecogida" id="fechaRecogida" type="date" value="<?php echo $currentCangrejo["FechaRecogida"]; ?>">
        </div>
        <div>
            <label for="fechaAdopcion">Fecha Adopción</label>
            <input name="fechaAdopcion" id="fechaAdopcion" type="date" value="<?php echo $currentCangrejo["FechaAdopcion"]; ?>">
        </div>
        <div>
            <label for="idAcogedor">NIF + Nombre Acogedor</label>
            <select name="idAcogedor" id="idAcogedor" required>
                <?php
                    $adoptantes = getAdoptantes();
                    foreach ($adoptantes as $adoptante) {
                        if ($adoptante["id"] == $currentCangrejo["IdAcogedor"]) {
                            echo "<option value=\"${adoptante["id"]}\" selected>${adoptante["nif"]} + ${adoptante["nombre"]}</option>";
                        } else {
                            echo "<option value=\"${adoptante["id"]}\">${adoptante["nif"]} + ${adoptante["nombre"]}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
