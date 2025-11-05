<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=northwind;", "root", "daw24.");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para lanzar excepciones si hay un error

    $stmt = $conn->query("SHOW TABLES");
    $stmt->execute();
    $tables = $stmt->fetchall(PDO::FETCH_NUM);

    echo "<h1>Tablas</h1>";
    for ($i = 0; $i < count($tables); $i++) {
        $tableName = $tables[$i][0];

        echo "<h2>$tableName</h2>";
        $stmt2 = $conn->query("SELECT * FROM $tableName");
        $stmt2->execute();
        $rows = $stmt2->fetchall(PDO::FETCH_ASSOC);

        if ($rows) {
            $columnNames = array_keys($rows[0]);
            echo "<table border=1>";
            echo "<thead>";
                echo "<tr>";
                foreach ($columnNames as $columnName) {
                    echo "<th>$columnName</th>";
                }
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($rows as $row) {
                echo "<tr>";
                foreach($columnNames as $columnName) {
                    echo "<td>${row[$columnName]}</td>";
                }
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";

        }
    }
} catch (PDOException $pe) {
    die("No se ha podido realizar la conexión. Motivo: " . $pe->getMessage());
}

?>
