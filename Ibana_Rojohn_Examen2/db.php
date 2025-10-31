<?php

require_once "pdoconfig.php"

function getDBConnection() {
    $host = $GLOBALS["host"];
    $dbname = $GLOBALS["dbname"];
    $username = $GLOBALS["username"];
    $password = $GLOBALS["password"];
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);

    return $conn;
}

?>
