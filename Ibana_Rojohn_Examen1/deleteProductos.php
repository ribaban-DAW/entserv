<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productCode = isset($_REQUEST["productCode"]) ? $_REQUEST["productCode"] : null;
    try {
        $conn = getDBConnection();
        $query = "DELETE FROM products WHERE productCode = :productCode";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(":productCode" => $productCode));
        header("location: readProductos.php");
    } catch (PDOException $e) {
        echo "<p>No se ha podido borrar el producto</p>";
        echo $e->getMessage();
        echo "<a href=\"readProductos.php\">Volver al panel de control</a>";
    }
    
}

?>
