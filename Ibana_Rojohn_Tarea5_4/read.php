<?php

require_once "db.php";

try {
    $conn = getDBConnection();

    $select = "SELECT supplierId, companyName, contactName, contactTitle, address, city, region, postalCode, country, phone, email, fax, HomePage ";
    $from = "FROM supplier ";

    $query = $select . $from;
    $stmt = $conn->query($query);

    $output = "<table border=1>";
    $output .= "<thead>";
    $output .= "<tr>";
        $output .= "<th>supplierId</th>";
        $output .= "<th>companyName</th>";
        $output .= "<th>contactName</th>";
        $output .= "<th>contactTitle</th>";
        $output .= "<th>address</th>";
        $output .= "<th>city</th>";
        $output .= "<th>region</th>";
        $output .= "<th>postalCode</th>";
        $output .= "<th>country</th>";
        $output .= "<th>phone</th>";
        $output .= "<th>email</th>";
        $output .= "<th>fax</th>";
        $output .= "<th>HomePage</th>";
        $output .= "<th colspan=2>Actions</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= "<tr>";
            $output .= "<td>${row["supplierId"]}</td>";
            $output .= "<td>${row["companyName"]}</td>";
            $output .= "<td>${row["contactName"]}</td>";
            $output .= "<td>${row["contactTitle"]}</td>";
            $output .= "<td>${row["address"]}</td>";
            $output .= "<td>${row["city"]}</td>";
            $output .= "<td>${row["region"]}</td>";
            $output .= "<td>${row["postalCode"]}</td>";
            $output .= "<td>${row["country"]}</td>";
            $output .= "<td>${row["phone"]}</td>";
            $output .= "<td>${row["email"]}</td>";
            $output .= "<td>${row["fax"]}</td>";
            $output .= "<td>${row["HomePage"]}</td>";
            $output .= "<td colspan=2>";
                $output .= "<div>";
                $output .= "<a href=\"update.php?supplierId=${row["supplierId"]}\">Modify</a> ";
                $output .= "<a href=\"delete.php?supplierId=${row["supplierId"]}\">Delete</a>";
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
