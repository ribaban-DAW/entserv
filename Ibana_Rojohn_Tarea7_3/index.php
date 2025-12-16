<?php

$host = $_SERVER["HTTP_HOST"];
$basename = dirname($_SERVER["SCRIPT_NAME"]);

$url = "http://$host$basename/clientes.php";

$response = @file_get_contents($url);

if ($response === false) {
    die("Error al consultar el servicio");
}

$data = json_decode($response, true);

$customers = isset($data["data"]) ? $data["data"] : null;

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
        $output .= "<th>salesRepEmployeeNumber</th>";
        $output .= "<th>creditLimit</th>";
        $output .= "<th>Link</th>";
    $output .= "</tr>";
$output .= "</thead>";
$output .= "<tbody>";
foreach ($customers as $customer) {
    $output .= "<tr>";
        $output .= "<td>${customer["customerNumber"]}</td>";
        $output .= "<td>${customer["customerName"]}</td>";
        $output .= "<td>${customer["contactLastName"]}</td>";
        $output .= "<td>${customer["contactFirstName"]}</td>";
        $output .= "<td>${customer["phone"]}</td>";
        $output .= "<td>${customer["addressLine1"]}</td>";
        $output .= "<td>${customer["addressLine2"]}</td>";
        $output .= "<td>${customer["city"]}</td>";
        $output .= "<td>${customer["state"]}</td>";
        $output .= "<td>${customer["postalCode"]}</td>";
        $output .= "<td>${customer["country"]}</td>";
        $output .= "<td>${customer["salesRepEmployeeNumber"]}</td>";
        $output .= "<td>${customer["creditLimit"]}</td>";
        $output .= "<td><a href=\"showClient.php?id=${customer["customerNumber"]}\">Visit</td>";
    $output .= "</tr>";
}
$output .= "</tbody>";
$output .= "</table>";

echo $output;

?>
