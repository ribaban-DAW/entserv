<?php

include "db.php";

$supplierId = isset($_REQUEST["supplierId"]) ? $_REQUEST["supplierId"] : null;
$currentSupplier = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = isset($_REQUEST["companyName"]) ? $_REQUEST["companyName"] : null;
    $contactName = isset($_REQUEST["contactName"]) ? $_REQUEST["contactName"] : null;
    $contactTitle = isset($_REQUEST["contactTitle"]) ? $_REQUEST["contactTitle"] : null;
    $address = isset($_REQUEST["address"]) ? $_REQUEST["address"] : null;
    $city = isset($_REQUEST["city"]) ? $_REQUEST["city"] : null;
    $region = isset($_REQUEST["region"]) ? $_REQUEST["region"] : null;
    $postalCode = isset($_REQUEST["postalCode"]) ? $_REQUEST["postalCode"] : null;
    $country = isset($_REQUEST["country"]) ? $_REQUEST["country"] : null;
    $phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : null;
    $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
    $fax = isset($_REQUEST["fax"]) ? $_REQUEST["fax"] : null;
    $homePage = isset($_REQUEST["homePage"]) ? $_REQUEST["homePage"] : null;

    try {
        $conn = getDBConnection();
        $query = "UPDATE supplier SET companyName = :companyName, contactName = :contactName, contactTitle = :contactTitle, address = :address, city = :city, region = :region, postalCode = :postalCode, country = :country, phone = :phone, email = :email, fax = :fax, HomePage = :homePage WHERE supplierId = :supplierId";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":companyName" => $companyName,
            ":contactName" => $contactName,
            ":contactTitle" => $contactTitle,
            ":address" => $address,
            ":city" => $city,
            ":region" => $region,
            ":postalCode" => $postalCode,
            ":country" => $country,
            ":phone" => $phone,
            ":email" => $email,
            ":fax" => $fax,
            ":homePage" => $homePage,
            ":supplierId" => $supplierId,
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
    $query = "SELECT companyName, contactName, contactTitle, address, city, region, postalCode, country, phone, email, fax, homePage FROM supplier WHERE supplierId = :supplierId";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":supplierId" => $supplierId));
    $currentSupplier = $stmt->fetch();
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
            <label for="supplierId">Supplier ID</label>
            <input id="supplierId" name="supplierId" type="text" value="<?php echo $supplierId; ?>" disabled>
        </div>
        <div>
            <label for="companyName">Company Name</label>
            <input id="companyName" name="companyName" type="text" value="<?php echo $currentSupplier["companyName"]?>" required>
        </div>
        <div>
            <label for="contactName">Contact Name</label>
            <input id="contactName" name="contactName" type="text" value="<?php echo $currentSupplier["contactName"]?>" required>
        </div>
        <div>
            <label for="contactTitle">Contact Title</label>
            <input id="contactTitle" name="contactTitle" type="text" value="<?php echo $currentSupplier["contactTitle"]?>" required>
        </div>
        <div>
            <label for="address">Address</label>
            <input id="address" name="address" type="text" value="<?php echo $currentSupplier["address"]?>" required>
        </div>
        <div>
            <label for="city">City</label>
            <input id="city" name="city" type="text" value="<?php echo $currentSupplier["city"]?>" required>
        </div>
        <div>
            <label for="region">Region</label>
            <input id="region" name="region" type="text" value="<?php echo $currentSupplier["region"]?>" required>
        </div>
        <div>
            <label for="postalCode">Postal Code</label>
            <input id="postalCode" name="postalCode" type="text" value="<?php echo $currentSupplier["postalCode"]?>" required>
        </div>
        <div>
            <label for="country">Country</label>
            <input id="country" name="country" type="text" value="<?php echo $currentSupplier["country"]?>" required>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input id="phone" name="phone" type="text" value="<?php echo $currentSupplier["phone"]?>" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="<?php echo $currentSupplier["email"]?>" required>
        </div>
        <div>
            <label for="fax">Fax</label>
            <input id="fax" name="fax" type="text" value="<?php echo $currentSupplier["fax"]?>" required>
        </div>
        <div>
            <label for="homePage">Home Page</label>
            <input id="homePage" name="homePage" type="text" value="<?php echo $currentSupplier["homePage"]?>" required>
        </div>

        <button type="submit">Modificar</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
