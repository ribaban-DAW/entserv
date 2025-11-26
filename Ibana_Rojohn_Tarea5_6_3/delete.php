<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productId = isset($_REQUEST["productId"]) ? $_REQUEST["productId"] : null;
    try {
        $conn = getDBConnection();
        $query = "DELETE FROM product WHERE productId = :productId";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(":productId" => $productId));
        echo "<p>Se ha eliminado correctamente</p>";
        echo "<a href=\"read.php\">Volver al panel de control</a>";
    } catch (PDOException $e) {
        echo "<p>No se ha podido borrar el producto</p>";
        echo $e->getMessage();
        echo "<a href=\"read.php\">Volver al panel de control</a>";
    }
    
}

?>
