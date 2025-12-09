<?php

$url = "https://api.open-meteo.com/v1/forecast?latitude=36.7202&longitude=-4.4203&hourly=temperature_2m";

$response = @file_get_contents($url);

if ($response === false) {
    die("Error al consultar el servicio");
}

$data = json_decode($response, true);

$latitude = isset($data['latitude']) ? $data['latitude'] : null;
$longitude = isset($data['longitude']) ? $data['longitude'] : null;
if (!$latitude or !$longitude) {
    die("No se han podido obtener los datos");
}

echo "<h1>API Tiempo</h1>";

$hourly = isset($data['hourly']) ? $data['hourly'] : null;

echo "<p>Latitud: ${latitude}º, Longitud: ${longitude}º</p>";

$times = isset($hourly['time']) ? $hourly['time'] : [];
$len = count($times);

$temperatures = isset($hourly['temperature_2m']) ? $hourly['temperature_2m'] : [];

for ($i = 0; $i < $len; $i++) {
    echo "<p>${times[$i]}: ${temperatures[$i]}º</p>";
}

?>
