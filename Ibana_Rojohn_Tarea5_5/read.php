<?php

require_once "db.php";

try {
    $conn = getDBConnection();

    $select = "SELECT c.customerNumber, c.customerName, c.contactLastName, c.contactFirstName, c.phone, c.addressLine1, c.addressLine2, c.city, c.state, c.postalCode, c.country, e.lastName AS salesRepEmployeeLastName, c.creditLimit ";

    $from = "FROM customers AS c INNER JOIN employees AS e ON c.salesRepEmployeeNumber = e.employeeNumber";

    $query = $select . $from;
    $stmt = $conn->query($query);

    $output = "<table border=1>";
    $output .= "<thead>";
    $output .= "<tr>";
        $output .= "<th>customerNumber</th>";
        $output .= "<th>customerName</th>";
        $output .= "<th>contactLastName</th>";
        $output .= "<th>contactFirstName</th>";
        $output .= "<th>phone</th>";
        $output .= "<th>addressLine1</th>";
        $output .= "<th>addressLine2</th>";
        $output .= "<th>city</th>";
        $output .= "<th>state</th>";
        $output .= "<th>postalCode</th>";
        $output .= "<th>country</th>";
        $output .= "<th>salesRepEmployeeLastName</th>";
        $output .= "<th>creditLimit</th>";
        $output .= "<th>Actions</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= "<tr>";
            $output .= "<td>${row["customerNumber"]}</td>";
            $output .= "<td>${row["customerName"]}</td>";
            $output .= "<td>${row["contactLastName"]}</td>";
            $output .= "<td>${row["contactFirstName"]}</td>";
            $output .= "<td>${row["phone"]}</td>";
            $output .= "<td>${row["addressLine1"]}</td>";
            $output .= "<td>${row["addressLine2"]}</td>";
            $output .= "<td>${row["city"]}</td>";
            $output .= "<td>${row["state"]}</td>";
            $output .= "<td>${row["postalCode"]}</td>";
            $output .= "<td>${row["country"]}</td>";
            $output .= "<td>${row["salesRepEmployeeLastName"]}</td>";
            $output .= "<td>${row["creditLimit"]}</td>";
            $output .= "<td colspan=2>";
                $output .= "<div>";
                $output .= "<a href=\"update.php?customerNumber=${row["customerNumber"]}\">Modify</a> ";
                $output .= "<a href=\"delete.php?customerNumber=${row["customerNumber"]}\">Delete</a>";
                $output .= "</div>";
            $output .= "</td>";
        $output .= "</tr>";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    $output .= "<a href=\"create.php\">Create</a>";

    echo $output;
} catch (PDOException $pe) {
    die($pe->getMessage());
}

?>
