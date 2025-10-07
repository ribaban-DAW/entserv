<?php

function getDBConnection(string $dbname): PDO {
    $host = $GLOBALS["host"];
    $username = $GLOBALS["username"];
    $password = $GLOBALS["password"];
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para lanzar excepciones si hay un error

    return $conn;
}

function executeQuery(PDO $conn, string $query) {
    $stmt = $conn->prepare($query);
    $stmt->execute();

    return $stmt;
}

?>
