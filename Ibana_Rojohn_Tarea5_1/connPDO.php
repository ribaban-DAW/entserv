<?php

$host = isset($_REQUEST["host"]) ? $_REQUEST["host"] : null;
$dbname = isset($_REQUEST["dbname"]) ? $_REQUEST["dbname"] : null;
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : null;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para lanzar excepciones si hay un error
    echo "<p>Conectado correctamente utilizando PDO</p>";
} catch (PDOException $pe) {
    die("No se ha podido realizar la conexión. Motivo: " . $pe->getMessage());
}

?>
