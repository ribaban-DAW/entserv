<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $employeeNumber = isset($_REQUEST["employeeNumber"]) ? $_REQUEST["employeeNumber"] : null;
    try {
        $conn = getDBConnection();
        $query = "DELETE FROM employees WHERE employeeNumber = :employeeNumber";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(":employeeNumber" => $employeeNumber));
        header("location: read.php");
    } catch (PDOException $e) {
        echo "<p>No se ha podido borrar el empleado</p>";
        echo "<a href=\"read.php\">Volver al panel de control</a>";
    }
    
}

?>
