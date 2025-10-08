<?php

include "db.php";
include "header.php";

// TODO(srvariable): Si no es admin que redirija al menú

function getReportsToName(int | null $reportsToNumber): string {
    $reportsToName = "";

    $conn = getDBConnection();
    $query = "SELECT firstName, lastName FROM employees WHERE employeeNumber = :reportsToNumber";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":reportsToNumber" => $reportsToNumber));
    $results = $stmt->fetchall();
    if (count($results) > 0) {
        $reportsToName = $results[0]["firstName"] . " " . $results[0]["lastName"];
    }

    return $reportsToName;
}

function getControlPanel() {
    $conn = getDBConnection();
    $query = "SELECT p.productCode, p.productName, p.productLine, pl.textDescription, p.productScale, p.productVendor, p.productDescription, p.quantityInStock, p.buyPrice, p.MSRP FROM products AS p JOIN productlines AS pl ON p.productLine = pl.productLine";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchall();

    echo "<a href=\"create.php\">Insertar empleado</a>";
    $table = "<table>";
    $table .= "<thead>";
    $table .= "<tr>";
    $table .= "<th>Nombre</th>";
    $table .= "<th>Apellidos</th>";
    $table .= "<th>Extension</th>";
    $table .= "<th>Correo electrónico</th>";
    $table .= "<th>Oficina</th>";
    $table .= "<th>Reporta a</th>";
    $table .= "<th>Cargo</th>";
    $table .= "<th>Acciones</th>";
    $table .= "</tr>";
    $table .= "</thead>";
    $table .= "<tbody>";
    foreach ($results as $result) {
        $table .= "<tr>";
        $table .= "<td>${result["productName"]}</td>";
        $table .= "<td>${result["productLine"]}</td>";
        $table .= "<td>${result["textDescription"]}</td>";
        $table .= "<td>${result["productScale"]}</td>";
        $table .= "<td>${result["productVendor"]}</td>";
        $table .= "<td>${result["productDescription"]}</td>";
        $table .= "<td>${result["quantityInStock"]}</td>";
        $table .= "<td>${result["buyPrice"]}</td>";
        $table .= "<td>${result["MSRP"]}</td>";
        $table .= "<td><a href=\"updateProductos.php?productCode=${result["productCode"]}\">Modificar</a></td>";
        $table .= "<td><a href=\"deleteProductos.php?productCode=${result["productCode"]}\">Eliminar</a></td>";
        $table .= "</tr>";
    }
    $table .= "</tbody>";

    echo $table;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php getControlPanel(); ?>
</body>
</html>
