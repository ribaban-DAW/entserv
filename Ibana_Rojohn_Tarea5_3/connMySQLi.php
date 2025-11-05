<?php

$host = "localhost";
$username = "root";
$password = "daw24.";
$dbname = "northwind";

try {
    $conn = new mysqli("localhost", "root", "daw24.", "northwind");

    $select = "SELECT p.productId, p.productName, s.companyName, c.categoryName, p.quantityPerUnit, p.unitPrice, p.unitsInStock, p.unitsOnOrder, p.reorderLevel, p.discontinued ";
    $from = "FROM product AS p INNER JOIN supplier AS s ON p.supplierId = s.supplierId INNER JOIN category AS c ON p.categoryId = c.categoryId ";
    
    $query = $select . $from;

    $result = $conn->query($query);
    if ($result) {
        echo "<table border=1>";
        echo "<thead>";
            echo "<th>productId</th>";
            echo "<th>productName</th>";
            echo "<th>companyName</th>";
            echo "<th>categoryName</th>";
            echo "<th>quantityPerUnit</th>";
            echo "<th>unitPrice</th>";
            echo "<th>unitsInStock</th>";
            echo "<th>unitsOnOrder</th>";
            echo "<th>reorderLevel</th>";
            echo "<th>discontinued</th>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td>${row["productId"]}</td>";
                echo "<td>${row["productName"]}</td>";
                echo "<td>${row["companyName"]}</td>";
                echo "<td>${row["categoryName"]}</td>";
                echo "<td>${row["quantityPerUnit"]}</td>";
                echo "<td>${row["unitPrice"]}</td>";
                echo "<td>${row["unitsInStock"]}</td>";
                echo "<td>${row["unitsOnOrder"]}</td>";
                echo "<td>${row["reorderLevel"]}</td>";
                echo "<td>${row["discontinued"]}</td>";
            echo "<tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    
    $result->free();
    $conn->close();
} catch (Exception $e) {
    die("No se ha podido realizar la conexión. Motivo: " . $e->getMessage());
}

?>
