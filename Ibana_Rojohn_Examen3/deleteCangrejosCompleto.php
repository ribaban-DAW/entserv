<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;

    try {
        $conn = getDBConnection();
        $query = "DELETE FROM cangrejos WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":id" => $id,
        ));

        echo "<p>Se ha eliminado el cangrejo correctamente</p>";
        echo "<a href=\"readCangrejosCompleto.php\">Volver</a>";
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido eliminar el cangrejo. Motivo: " . $e->getMessage() . "</p>";
        echo "<a href=\"readCangrejosCompleto.php\">Volver</a>";
    }
}


?>
