<?php

require_once "pdoconfig.php";

function getDBConnection() {
    $host = $GLOBALS["host"];
    $dbname = $GLOBALS["dbname"];
    $username = $GLOBALS["username"];
    $password = $GLOBALS["password"];
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);

    return $conn;
}

function getProducts(array $filters) {
    $productName = isset($filters["productName"]) ? strtolower($filters["productName"]) : "";
    $productLine = isset($filters["productLine"]) ? strtolower($filters["productLine"]) : "";

    $conn = getDBConnection();

    $select = "SELECT productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP";
    $from = " FROM products";
    $where = " WHERE LOWER(productName) LIKE :productName";
    $where .= " AND LOWER(productLine) LIKE :productLine";

    $query = $select . $from . $where;
    $stmt = $conn->prepare($query);
    
    $productName = "%$productName%";
    $productLine = "%$productLine%";
    $stmt->execute([
        "productName" => $productName,
        "productLine" => $productLine,
    ]);
    $products = $stmt->fetchall();

    return $products;
}

$productName = isset($_REQUEST["productName"]) ? $_REQUEST["productName"] : null;
$productLine = isset($_REQUEST["productLine"]) ? $_REQUEST["productLine"] : null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filters = [
        "productName" => $productName,
        "productLine" => $productLine,
    ];
    $products = getProducts($filters);

    $output = "<table>";
        $output .= "<thead>";
            $output .= "<tr>";
                $output .= "<th>productCode</th>";
                $output .= "<th>productName</th>";
                $output .= "<th>productLine</th>";
                $output .= "<th>productScale</th>";
                $output .= "<th>productVendor</th>";
                $output .= "<th>productDescription</th>";
                $output .= "<th>quantityInStock</th>";
                $output .= "<th>buyPrice</th>";
                $output .= "<th>MSRP</th>";
            $output .= "</tr>";
        $output .= "</thead>";
        $output .= "<tbody>";
        foreach ($products as $product) {
            $output .= "<tr>";
                $output .= "<td>" . $product["productCode"] . "</td>";
                $output .= "<td>" . $product["productName"] . "</td>";
                $output .= "<td>" . $product["productLine"] . "</td>";
                $output .= "<td>" . $product["productScale"] . "</td>";
                $output .= "<td>" . $product["productVendor"] . "</td>";
                $output .= "<td>" . $product["productDescription"] . "</td>";
                $output .= "<td>" . $product["quantityInStock"] . "</td>";
                $output .= "<td>" . $product["buyPrice"] . "</td>";
                $output .= "<td>" . $product["MSRP"] . "</td>";
            $output .= "</tr>";
        }
        $output .= "</tbody>";
    $output .= "</table>";

    echo $output;
}

?>
