<?php
    include_once "pdoconfig.php";
    include_once "db.php";

    $factura = isset($_REQUEST["factura"]) ? intval($_REQUEST["factura"]) : "";
    $empleado = isset($_REQUEST["empleado"]) ? strtolower($_REQUEST["empleado"]) : "";
    $cliente = isset($_REQUEST["cliente"]) ? strtolower($_REQUEST["cliente"]) : "";
    $fruta = isset($_REQUEST["fruta"]) ? strtolower($_REQUEST["fruta"]) : "";

    $conn = getDBConnection();

    $select = "SELECT Factura, e.Nombre AS NombreEmpleado, c.Nombre AS NombreCliente, f.Nombre AS NombreFruta, Cantidad, Fecha ";
    $from = " FROM venta AS v INNER JOIN empleado AS e ON v.FK_NIFEmpleado = e.PK_NIF INNER JOIN cliente AS c ON v.FK_NIFCliente = c.PK_NIF INNER JOIN fruta AS f ON v.FK_IDFruta = f.PK_ID ";
    $where = ($factura)
    ? " WHERE Factura = :factura AND e.Nombre LIKE :empleado AND c.Nombre LIKE :cliente AND f.Nombre LIKE :fruta"
    : " WHERE e.Nombre LIKE :empleado AND c.Nombre LIKE :cliente AND f.Nombre LIKE :fruta";
    
    $query = $select . $from . $where;
    $stmt = $conn->prepare($query);
    $stmt->execute(($factura)
    ? [
        ":factura" => $factura,
        ":empleado" => "%$empleado%",
        ":cliente" => "%$cliente%",
        ":fruta" => "%$fruta%",
    ]
    : [
        ":empleado" => "%$empleado%",
        ":cliente" => "%$cliente%",
        ":fruta" => "%$fruta%",
    ]);
    $ventas = $stmt->fetchall();

    $output = "";
    foreach ($ventas as $venta) {
        $output .= "<tr>";
            $output .= "<td>${venta["Factura"]}</td>";
            $output .= "<td>${venta["NombreEmpleado"]}</td>";
            $output .= "<td>${venta["NombreCliente"]}</td>";
            $output .= "<td>${venta["NombreFruta"]}</td>";
            $output .= "<td>${venta["Cantidad"]}</td>";
            $output .= "<td>${venta["Fecha"]}</td>";
        $output .= "</tr>";
    }

    echo $output;
?>
