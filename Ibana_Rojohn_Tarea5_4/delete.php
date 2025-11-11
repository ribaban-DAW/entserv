<?php

require_once "db.php";

try {
    $conn = getDBConnection();
    $supplierId = isset($_REQUEST["supplierId"]) ? $_REQUEST["supplierId"] : null;
    $stmt = $conn->query("DELETE FROM supplier WHERE supplierId = $supplierId");

    echo "<p>Eliminado correctamente</p>";
    echo "<a href=\"read.php\">Volver</a>";
} catch (PDOException $pe) {
    echo "<p>No se ha podido eliminar</p>";
    echo "<a href=\"read.php\">Volver</a>";
    die();
}

?>
