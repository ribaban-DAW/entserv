<?php

require_once "db.php";

try {
    $conn = getDBConnection();
    $customerNumber = isset($_REQUEST["customerNumber"]) ? $_REQUEST["customerNumber"] : null;
    $stmt = $conn->query("DELETE FROM customers WHERE customerNumber = $customerNumber");

    echo "<p>Eliminado correctamente</p>";
    echo "<a href=\"read.php\">Volver</a>";
} catch (PDOException $pe) {
    echo "<p>No se ha podido eliminar" . $pe->getMessage() . "</p>";
    echo "<a href=\"read.php\">Volver</a>";
    die();
}

?>
