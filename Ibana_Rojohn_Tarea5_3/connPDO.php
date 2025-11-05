<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=northwind;", "root", "daw24.");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para lanzar excepciones si hay un error

    $select = "SELECT custId, companyName, contactName, contactTitle, address, city, region, postalCode, country, phone, mobile, email, fax ";
    $from = "FROM customer ";
    
    $query = $select . $from;

    $stmt = $conn->query($query);
    $stmt->execute();

    echo "<table border=1>";
    echo "<thead>";
        echo "<th>custId</th>";
        echo "<th>companyName</th>";
        echo "<th>contactName</th>";
        echo "<th>contactTitle</th>";
        echo "<th>address</th>";
        echo "<th>city</th>";
        echo "<th>region</th>";
        echo "<th>postalCode</th>";
        echo "<th>country</th>";
        echo "<th>phone</th>";
        echo "<th>mobile</th>";
        echo "<th>email</th>";
        echo "<th>fax</th>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
            echo "<td>${row["custId"]}</td>";
            echo "<td>${row["companyName"]}</td>";
            echo "<td>${row["contactName"]}</td>";
            echo "<td>${row["contactTitle"]}</td>";
            echo "<td>${row["address"]}</td>";
            echo "<td>${row["city"]}</td>";
            echo "<td>${row["region"]}</td>";
            echo "<td>${row["postalCode"]}</td>";
            echo "<td>${row["country"]}</td>";
            echo "<td>${row["phone"]}</td>";
            echo "<td>${row["mobile"]}</td>";
            echo "<td>${row["email"]}</td>";
            echo "<td>${row["fax"]}</td>";
        echo "<tr>";
    }
    echo "</tbody>";
    echo "</table>";
} catch (PDOException $pe) {
    die("No se ha podido realizar la conexión. Motivo: " . $pe->getMessage());
}

?>
