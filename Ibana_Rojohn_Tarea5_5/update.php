<?php

include "db.php";

$customerNumber = isset($_REQUEST["customerNumber"]) ? $_REQUEST["customerNumber"] : null;
$currentCustomer = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = isset($_REQUEST["customerName"]) ? $_REQUEST["customerName"] : null;
    $contactLastName = isset($_REQUEST["contactLastName"]) ? $_REQUEST["contactLastName"] : null;
    $contactFirstName = isset($_REQUEST["contactFirstName"]) ? $_REQUEST["contactFirstName"] : null;
    $phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
    $addressLine1 = isset($_REQUEST["addressLine1"]) ? $_REQUEST["addressLine1"] : null;
    $addressLine2 = isset($_REQUEST["addressLine2"]) ? $_REQUEST["addressLine2"] : null;
    $city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
    $state = isset($_REQUEST["state"]) ? $_REQUEST["state"] : null;
    $postalCode = isset($_REQUEST["postalCode"]) ? $_REQUEST["postalCode"] : null;
    $country = isset($_REQUEST["country"]) ? $_REQUEST["country"] : null;
    $salesRepEmployeeNumber = isset($_REQUEST["salesRepEmployeeNumber"]) ? $_REQUEST["salesRepEmployeeNumber"] : null;
    $creditLimit = isset($_REQUEST["creditLimit"]) ? $_REQUEST["creditLimit"] : null;

    try {
        $conn = getDBConnection();
        $query = "UPDATE customers SET customerName = :customerName, contactLastName = :contactLastName, contactFirstName = :contactFirstName, phone = :phone, addressLine1 = :addressLine1, addressLine2 = :addressLine2, city = :city, state = :state, postalCode = :postalCode, country = :country, salesRepEmployeeNumber = :salesRepEmployeeNumber, creditLimit = :creditLimit WHERE customerNumber = :customerNumber";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":customerName" => $customerName,
            ":contactLastName" => $contactLastName,
            ":contactFirstName" => $contactFirstName,
            ":phone" => $phone,
            ":addressLine1" => $addressLine1,
            ":addressLine2" => $addressLine2,
            ":city" => $city,
            ":state" => $state,
            ":postalCode" => $postalCode,
            ":country" => $country,
            ":salesRepEmployeeNumber" => $salesRepEmployeeNumber,
            ":creditLimit" => $creditLimit,
            ":customerNumber" => $customerNumber,
        ));

        header("location: read.php");
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido modificar el usuario</p>";
        echo "<a href=\"read.php\">Volver al panel de control</a>";
        die();
    }
} else {
    $conn = getDBConnection();
    $query = "SELECT customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit FROM customers WHERE customerNumber = :customerNumber";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":customerNumber" => $customerNumber));
    $currentCustomer = $stmt->fetch();
}

function getEmployees() {
    try {
        $conn = getDBConnection();
        $query = "SELECT employeeNumber, lastName FROM employees";
        $stmt = $conn->query($query);
        $stmt->execute();
        $employees = $stmt->fetchall(PDO::FETCH_ASSOC);

        return $employees;
    } catch (PDOException $e) {
        echo "<p>No se ha podido obtener los empleados</p>";
        echo "<a href=\"read.php\">Volver</a>";
        die();
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
    <h1>Modificar</h1>
    <form method="POST">
        <div>
            <label for="customerNumber">customerNumber</label>
            <input id="customerNumber" name="customerNumber" type="text" value="<?php echo $customerNumber; ?>" disabled>
        </div>
        <div>
            <label for="customerName">customerName</label>
            <input id="customerName" name="customerName" type="text" value="<?php echo $currentCustomer["customerName"]?>">
        </div>
        <div>
            <label for="contactLastName">contactLastName</label>
            <input id="contactLastName" name="contactLastName" type="text" value="<?php echo $currentCustomer["contactLastName"]?>">
        </div>
        <div>
            <label for="contactFirstName">contactFirstName</label>
            <input id="contactFirstName" name="contactFirstName" type="text" value="<?php echo $currentCustomer["contactFirstName"]?>">
        </div>
        <div>
            <label for="phone">phone</label>
            <input id="phone" name="phone" type="text" value="<?php echo $currentCustomer["phone"]?>">
        </div>
        <div>
            <label for="addressLine1">addressLine1</label>
            <input id="addressLine1" name="addressLine1" type="text" value="<?php echo $currentCustomer["addressLine1"]?>">
        </div>
        <div>
            <label for="addressLine2">addressLine2</label>
            <input id="addressLine2" name="addressLine2" type="text" value="<?php echo $currentCustomer["addressLine2"]?>">
        </div>
        <div>
            <label for="city">City</label>
            <input id="city" name="city" type="text" value="<?php echo $currentCustomer["city"]?>">
        </div>
        <div>
            <label for="state">State</label>
            <input id="state" name="state" type="text" value="<?php echo $currentCustomer["state"]?>">
        </div>
        <div>
            <label for="postalCode">Postal Code</label>
            <input id="postalCode" name="postalCode" type="text" value="<?php echo $currentCustomer["postalCode"]?>">
        </div>
        <div>
            <label for="country">Country</label>
            <input id="country" name="country" type="text" value="<?php echo $currentCustomer["country"]?>">
        </div>
        <div>
            <label for="salesRepEmployeeNumber">salesRepEmployeeNumber</label>
            <select name="salesRepEmployeeNumber" id="salesRepEmployeeNumber">
                <?php
                    $employees = getEmployees();
                    foreach ($employees as $employee) {
                        if ($currentCustomer["salesRepEmployeeNumber"] == $employee["employeeNumber"]) {
                            echo "<option value=\"${employee["employeeNumber"]}\" selected>${employee["lastName"]}</option>";
                        } else {
                            echo "<option value=\"${employee["employeeNumber"]}\">${employee["lastName"]}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="creditLimit">creditLimit</label>
            <input id="creditLimit" name="creditLimit" type="text" value="<?php echo $currentCustomer["creditLimit"]?>">
        </div>

        <button type="submit">Modificar</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
