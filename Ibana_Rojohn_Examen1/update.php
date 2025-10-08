<?php

include "db.php";
include "header.php";
include "utils.php";

$employeeNumber = isset($_REQUEST["employeeNumber"]) ? $_REQUEST["employeeNumber"] : null;
$currentEmployee = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Viene del mismo archivo
    $firstName = isset($_REQUEST["firstName"]) ? $_REQUEST["firstName"] : null;
    $lastName = isset($_REQUEST["lastName"]) ? $_REQUEST["lastName"] : null;
    $extension = isset($_REQUEST["extension"]) ? $_REQUEST["extension"] : null;
    $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
    $officeCode = isset($_REQUEST["officeCode"]) ? $_REQUEST["officeCode"] : null;
    $reportsTo = isset($_REQUEST["reportsTo"]) ? $_REQUEST["reportsTo"] : null;
    $jobTitle = isset($_REQUEST["jobTitle"]) ? $_REQUEST["jobTitle"] : null;
    $pass = isset($_REQUEST["pass"]) ? $_REQUEST["pass"] : null;

    try {
        $conn = getDBConnection();
        $query = "UPDATE employees SET firstName = :firstName, lastName = :lastName, extension = :extension, email = :email, officeCode = :officeCode, reportsTo = :reportsTo, jobTitle = :jobTitle, pass = :pass WHERE employeeNumber = :employeeNumber";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ":extension" => $extension,
            ":email" => $email,
            ":officeCode" => $officeCode,
            ":reportsTo" => $reportsTo,
            ":jobTitle" => $jobTitle,
            ":pass" => $pass,
            ":employeeNumber" => $employeeNumber,
        ));
        header("location: read.php");
    } catch (PDOException $e) {
        echo "<p>No se ha podido modificar el usuario." . $e->getMessage() . "</p>";
        echo "<a href=\"read.php\">Volver al panel de control</a>";
        die();
    }

} else {
    $conn = getDBConnection();
    $query = "SELECT firstName, lastName, extension, email, officeCode, reportsTo, jobTitle, pass FROM employees WHERE employeeNumber = :employeeNumber";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":employeeNumber" => $employeeNumber));
    $currentEmployee = $stmt->fetch();
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

    <h1>Modificar empleado</h1>
    <form method="POST">
        <div>
            <label for="employeeNumber">ID Empleado</label>
            <input id="employeeNumber" name="employeeNumber" type="number" min="0" step="1" value="<?php echo $employeeNumber; ?>">
        </div>
        <div>
            <label for="firstName">Nombre</label>
            <input id="firstName" name="firstName" type="text" value="<?php echo $currentEmployee["firstName"]; ?>">
        </div>
        <div>
            <label for="lastName">Apellidos</label>
            <input id="lastName" name="lastName" type="text" value="<?php echo $currentEmployee["lastName"]; ?>">
        </div>
        <div>
            <label for="extension">Extensión</label>
            <input id="extension" name="extension" type="text" value="<?php echo $currentEmployee["extension"]; ?>">
        </div>
        <div>
            <label for="email">Correo electrónico</label>
            <input id="email" name="email" type="email" value="<?php echo $currentEmployee["email"]; ?>">
        </div>
        <div>
            <label for="officeCode">Oficina</label>
            <select name="officeCode" id="officeCode">
                <?php
                    $offices = getOffices();
                    $output = "";
                    $currentOfficeCode = $currentEmployee["officeCode"];
                    foreach ($offices as $office) {
                        if ($office["officeCode"] == $currentOfficeCode) {
                            $output .= "<option selected value=\"${office["officeCode"]}\">${office["city"]}</option>";
                        } else {
                            $output .= "<option value=\"${office["officeCode"]}\">${office["city"]}</option>";
                        }
                    }
                    echo $output;
                ?>
            </select>
        </div>
        <div>
            <label for="reportsTo">Reporta a</label>
            <select name="reportsTo" id="reportsTo">
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
            <select name="jobTitle" id="jobTitle">
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
            <input id="pass" name="pass" type="password">
        </div>

        <button type="submit">Modificar</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
