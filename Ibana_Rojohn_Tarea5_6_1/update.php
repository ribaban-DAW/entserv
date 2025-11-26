<?php

include "db.php";

$employeeId = isset($_REQUEST["employeeId"]) ? $_REQUEST["employeeId"] : null;
$currentEmployee = null;

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
        $query = "UPDATE employee SET lastname = :lastname, firstname = :firstname, title = :title, titleOfCourtesy = :titleOfCourtesy, birthDate = :birthDate, hireDate = :hireDate, address = :address, city = :city, region = :region, postalCode = :postalCode, country = :country, phone = :phone, extension = :extension, mobile = :mobile, email = :email, photo = :photo, notes = :notes, mgrId = :mgrId, photoPath = :photoPath, jefe = :jefe WHERE employeeId = :employeeId";
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
            ":employeeId" => $employeeId,
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
    $query = "SELECT lastname, firstname, title, titleOfCourtesy, birthDate, hireDate, address, city, region, postalCode, country, phone, extension, mobile, email, photo, notes, mgrId, photoPath, jefe FROM employee WHERE employeeId = :employeeId";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":employeeId" => $employeeId));
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
    <h1>Modificar</h1>
    <form method="POST">
        <div>
            <label for="employeeId">employeeId</label>
            <input name="employeeId" id="employeeId" type="text" value="<?php echo $employeeId;?>" disabled>
        </div>
        <div>
            <label for="lastname">lastname</label>
            <input name="lastname" id="lastname" type="text" value="<?php echo $currentEmployee["lastname"];?>">
        </div>
        <div>
            <label for="firstname">firstname</label>
            <input name="firstname" id="firstname" type="text" value="<?php echo $currentEmployee["firstname"];?>">
        </div>
        <div>
            <label for="title">title</label>
            <input name="title" id="title" type="text" value="<?php echo $currentEmployee["title"];?>">
        </div>
        <div>
            <label for="titleOfCourtesy">titleOfCourtesy</label>
            <input name="titleOfCourtesy" id="titleOfCourtesy" type="text" value="<?php echo $currentEmployee["titleOfCourtesy"];?>">
        </div>
        <div>
            <label for="birthDate">birthDate</label>
            <input name="birthDate" id="birthDate" type="text" value="<?php echo $currentEmployee["birthDate"];?>">
        </div>
        <div>
            <label for="hireDate">hireDate</label>
            <input name="hireDate" id="hireDate" type="text" value="<?php echo $currentEmployee["hireDate"];?>">
        </div>
        <div>
            <label for="address">address</label>
            <input name="address" id="address" type="text" value="<?php echo $currentEmployee["address"];?>">
        </div>
        <div>
            <label for="city">city</label>
            <input name="city" id="city" type="text" value="<?php echo $currentEmployee["city"];?>">
        </div>
        <div>
            <label for="region">region</label>
            <input name="region" id="region" type="text" value="<?php echo $currentEmployee["region"];?>">
        </div>
        <div>
            <label for="postalCode">postalCode</label>
            <input name="postalCode" id="postalCode" type="text" value="<?php echo $currentEmployee["postalCode"];?>">
        </div>
        <div>
            <label for="country">country</label>
            <input name="country" id="country" type="text" value="<?php echo $currentEmployee["country"];?>">
        </div>
        <div>
            <label for="phone">phone</label>
            <input name="phone" id="phone" type="text" value="<?php echo $currentEmployee["phone"];?>">
        </div>
        <div>
            <label for="extension">extension</label>
            <input name="extension" id="extension" type="text" value="<?php echo $currentEmployee["extension"];?>">
        </div>
        <div>
            <label for="mobile">mobile</label>
            <input name="mobile" id="mobile" type="text" value="<?php echo $currentEmployee["mobile"];?>">
        </div>
        <div>
            <label for="email">email</label>
            <input name="email" id="email" type="text" value="<?php echo $currentEmployee["email"];?>">
        </div>
        <div>
            <label for="photo">photo</label>
            <input name="photo" id="photo" type="text" value="<?php echo $currentEmployee["photo"];?>">
        </div>
        <div>
            <label for="notes">notes</label>
            <input name="notes" id="notes" type="text" value="<?php echo $currentEmployee["notes"];?>">
        </div>
        <div>
            <label for="mgrId">mgrId</label>
            <input name="mgrId" id="mgrId" type="text" value="<?php echo $currentEmployee["mgrId"];?>">
        </div>
        <div>
            <label for="photoPath">photoPath</label>
            <input name="photoPath" id="photoPath" type="text" value="<?php echo $currentEmployee["photoPath"];?>">
        </div>
        <div>
            <label for="jefe">jefe</label>
            <input name="jefe" id="jefe" type="text" value="<?php echo $currentEmployee["jefe"];?>">
        </div>
        <button type="submit">Modificar</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
