<?php

function getDBConnection() {
    $host = "localhost";
    $dbname = "northwind";
    $username = "root";
    $password = "daw24.";
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);

    return $conn;
}

function getClients(array $filters) {
    // Para que tenga una cadena vacía en lugar de un null si no está establecido
    $companyName = isset($filters["companyName"]) ? strtolower($filters["companyName"]) : "";
    $contactName = isset($filters["contactName"]) ? strtolower($filters["contactName"]) : "";
    $city = isset($filters["city"]) ? strtolower($filters["city"]) : "";
    $country = isset($filters["country"]) ? strtolower($filters["country"]) : "";
    
    $conn = getDBConnection();
    
    $query = "SELECT companyName, contactName, city, country FROM customer ";
    $query .= "WHERE LOWER(companyName) LIKE :companyName "; // Para evitar problemas con las mayúsculas, minúsculas... (Robado de https://stackoverflow.com/a/16082874)
    $query .= "AND LOWER(contactName) LIKE :contactName ";
    $query .= "AND LOWER(city) LIKE :city ";
    $query .= "AND LOWER(country) LIKE :country";
    $stmt = $conn->prepare($query);
    
    // Añadir los porcentajes para que funcione bien el LIKE
    // https://www.php.net/manual/en/pdostatement.bindparam.php
    $companyName = "%$companyName%";
    $contactName = "%$contactName%";
    $city = "%$city%";
    $country = "%$country%";
    $stmt->execute([
        "companyName" => $companyName,
        "contactName" => $contactName,
        "city" => $city,
        "country" => $country,
    ]);
    $clients = $stmt->fetchall();

    return $clients;
}

$companyName = isset($_REQUEST["companyName"]) ? $_REQUEST["companyName"] : null;
$contactName = isset($_REQUEST["contactName"]) ? $_REQUEST["contactName"] : null;
$city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
$country = isset($_REQUEST["country"]) ? $_REQUEST["country"] : null;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $filters = [
        "companyName" => $companyName,
        "contactName" => $contactName,
        "city" => $city,
        "country" => $country,
    ];
    $clients = getClients($filters);

    $output = "<table>";
        $output .= "<thead>";
            $output .= "<tr>";
                $output .= "<th>Company Name</th>";
                $output .= "<th>Contact Name</th>";
                $output .= "<th>City</th>";
                $output .= "<th>Country</th>";
            $output .= "</tr>";
        $output .= "</thead>";
        $output .= "<tbody>";
        foreach ($clients as $client) {
            $output .= "<tr>";
                $output .= "<td>" . $client["companyName"] . "</td>";
                $output .= "<td>" . $client["contactName"] . "</td>";
                $output .= "<td>" . $client["city"] . "</td>";
                $output .= "<td>" . $client["country"] . "</td>";
            $output .= "</tr>";
        }
        $output .= "</tbody>";
    $output .= "</table>";

    echo $output;
}

?>
