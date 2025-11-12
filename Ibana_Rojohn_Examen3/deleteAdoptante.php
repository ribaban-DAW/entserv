<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;

    try {
        $conn = getDBConnection();
        $query = "DELETE FROM adoptantes WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":id" => $id,
        ));

        echo "<p>Se ha eliminado el adoptante correctamente</p>";
        echo "<a href=\"readAdoptante.php\">Volver</a>";
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido eliminar el adoptante. Motivo: " . $e->getMessage() . "</p>";
        echo "<a href=\"readAdoptante.php\">Volver</a>";
    }
}


?>
