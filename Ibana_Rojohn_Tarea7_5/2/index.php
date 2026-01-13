<?php

// NOTE(srvariable): Hay que crear este archivo con la API_KEY.
require_once "env.php";

$option = $_GET["option"] ?? null;
$query = $_GET["query"] ?? null;

if (!is_null($option)) {
    $query_params = "";
    if ($option != "sources") {
        $query_params = "q=$query";
    }
    $query_params .= "&apiKey=$API_KEY";
    $url = "https://newsapi.org/v2/$option?$query_params";

    $response = @file_get_contents($url);
    if ($response === false) {
        die("Error obteniendo datos de $url");
    }
    
    $data = json_decode($response, true);
    if (!isset($data)) {
        die("No se han podido obtener los datos");
    }

    $articles = $data["articles"] ?? null;
    $sources = $data["sources"] ?? null;

    function format_article($article) {
        $output = "<h2>{$article["title"]}</h2>";
        $output .= "<h3>{$article["author"]} {$article["publishedAt"]}</h3>";
        $output .= "<p>{$article["description"]}</p>";
        
        return $output;
    }

    function format_source($source) {
        $output = "<h2>{$source["name"]}</h2>";
        $output .= "<a href='{$source["url"]}'>Source</a>";
        $output .= "<p>{$source["description"]}</p>";
        
        return $output;
    }
    
    $output = "";
    if (!is_null($articles)) {
        foreach ($articles as $article) {
            $output .= format_article($article);
        }
    } else if (!is_null($sources)) {
        foreach ($sources as $source) {
            $output .= format_source($source);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewsAPI</title>
</head>
<body>
    <h1>NewsAPI</h1>
    <form>
        <select name="option" id="option">
            <option value="everything">Mostrar todo</option>
            <option value="top-headlines">Cabeceras</option>
            <option value="sources">Orígenes</option>
        </select>
        <input name="query" type="text" placeholder="bitcoin" required>
        <button type="submit">Mostrar</button>
    </form>
    <p><?php if (isset($output)) { echo $output; } ?></p>
</body>
</html>
