<?php

$option = $_GET["option"] ?? null;
$temperature = $_GET["temperature"] ?? null;
$short_hand = [
    "celsius" => "C",
    "fahrenheit" => "F",
];
$convert_to = "";

$query_params   = "temperature=$temperature";
if ($option == "celsius") {
    $url = "http://localhost/entserv/Ibana_Rojohn_Tarea7_5/1/celsius.php?$query_params";
    $convert_to = "fahrenheit";
} else if ($option == "fahrenheit") {
    $url = "http://localhost/entserv/Ibana_Rojohn_Tarea7_5/1/fahrenheit.php?$query_params";
    $convert_to = "celsius";
}

if (!is_null($option)) {
    $response = @file_get_contents($url);
    if ($response === false) {
        die("No se ha podido conectar con el servicio");
    }
    
    $data = json_decode($response, true);
    if (!isset($data["data"])) {
        die("No se han podido obtener los datos");
    }
    
$result = "$temperature º$short_hand[$option] son {$data["data"][$convert_to]} º$short_hand[$convert_to]";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
    <input type="radio" name="option" id="celsius" value="celsius">
    <label for="celsius">Celsius</label>
    <input type="radio" name="option" id="fahrenheit" value="fahrenheit">
    <label for="fahrenheit">Fahrenheit</label>

    <input name="temperature" id="temperature" value=0 type="number" step="0.01" placeholder="0" required>
    <button type="submit">Convertir</button>
    </form>
    <p><?php if (isset($result)) { echo $result; } ?></p>
</body>
</html>
