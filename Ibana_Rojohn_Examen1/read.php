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
    $query = "SELECT e.employeeNumber, e.firstName, e.lastName, e.extension, e.email, e.reportsTo, e.jobTitle, o.city FROM employees AS e JOIN offices AS o ON o.officeCode = e.officeCode";
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
        $table .= "<td>${result["firstName"]}</td>";
        $table .= "<td>${result["lastName"]}</td>";
        $table .= "<td>${result["extension"]}</td>";
        $table .= "<td>${result["email"]}</td>";
        $table .= "<td>${result["city"]}</td>";
        $table .= "<td>" . getReportsToName($result["reportsTo"]) . "</td>";
        $table .= "<td>${result["jobTitle"]}</td>";
        $table .= "<td><a href=\"update.php?employeeNumber=${result["employeeNumber"]}\">Modificar</a></td>";
        $table .= "<td><a href=\"delete.php?employeeNumber=${result["employeeNumber"]}\">Eliminar</a></td>";
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
