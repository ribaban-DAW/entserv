<?php

include "db.php";
include "header.php";
include "utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeNumber = isset($_REQUEST["employeeNumber"]) ? $_REQUEST["employeeNumber"] : null;
    $firstName = isset($_REQUEST["firstName"]) ? $_REQUEST["firstName"] : null;
    $lastName = isset($_REQUEST["lastName"]) ? $_REQUEST["lastName"] : null;
    $extension = isset($_REQUEST["extension"]) ? $_REQUEST["extension"] : null;
    $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
    $officeCode = isset($_REQUEST["officeCode"]) ? $_REQUEST["officeCode"] : null;
    $reportsTo = isset($_REQUEST["reportsTo"]) ? $_REQUEST["reportsTo"] : null;
    $jobTitle = isset($_REQUEST["jobTitle"]) ? $_REQUEST["jobTitle"] : null;
    $pass = isset($_REQUEST["pass"]) ? $_REQUEST["pass"] : null;

    // // DEBUG
    // echo "<p>employeeNumber: $employeeNumber</p>";
    // echo "<p>firstName: $firstName</p>";
    // echo "<p>lastName: $lastName</p>";
    // echo "<p>extension: $extension</p>";
    // echo "<p>email: $email</p>";
    // echo "<p>officeCode: $officeCode</p>";
    // echo "<p>reportsTo: $reportsTo</p>";
    // echo "<p>jobTitle: $jobTitle</p>";
    // echo "<p>pass: $pass</p>";

    try {
        $conn = getDBConnection();
        $query = "INSERT INTO employees(employeeNumber, firstName, lastName, extension, email, officeCode, reportsTo, jobTitle, pass) VALUES (:employeeNumber, :firstName, :lastName, :extension, :email, :officeCode, :reportsTo, :jobTitle, :pass)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":employeeNumber" => $employeeNumber,
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ":extension" => $extension,
            ":email" => $email,
            ":officeCode" => $officeCode,
            ":reportsTo" => $reportsTo,
            ":jobTitle" => $jobTitle,
            ":pass" => $pass,
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
            <label for="employeeNumber">ID Empleado</label>
            <input id="employeeNumber" name="employeeNumber" type="number" min="0" step="1" required>
        </div>
        <div>
            <label for="firstName">Nombre</label>
            <input id="firstName" name="firstName" type="text" required>
        </div>
        <div>
            <label for="lastName">Apellidos</label>
            <input id="lastName" name="lastName" type="text" required>
        </div>
        <div>
            <label for="extension">Extensión</label>
            <input id="extension" name="extension" type="text" required>
        </div>
        <div>
            <label for="email">Correo electrónico</label>
            <input id="email" name="email" type="email" required>
        </div>
        <div>
            <label for="officeCode">Oficina</label>
            <select name="officeCode" id="officeCode" required>
                <?php
                    $offices = getOffices();
                    $output = "";
                    foreach ($offices as $office) {
                        $output .= "<option value=\"${office["officeCode"]}\">${office["city"]}</option>";
                    }
                    echo $output;
                ?>
            </select>
        </div>
        <div>
            <label for="reportsTo">Reporta a</label>
            <select name="reportsTo" id="reportsTo" required>
                <?php
                    $employees = getEmployees();
                    $output = "";
                    foreach ($employees as $employee) {
                        $output .= "<option value=\"${employee["employeeNumber"]}\">${employee["firstName"]} ${employee["lastName"]}</option>";
                    }
                    echo $output;
                    ?>
            </select>
        </div>
        <div>
            <label for="jobTitle">Cargo</label>
            <select name="jobTitle" id="jobTitle" required>
                <?php
                    $employees = getEmployeeJobTitles();
                    $output = "";
                    foreach ($employees as $employee) {
                        $output .= "<option value=\"${employee["jobTitle"]}\">${employee["jobTitle"]}</option>";
                    }
                    echo $output;
                ?>
            </select>
        </div>
        <div>
            <label for="pass">Contraseña</label>
            <input id="pass" name="pass" type="password" required>
        </div>

        <button type="submit">Crear</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
