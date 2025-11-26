<?php

require_once "db.php";

try {
    $conn = getDBConnection();
    $regionId = isset($_REQUEST["regionId"]) ? $_REQUEST["regionId"] : null;
    $stmt = $conn->query("DELETE FROM region WHERE regionId = $regionId");

    echo "<p>Eliminado correctamente</p>";
    echo "<a href=\"read.php\">Volver</a>";
} catch (PDOException $pe) {
    echo "<p>No se ha podido eliminar" . $pe->getMessage() . "</p>";
    echo "<a href=\"read.php\">Volver</a>";
    die();
}

?>
