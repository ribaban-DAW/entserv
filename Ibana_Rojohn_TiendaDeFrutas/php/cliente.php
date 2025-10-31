<?php
    include_once "pdoconfig.php";
    include_once "db.php";

    $conn = getDBConnection();
    $stmt = $conn->prepare("SELECT PK_NIF, Nombre, Edad, Pais, Ciudad FROM cliente");
    $stmt->execute();
    $clientes = $stmt->fetchall();
    
    $output = "";
    foreach ($clientes as $cliente) {
        $output .= "<tr>";
            $output .= "<td>${cliente["PK_NIF"]}</td>";
            $output .= "<td>${cliente["Nombre"]}</td>";
            $output .= "<td>${cliente["Edad"]}</td>";
            $output .= "<td>${cliente["Pais"]}</td>";
            $output .= "<td>${cliente["Ciudad"]}</td>";
        $output .= "</tr>";
    }

    echo $output;
?>
