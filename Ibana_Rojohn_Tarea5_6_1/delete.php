<?php

require_once "db.php";

try {
    $conn = getDBConnection();
    $employeeId = isset($_REQUEST["employeeId"]) ? $_REQUEST["employeeId"] : null;
    $stmt = $conn->query("DELETE FROM employee WHERE employeeId = $employeeId");

    echo "<p>Eliminado correctamente</p>";
    echo "<a href=\"read.php\">Volver</a>";
} catch (PDOException $pe) {
    echo "<p>No se ha podido eliminar" . $pe->getMessage() . "</p>";
    echo "<a href=\"read.php\">Volver</a>";
    die();
}

?>
