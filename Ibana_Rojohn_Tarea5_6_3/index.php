<?php

include "db.php";
include "header.php";

function checkLogin($user, $pass): bool {
    try {
        $conn = getDbConnection();
        $query = "SELECT lastname, employeeId FROM employee WHERE lastname = :lastname AND employeeId = :employeeId";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(":lastname" => $user, ":employeeId" => $pass));
        $results = $stmt->fetchall();
        if (count($results) == 1) {
            $employee = $results[0];
            session_start();
            $_SESSION["user"] = $employee["lastname"];
            header("location: read.php");
            return true;
        }
    
    } catch (PDOException $e) {
    }

    return false;
}

$user = isset($_REQUEST["user"]) ? $_REQUEST["user"] : null;
$pass = isset($_REQUEST["pass"]) ? $_REQUEST["pass"] : null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!checkLogin($user, $pass)) {
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
            <label for="user">Usuario</label>
            <input id="user" name="user" required/>
        </div>
        <div>
            <label for="pass">Contraseña</label>
            <input id="pass" name="pass" type="password" required/>
        </div>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
