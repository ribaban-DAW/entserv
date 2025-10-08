<?php

function getDbConnection() {
    $conn = new PDO("mysql:host=localhost;dbname=classicmodels;", "root", "daw24.");
    return $conn;
}

?>
