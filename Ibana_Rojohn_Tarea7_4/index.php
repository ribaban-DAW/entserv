<?php

$city = "San Pedro Alcántara";
$latitude = 36.4848;
$longitude = -4.9913;

if (isset($_GET['city']) && !empty($_GET['city'])) {
    $city = urlencode($_GET['city']);

    $query_params = "name=$city";
    $query_params .= "&count=1";
    $query_params .= "&language=es";
    $geoUrl = "https://geocoding-api.open-meteo.com/v1/search?$query_params";
    $geoResponse = @file_get_contents($geoUrl);
    if ($geoResponse === false) {
        die("No se han podido obtener los datos");
    }

    $geoData = json_decode($geoResponse, true);
    if (!isset($geoData['results'][0])) {
        die("No se ha encontrado la localidad");
    }

    $latitude = $geoData['results'][0]['latitude'];
    $longitude = $geoData['results'][0]['longitude'];
    $city = $geoData['results'][0]['name'];
}

$query_params  = "latitude=$latitude";
$query_params .= "&longitude=$longitude";
$query_params .= "&daily=weathercode,temperature_2m_max,temperature_2m_min";
$query_params .= "&timezone=Europe/Madrid";

$url = "https://api.open-meteo.com/v1/forecast?$query_params";
$response = @file_get_contents($url);
if ($response === false) {
    die("No se ha podido conectar con el servicio");
}

$data = json_decode($response, true);
if (!isset($data['daily'])) {
    die("No se han podido obtener los datos");
}

$output = "<h1>El tiempo en $city</h1>";
$output .= "<p>Latitud: $latitude º | Longitud: $longitude º</p>";
$output .= "<form method='get'>";
  $output .= "<input type='text' name='city' placeholder='Introduce una localidad' required>";
  $output .= "<button type='submit'>Consultar el tiempo en otra localidad</button>";
$output .= "</form>";

$days = $data['daily']['time'];
$codes = $data['daily']['weathercode'];
$maxTemps = $data['daily']['temperature_2m_max'];
$minTemps = $data['daily']['temperature_2m_min'];

$output .= "<h2>Previsión para los próximos 7 días</h2>";

for ($i = 0; $i < count($days); $i++) {
    $code = $codes[$i];
    // https://open-meteo.com/en/docs#weather_variable_documentation
    $icon = match (true) {
        in_array($code, [0, 1]) => "☀️",
        $code === 2 => "🌤️",
        $code === 3 => "☁️",
        in_array($code, [45, 48]) => "🌫️",
        in_array($code, [51, 53, 55, 56, 57, 61, 63, 65, 66, 67, 80, 81, 82]) => "🌧️",
        in_array($code, [71, 73, 75, 77, 85, 86]) => "❄️",
        in_array($code, [95, 96, 99]) => "⛈️",
        default => "❓"
    };

    $day = date("d/m/Y", strtotime($days[$i]));
    $output .= "<p>";
      $output .= "<strong>$day</strong>";
      $output .= " $icon";
      $output .= " Temperatura máxima: {$maxTemps[$i]}ºC";
      $output .= " Temperatura mínima: {$minTemps[$i]}ºC";
    $output .= "</p>";
}

echo $output;

?>
