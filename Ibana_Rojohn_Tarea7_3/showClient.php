<?php

$id = $_GET["id"];
if (!isset($id)) {
    die("No se ha especificado un id");
}

$host = $_SERVER["HTTP_HOST"];
$basename = dirname($_SERVER["SCRIPT_NAME"]);

$url = "http://$host$basename/clienteporid.php?id=$id";

$response = @file_get_contents($url);

if ($response === false) {
    die("Error al consultar el servicio");
}
$data = json_decode($response, true);
$customer = isset($data["data"]) ? $data["data"] : null;
if (is_null($customer)) {
    die("No se ha podido obtener datos del cliente");
}

$output = "<p><b>customerNumber</b>: ${customer["customerNumber"]}</p>";
$output .= "<p><b>customerName</b>: ${customer["customerName"]}</p>";
$output .= "<p><b>contactLastName</b>: ${customer["contactLastName"]}</p>";
$output .= "<p><b>contactFirstName</b>: ${customer["contactFirstName"]}</p>";
$output .= "<p><b>phone</b>: ${customer["phone"]}</p>";
$output .= "<p><b>addressLine1</b>: ${customer["addressLine1"]}</p>";
$output .= "<p><b>addressLine2</b>: ${customer["addressLine2"]}</p>";
$output .= "<p><b>city</b>: ${customer["city"]}</p>";
$output .= "<p><b>state</b>: ${customer["state"]}</p>";
$output .= "<p><b>postalCode</b>: ${customer["postalCode"]}</p>";
$output .= "<p><b>country</b>: ${customer["country"]}</p>";
$output .= "<p><b>salesRepEmployeeNumber</b>: ${customer["salesRepEmployeeNumber"]}</p>";
$output .= "<p><b>creditLimit</b>: ${customer["creditLimit"]}</p>";
$output .= "<a href=\"index.php\">Volver</a>";

echo $output;

?>
