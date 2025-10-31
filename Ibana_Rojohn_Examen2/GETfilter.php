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

function getCustomers(array $filters) {
    $customerName = isset($filters["customerName"]) ? strtolower($filters["customerName"]) : "";
    $city = isset($filters["city"]) ? strtolower($filters["city"]) : "";
    $country = isset($filters["country"]) ? strtolower($filters["country"]) : "";
    $creditLimit = isset($filters["creditLimit"]) ? floatval($filters["creditLimit"]) : null;

    $conn = getDBConnection();

    $select = "SELECT customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit";
    $from = " FROM customers";
    $where = " WHERE LOWER(customerName) LIKE :customerName";
    $where .= " AND LOWER(city) LIKE :city";
    $where .= " AND LOWER(country) LIKE :country";
    if ($creditLimit) {
        $where .= " AND creditLimit < :creditLimit";
    }

    $query = $select . $from . $where;
    $stmt = $conn->prepare($query);
    
    $customerName = "%$customerName%";
    $city = "%$city%";
    $country = "%$country%";
    $stmt->execute(
        ($creditLimit)
        ? [
            "customerName" => $customerName,
            "city" => $city,
            "country" => $country,
            "creditLimit" => $creditLimit,
        ]
        : [
            "customerName" => $customerName,
            "city" => $city,
            "country" => $country,
        ]
);
    $customers = $stmt->fetchall();

    return $customers;
}

$customerName = isset($_REQUEST["customerName"]) ? $_REQUEST["customerName"] : null;
$city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
$country = isset($_REQUEST["country"]) ? $_REQUEST["country"] : null;
$creditLimit = isset($_REQUEST["creditLimit"]) ? $_REQUEST["creditLimit"] : null;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $filters = [
        "customerName" => $customerName,
        "city" => $city,
        "country" => $country,
        "creditLimit" => $creditLimit,
    ];
    $customers = getCustomers($filters);

    $output = "<table>";
        $output .= "<thead>";
            $output .= "<tr>";
                $output .= "<th>Customer Number</th>";
                $output .= "<th>Customer Name</th>";
                $output .= "<th>Contact Last Name</th>";
                $output .= "<th>Contact First Name</th>";
                $output .= "<th>Phone</th>";
                $output .= "<th>Address Line 1</th>";
                $output .= "<th>Address Line 2</th>";
                $output .= "<th>City</th>";
                $output .= "<th>State</th>";
                $output .= "<th>Postal Code</th>";
                $output .= "<th>Country</th>";
                $output .= "<th>Sales Rep Employee Number</th>";
                $output .= "<th>Credit Limit</th>";
            $output .= "</tr>";
        $output .= "</thead>";
        $output .= "<tbody>";
        foreach ($customers as $customer) {
            $output .= "<tr>";
                $output .= "<td>" . $customer["customerNumber"] . "</td>";
                $output .= "<td>" . $customer["customerName"] . "</td>";
                $output .= "<td>" . $customer["contactLastName"] . "</td>";
                $output .= "<td>" . $customer["contactFirstName"] . "</td>";
                $output .= "<td>" . $customer["phone"] . "</td>";
                $output .= "<td>" . $customer["addressLine1"] . "</td>";
                $output .= "<td>" . $customer["addressLine2"] . "</td>";
                $output .= "<td>" . $customer["city"] . "</td>";
                $output .= "<td>" . $customer["state"] . "</td>";
                $output .= "<td>" . $customer["postalCode"] . "</td>";
                $output .= "<td>" . $customer["country"] . "</td>";
                $output .= "<td>" . $customer["salesRepEmployeeNumber"] . "</td>";
                $output .= "<td>" . $customer["creditLimit"] . "</td>";
            $output .= "</tr>";
        }
        $output .= "</tbody>";
    $output .= "</table>";

    echo $output;
}

?>
