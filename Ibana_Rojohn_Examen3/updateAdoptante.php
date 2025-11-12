<?php

require_once "db.php";

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$currentAdoptante = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nif = isset($_REQUEST["nif"]) ? $_REQUEST["nif"] : null;
    $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;
    $apellidos = isset($_REQUEST["apellidos"]) ? $_REQUEST["apellidos"] : null;
    $alta = isset($_REQUEST["alta"]) ? $_REQUEST["alta"] : null;
    $baja = isset($_REQUEST["baja"]) ? $_REQUEST["baja"] : null;
    
    if ($baja == "") {
        $baja = null;
    }

    try {
        $conn = getDBConnection();
        $query = "UPDATE adoptantes SET nif = :nif, nombre = :nombre, apellidos = :apellidos, alta = :alta, baja = :baja WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":nif" => $nif,
            ":nombre" => $nombre,
            ":apellidos" => $apellidos,
            ":alta" => $alta,
            ":baja" => $baja,
            ":id" => $id,
        ));


        header("location: readAdoptante.php");
    } catch (PDOException $e) {
        echo "<p>No se ha podido actualizar la categoría. Motivo: " . $e->getMessage() . "</p>";
        echo "<a href=\"readAdoptante.php\">Volver</a>";
    }
} else {
    try {
        $conn = getDBConnection();
        $query = "SELECT nif, nombre, apellidos, alta, baja FROM adoptantes WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":id" => $id,
        ));

        $currentAdoptante = $stmt->fetch();
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
    <h1>Actualizar Adoptante</h1>
    <form method="POST">
        <div>
            <label for="id">ID Adoptante</label>
            <input id="id" name="id" type="number" value="<?php echo $id?>" min="0" step="1" disabled>
        </div>
        <div>
            <label for="nif">NIF</label>
            <input name="nif" id="nif" type="text" value="<?php echo $currentAdoptante["nif"]?>">
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input name="nombre" id="nombre" type="text" value="<?php echo $currentAdoptante["nombre"]?>">
        </div>
        <div>
            <label for="apellidos">Apellidos</label>
            <input name="apellidos" id="apellidos" type="text" value="<?php echo $currentAdoptante["apellidos"]?>">
        </div>
        <div>
            <label for="alta">Alta</label>
            <input name="alta" id="alta" type="date" value="<?php echo $currentAdoptante["alta"]?>">
        </div>
        <div>
            <label for="baja">Baja</label>
            <input name="baja" id="baja" type="date" value="<?php echo $currentAdoptante["baja"]?>">
        </div>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
