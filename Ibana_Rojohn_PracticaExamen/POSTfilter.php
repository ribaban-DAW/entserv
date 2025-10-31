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

function getEmployees(array $filters) {
    $title = isset($filters["title"]) ? strtolower($filters["title"]) : "";
    $city = isset($filters["city"]) ? strtolower($filters["city"]) : "";
    $country = isset($filters["country"]) ? strtolower($filters["country"]) : "";
    
    $conn = getDBConnection();
    
    $select = "SELECT employeeId, firstname, title, city, country, postalCode";
    $from = " FROM employee";
    $where = " WHERE LOWER(title) LIKE :title";
    $where .= " AND LOWER(city) LIKE :city";
    $where .= " AND LOWER(country) LIKE :country";

    $query = $select . $from . $where;
    $stmt = $conn->prepare($query);
    
    $title = "%$title%";
    $city = "%$city%";
    $country = "%$country%";
    $stmt->execute([
        "title" => $title,
        "city" => $city,
        "country" => $country,
    ]);
    $employees = $stmt->fetchall();

    return $employees;
}

$title = isset($_REQUEST["title"]) ? $_REQUEST["title"] : null;
$city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
$country = isset($_REQUEST["country"]) ? $_REQUEST["country"] : null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filters = [
        "title" => $title,
        "city" => $city,
        "country" => $country,
    ];
    $clients = getEmployees($filters);

    $output = "<table>";
        $output .= "<thead>";
            $output .= "<tr>";
                $output .= "<th>Employee ID</th>";
                $output .= "<th>First Name</th>";
                $output .= "<th>Title</th>";
                $output .= "<th>City</th>";
                $output .= "<th>Country</th>";
                $output .= "<th>Postal Code</th>";
            $output .= "</tr>";
        $output .= "</thead>";
        $output .= "<tbody>";
        foreach ($clients as $client) {
            $output .= "<tr>";
                $output .= "<td>" . $client["employeeId"] . "</td>";
                $output .= "<td>" . $client["firstname"] . "</td>";
                $output .= "<td>" . $client["title"] . "</td>";
                $output .= "<td>" . $client["city"] . "</td>";
                $output .= "<td>" . $client["country"] . "</td>";
                $output .= "<td>" . $client["postalCode"] . "</td>";
            $output .= "</tr>";
        }
        $output .= "</tbody>";
    $output .= "</table>";

    echo $output;
}

?>
