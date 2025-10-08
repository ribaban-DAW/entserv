<?php

include "db.php";
include "header.php";
include "utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productCode = isset($_REQUEST["productCode"]) ? $_REQUEST["productCode"] : null;
    $productName = isset($_REQUEST["productName"]) ? $_REQUEST["productName"] : null;
    $productLine = isset($_REQUEST["productLine"]) ? $_REQUEST["productLine"] : null;
    $productScale = isset($_REQUEST["productScale"]) ? $_REQUEST["productScale"] : null;
    $productVendor = isset($_REQUEST["productVendor"]) ? $_REQUEST["productVendor"] : null;
    $productDescription = isset($_REQUEST["productDescription"]) ? $_REQUEST["productDescription"] : null;
    $quantityInStock = isset($_REQUEST["quantityInStock"]) ? $_REQUEST["quantityInStock"] : null;
    $buyPrice = isset($_REQUEST["buyPrice"]) ? $_REQUEST["buyPrice"] : null;
    $MSRP = isset($_REQUEST["MSRP"]) ? $_REQUEST["MSRP"] : null;

    try {
        $conn = getDBConnection();
        $query = "INSERT INTO employees(productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) VALUES (:productCode, :productName, :productLine, :productScale, :productVendor, :productDescription, :quantityInStock, :buyPrice, :MSRP)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":productCode" => $productCode,
            ":productName" => $productName,
            ":productLine" => $productLine,
            ":productScale" => $productScale,
            ":productVendor" => $productVendor,
            ":productDescription" => $productDescription,
            ":quantityInStock" => $quantityInStock,
            ":buyPrice" => $buyPrice,
            ":MSRP" => $MSRP,
        ));

        echo "<p>Se ha creado el usuario correctamente</p>";
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido crear el usuario</p>";
    }
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
    <?php getHeader(); ?>

    <h1>Crear empleado</h1>
    <form method="POST">
        <div>
            <label for="productCode">ID Empleado</label>
            <input id="productCode" name="productCode" type="number" min="0" step="1" required>
        </div>
        <div>
            <label for="productName">Nombre</label>
            <input id="productName" name="productName" type="text" required>
        </div>
        <div>
            <label for="productLine">Apellidos</label>
            <input id="productLine" name="productLine" type="text" required>
        </div>
        <div>
            <label for="productScale">Extensión</label>
            <input id="productScale" name="productScale" type="text" required>
        </div>
        <div>
            <label for="productVendor">Correo electrónico</label>
            <input id="productVendor" name="productVendor" type="productVendor" required>
        </div>
        <div>
            <label for="productDescription">Oficina</label>
            <select name="productDescription" id="productDescription" required>
                <?php
                    $offices = getOffices();
                    $output = "";
                    foreach ($offices as $office) {
                        $output .= "<option value=\"${office["productDescription"]}\">${office["city"]}</option>";
                    }
                    echo $output;
                ?>
            </select>
        </div>
        <div>
            <label for="quantityInStock">Reporta a</label>
            <select name="quantityInStock" id="quantityInStock" required>
                <?php
                    $employees = getEmployees();
                    $output = "";
                    foreach ($employees as $employee) {
                        $output .= "<option value=\"${employee["productCode"]}\">${employee["productName"]} ${employee["productLine"]}</option>";
                    }
                    echo $output;
                    ?>
            </select>
        </div>
        <div>
            <label for="buyPrice">Cargo</label>
            <select name="buyPrice" id="buyPrice" required>
                <?php
                    $employees = getEmployeeJobTitles();
                    $output = "";
                    foreach ($employees as $employee) {
                        $output .= "<option value=\"${employee["buyPrice"]}\">${employee["buyPrice"]}</option>";
                    }
                    echo $output;
                ?>
            </select>
        </div>
        <div>
            <label for="MSRP">Contraseña</label>
            <input id="MSRP" name="MSRP" type="password" required>
        </div>

        <button type="submit">Crear</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
