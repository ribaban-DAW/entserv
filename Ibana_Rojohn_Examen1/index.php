<?php

include "db.php";
include "header.php";

function checkLogin(int $employeeNumber, string $pass): bool {
    try {
        $conn = getDbConnection();
        $query = "SELECT employeeNumber, firstName FROM employees WHERE employeeNumber=:employeeNumber AND pass=:pass";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(":employeeNumber" => $employeeNumber, ":pass" => $pass));
        $results = $stmt->fetchall();
        if (count($results) == 1) {
            $employee = $results[0];
            session_start();
            $_SESSION["user"] = $employee["firstName"];
            $_SESSION["employeeNumber"] = $employeeNumber;
            header("location: menu.php");
            return true;
        }
    
    } catch (PDOException $e) {
    }

    return false;
}

$employeeNumber = isset($_REQUEST["employeeNumber"]) ? $_REQUEST["employeeNumber"] : null;
$pass = isset($_REQUEST["pass"]) ? $_REQUEST["pass"] : null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!checkLogin($employeeNumber, $pass)) {
        echo "<p>Credenciales incorrectas.</p>";
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
    <h1>Login</h1>
    <form method="POST">
        <div>
            <label for="employeeNumber">Usuario</label>
            <input id="employeeNumber" name="employeeNumber" required/>
        </div>
        <div>
            <label for="pass">Contraseña</label>
            <input id="pass" name="pass" type="password" required/>
        </div>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
