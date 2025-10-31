<?php
    include_once "pdoconfig.php";
    include_once "db.php";

    $conn = getDBConnection();
    $stmt = $conn->prepare("SELECT PK_NIF, Nombre, Edad, Cargo, Sueldo FROM empleado");
    $stmt->execute();
    $empleados = $stmt->fetchall();
    
    $output = "";
    foreach ($empleados as $empleado) {
        $output .= "<tr>";
            $output .= "<td>${empleado["PK_NIF"]}</td>";
            $output .= "<td>${empleado["Nombre"]}</td>";
            $output .= "<td>${empleado["Edad"]}</td>";
            $output .= "<td>${empleado["Cargo"]}</td>";
            $output .= "<td>${empleado["Sueldo"]}</td>";
        $output .= "</tr>";
    }

    echo $output;
?>
