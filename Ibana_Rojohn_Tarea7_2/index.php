<?php

$url = "https://pokeapi.co/api/v2/pokemon?limit=100000";

$output = "<ol>";
$request = @file_get_contents($url);

if (!$request) {
    die("No se ha podido conectar con la PokeAPI");
}

$data = json_decode($request, true);
$url = isset($data['next']) ? $data['next'] : null;
if (isset($data['results'])) {
    foreach ($data['results'] as $result) {
        $splitUrl = explode("/", $result["url"]);
        $id = $splitUrl[count($splitUrl) - 2];
        $output .= "<li><a href='show.php?id=$id'>${result["name"]}</a></li>";
    }
}


$output .= "</ol>";
echo $output;

?>
