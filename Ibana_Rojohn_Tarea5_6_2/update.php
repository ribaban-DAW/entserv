<?php

include "db.php";

$regionId = isset($_REQUEST["regionId"]) ? $_REQUEST["regionId"] : null;
$currentRegion = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regionDescription = isset($_REQUEST["regionDescription"]) ? $_REQUEST["regionDescription"] : null;

    try {
        $conn = getDBConnection();
        $query = "UPDATE region SET regionDescription = :regionDescription WHERE regionId = :regionId";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":regionDescription" => $regionDescription,
            ":regionId" => $regionId,
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
    $query = "SELECT regionDescription FROM region WHERE regionId = :regionId";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":regionId" => $regionId));
    $currentRegion = $stmt->fetch();
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
            <label for="regionId">regionId</label>
            <input name="regionId" id="regionId" type="text" value="<?php echo $regionId;?>" disabled>
        </div>
        <div>
            <label for="regionDescription">regionDescription</label>
            <input name="regionDescription" id="regionDescription" type="text" value="<?php echo $currentRegion["regionDescription"];?>">
        </div>
        <button type="submit">Modificar</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
