<?php

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;

$url = "https://pokeapi.co/api/v2/pokemon/$id";

$request = @file_get_contents($url);

if (!$request) {
    die("No se ha podido conectar con la PokeAPI");
}

$data = json_decode($request, true);

$name = isset($data['name']) ? $data['name'] : null;
$moves = isset($data['moves']) ? $data['moves'] : null;
$types = isset($data['types']) ? $data['types'] : null;
$sprites = isset($data['sprites']) ? $data['sprites'] : null;
$stats = isset($data['stats']) ? $data['stats'] : null;

$output = "<h1>Nombre: " . ucfirst($name) . "</h1>";
$output .= "<h2>Tipo/s: ";
foreach ($types as $typeIndex) {
    $typeName = $typeIndex["type"]["name"];
    $output .= ucfirst($typeName) . " ";
}
$output .= "</h2>";

$output .= "<h2>Movimientos</h2>";
$maxMoves = count($moves) > 4 ? 4 : count($moves);
for ($i = 0; $i < $maxMoves; $i++) {
    $moveName = $moves[$i]["move"]["name"];
    $output .= "<p>$moveName</p>";
}

$output .= "<h2>Sprites</h2>";
foreach ($sprites as $sprite) {
    if ($sprite && !is_array($sprite)) {
        $output .= "<img src='$sprite' />";
    }
}

$output .= "<h2>Estadisticas</h2>";
foreach ($stats as $statIndex) {
    $statName = ucfirst($statIndex["stat"]["name"]);
    $statValue = $statIndex["base_stat"];
    $output .= "<p>$statName: $statValue</p>";
}

$output .= "<a href='index.php'>Volver</a>";

echo $output;

?>
