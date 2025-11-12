<?php

require_once "db.php";

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
        $query = "INSERT INTO adoptantes(nif, nombre, apellidos, alta, baja) VALUES (:nif, :nombre, :apellidos, :alta, :baja)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":nif" => $nif,
            ":nombre" => $nombre,
            ":apellidos" => $apellidos,
            ":alta" => $alta,
            ":baja" => $baja,
        ));

        echo "<p>Se ha creado el adoptante correctamente</p>";
        echo "<a href=\"readAdoptante.php\">Volver</a>";
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido crear el adoptante. Motivo: " . $e->getMessage() . "</p>";
        echo "<a href=\"readAdoptante.php\">Volver</a>";
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
    <h1>Crear Adoptante</h1>
    <form method="POST">
        <div>
            <label for="nif">NIF Adoptante</label>
            <input id="nif" name="nif" type="text" required>
        </div>
        <div>
            <label for="nombre">Nombre Adoptante</label>
            <input id="nombre" name="nombre" type="text" required>
        </div>
        <div>
            <label for="apellidos">Apellidos Adoptante</label>
            <input id="apellidos" name="apellidos" type="text" required>
        </div>
        <div>
            <label for="alta">Alta Adoptante</label>
            <input id="alta" name="alta" type="date" required>
        </div>
        <div>
            <label for="baja">Baja Adoptante</label>
            <input id="baja" name="baja" type="date">
        </div>

        <button type="submit">Crear</button>
    </form>
</body>
</html>
