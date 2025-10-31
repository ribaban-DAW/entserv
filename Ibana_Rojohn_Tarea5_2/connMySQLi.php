<?php

$host = isset($_REQUEST["host"]) ? $_REQUEST["host"] : null;
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : null;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : null;
$dbname = isset($_REQUEST["dbname"]) ? $_REQUEST["dbname"] : null;

try {
    $conn = mysqli_connect($host, $username, $password, $dbname);
    echo "<p>Conectado correctamente utilizando MySQLi " . mysqli_get_host_info($conn) . "</p>";
    $query = "SHOW TABLES";
    $result = mysqli_query($conn, $query);
    mysqli_fetch_all($result, MYSQLI_ASSOC);
    var_dump($result);

    mysqli_free_result($result);
    mysqli_close($conn);
} catch (Exception $e) {
    die("No se ha podido realizar la conexión. Motivo: " . $e->getMessage());
}

?>
