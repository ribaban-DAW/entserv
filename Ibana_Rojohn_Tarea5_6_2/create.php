<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regionId = isset($_REQUEST["regionId"]) ? $_REQUEST["regionId"] : null;
    $regionDescription = isset($_REQUEST["regionDescription"]) ? $_REQUEST["regionDescription"] : null;

    try {
        $conn = getDBConnection();
        $query = "INSERT INTO region(regionId, regionDescription) VALUES (:regionId, :regionDescription)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":regionId" => $regionId,
            ":regionDescription" => $regionDescription,
        ));

        echo "<p>Se ha creadola región correctamente</p>";
        echo "<a href=\"read.php\">Volver</a>";
        die();
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido crearla región." . $e->getMessage() . "</p>";
        echo "<a href=\"read.php\">Volver</a>";
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, :initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear región</h1>
    <form method="POST">
        <div>
            <label for="regionId">regionId</label>
            <input name="regionId" id="regionId" type="text" required>
        </div>
        <div>
            <label for="regionDescription">regionDescription</label>
            <input name="regionDescription" id="regionDescription" type="text" required>
        </div>
        <button type="submit">Crear</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
