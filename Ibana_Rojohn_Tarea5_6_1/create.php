<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = isset($_REQUEST["lastname"]) ? $_REQUEST["lastname"] : null;
    $firstname = isset($_REQUEST["firstname"]) ? $_REQUEST["firstname"] : null;
    $title = isset($_REQUEST["title"]) ? $_REQUEST["title"] : null;
    $titleOfCourtesy = isset($_REQUEST["titleOfCourtesy"]) ? $_REQUEST["titleOfCourtesy"] : null;
    $birthDate = isset($_REQUEST["birthDate"]) ? $_REQUEST["birthDate"] : null;
    $hireDate = isset($_REQUEST["hireDate"]) ? $_REQUEST["hireDate"] : null;
    $address = isset($_REQUEST["address"]) ? $_REQUEST["address"] : null;
    $city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
    $region = isset($_REQUEST["region"]) ? $_REQUEST["region"] : null;
    $postalCode = isset($_REQUEST["postalCode"]) ? $_REQUEST["postalCode"] : null;
    $country = isset($_REQUEST["country"]) ? $_REQUEST["country"] : null;
    $phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
    $extension = isset($_REQUEST["extension"]) ? $_REQUEST["extension"] : null;
    $mobile = isset($_REQUEST["mobile"]) ? $_REQUEST["mobile"] : null;
    $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
    $photo = isset($_REQUEST["photo"]) ? $_REQUEST["photo"] : null;
    $notes = isset($_REQUEST["notes"]) ? $_REQUEST["notes"] : null;
    $mgrId = isset($_REQUEST["mgrId"]) ? $_REQUEST["mgrId"] : null;
    $photoPath = isset($_REQUEST["photoPath"]) ? $_REQUEST["photoPath"] : null;
    $jefe = isset($_REQUEST["jefe"]) ? $_REQUEST["jefe"] : null;

    try {
        $conn = getDBConnection();
        $query = "INSERT INTO employee(lastname, firstname, title, titleOfCourtesy, birthDate, hireDate, address, city, region, postalCode, country, phone, extension, mobile, email, photo, notes, mgrId, photoPath, jefe) VALUES (:lastname, :firstname, :title, :titleOfCourtesy, :birthDate, :hireDate, :address, :city, :region, :postalCode, :country, :phone, :extension, :mobile, :email, :photo, :notes, :mgrId, :photoPath, :jefe)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":lastname" => $lastname,
            ":firstname" => $firstname,
            ":title" => $title,
            ":titleOfCourtesy" => $titleOfCourtesy,
            ":birthDate" => $birthDate,
            ":hireDate" => $hireDate,
            ":address" => $address,
            ":city" => $city,
            ":region" => $region,
            ":postalCode" => $postalCode,
            ":country" => $country,
            ":phone" => $phone,
            ":extension" => $extension,
            ":mobile" => $mobile,
            ":email" => $email,
            ":photo" => $photo,
            ":notes" => $notes,
            ":mgrId" => $mgrId,
            ":photoPath" => $photoPath,
            ":jefe" => $jefe,
        ));

        echo "<p>Se ha creado el usuario correctamente</p>";
        echo "<a href=\"read.php\">Volver</a>";
        die();
    }
    catch (PDOException $e) {
        echo "<p>No se ha podido crear el usuario." . $e->getMessage() . "</p>";
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
    <h1>Crear empleado</h1>
    <form method="POST">
        <div>
            <label for="lastname">lastname</label>
            <input name="lastname" id="lastname" type="text" required>
        </div>
        <div>
            <label for="firstname">firstname</label>
            <input name="firstname" id="firstname" type="text" required>
        </div>
        <div>
            <label for="title">title</label>
            <input name="title" id="title" type="text" required>
        </div>
        <div>
            <label for="titleOfCourtesy">titleOfCourtesy</label>
            <input name="titleOfCourtesy" id="titleOfCourtesy" type="text" required>
        </div>
        <div>
            <label for="birthDate">birthDate</label>
            <input name="birthDate" id="birthDate" type="text" required>
        </div>
        <div>
            <label for="hireDate">hireDate</label>
            <input name="hireDate" id="hireDate" type="text" required>
        </div>
        <div>
            <label for="address">address</label>
            <input name="address" id="address" type="text" required>
        </div>
        <div>
            <label for="city">city</label>
            <input name="city" id="city" type="text" required>
        </div>
        <div>
            <label for="region">region</label>
            <input name="region" id="region" type="text" required>
        </div>
        <div>
            <label for="postalCode">postalCode</label>
            <input name="postalCode" id="postalCode" type="text" required>
        </div>
        <div>
            <label for="country">country</label>
            <input name="country" id="country" type="text" required>
        </div>
        <div>
            <label for="phone">phone</label>
            <input name="phone" id="phone" type="text" required>
        </div>
        <div>
            <label for="extension">extension</label>
            <input name="extension" id="extension" type="text" required>
        </div>
        <div>
            <label for="mobile">mobile</label>
            <input name="mobile" id="mobile" type="text" required>
        </div>
        <div>
            <label for="email">email</label>
            <input name="email" id="email" type="text" required>
        </div>
        <div>
            <label for="photo">photo</label>
            <input name="photo" id="photo" type="text" required>
        </div>
        <div>
            <label for="notes">notes</label>
            <input name="notes" id="notes" type="text" required>
        </div>
        <div>
            <label for="mgrId">mgrId</label>
            <input name="mgrId" id="mgrId" type="text" required>
        </div>
        <div>
            <label for="photoPath">photoPath</label>
            <input name="photoPath" id="photoPath" type="text" required>
        </div>
        <div>
            <label for="jefe">jefe</label>
            <input name="jefe" id="jefe" type="text" required>
        </div>
        <button type="submit">Crear</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
