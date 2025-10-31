<?php

function getDBConnection(): PDO {
    $host = $GLOBALS["host"];
    $dbname = $GLOBALS["dbname"];
    $username = $GLOBALS["username"];
    $password = $GLOBALS["password"];
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para lanzar excepciones si hay un error

    return $conn;
}

?>
