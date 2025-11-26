<?php

include "db.php";
include "header.php";

try {
    $conn = getDBConnection();
    $select = "SELECT p.productId, p.productName, s.companyName AS companyName, c.categoryName, p.quantityPerUnit, p.unitPrice, p.unitsInStock, p.unitsOnOrder, p.reorderLevel, p.discontinued ";
    $from = "FROM product AS p INNER JOIN supplier AS s ON p.supplierId = s.supplierId INNER JOIN category AS c ON p.categoryId = c.categoryId ";
    $query = $select . $from;
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchall();
    
    $output = "<table border=1>";
    $output .= "<thead>";
    $output .= "<tr>";
        $output .= "<th>productId</th>";
        $output .= "<th>productName</th>";
        $output .= "<th>companyName</th>";
        $output .= "<th>categoryId</th>";
        $output .= "<th>quantityPerUnit</th>";
        $output .= "<th>unitPrice</th>";
        $output .= "<th>unitsInStock</th>";
        $output .= "<th>unitsOnOrder</th>";
        $output .= "<th>reorderLevel</th>";
        $output .= "<th>discontinued</th>";
        $output .= "<th>actions</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    foreach ($rows as $row) {
        $output .= "<tr>";
            $output .= "<td>${row["productId"]}</td>";
            $output .= "<td>${row["productName"]}</td>";
            $output .= "<td>${row["companyName"]}</td>";
            $output .= "<td>${row["categoryName"]}</td>";
            $output .= "<td>${row["quantityPerUnit"]}</td>";
            $output .= "<td>${row["unitPrice"]}</td>";
            $output .= "<td>${row["unitsInStock"]}</td>";
            $output .= "<td>${row["unitsOnOrder"]}</td>";
            $output .= "<td>${row["reorderLevel"]}</td>";
            $output .= "<td>${row["discontinued"]}</td>";
            $output .= "<td colspan=2>";
                $output .= "<div>";
                    $output .= "<a href=\"update.php?productId=${row["productId"]}\">Modify</a> ";
                    $output .= "<a href=\"delete.php?productId=${row["productId"]}\">Delete</a>";
                $output .= "</div>";
            $output .= "</td>";
        $output .= "</tr>";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    $output .= "<a href=\"create.php\">Create</a>";
    
    echo $output;
} catch (PDOException $e) {
    echo "<p>No se han podido leer los productos. Motivo: " . $e->getMessage() . "</p>";
}
