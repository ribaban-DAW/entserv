<?php

include "db.php";
include "header.php";

$productId = isset($_REQUEST["productId"]) ? $_REQUEST["productId"] : null;
$currentProduct = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Viene del mismo archivo
    $productName = isset($_REQUEST["productName"]) ? $_REQUEST["productName"] : null;
    $supplierId = isset($_REQUEST["supplierId"]) ? $_REQUEST["supplierId"] : null;
    $categoryId = isset($_REQUEST["categoryId"]) ? $_REQUEST["categoryId"] : null;
    $quantityPerUnit = isset($_REQUEST["quantityPerUnit"]) && $_REQUEST["quantityPerUnit"] ? $_REQUEST["quantityPerUnit"] : null;
    $unitPrice = isset($_REQUEST["unitPrice"]) && $_REQUEST["unitPrice"] ? $_REQUEST["unitPrice"] : null;
    $unitsInStock = isset($_REQUEST["unitsInStock"]) && $_REQUEST["unitsInStock"] ? $_REQUEST["unitsInStock"] : null;
    $unitsOnOrder = isset($_REQUEST["unitsOnOrder"]) && $_REQUEST["unitsOnOrder"] ? $_REQUEST["unitsOnOrder"] : null;
    $reorderLevel = isset($_REQUEST["reorderLevel"]) && $_REQUEST["reorderLevel"] ? $_REQUEST["reorderLevel"] : null;
    $discontinued = isset($_REQUEST["discontinued"]) ? $_REQUEST["discontinued"] : null;

    try {
        $conn = getDBConnection();
        $query = "UPDATE product SET productName = :productName, supplierId = :supplierId, categoryId = :categoryId, quantityPerUnit = :quantityPerUnit, unitPrice = :unitPrice, unitsInStock = :unitsInStock, unitsOnOrder = :unitsOnOrder, reorderLevel = :reorderLevel, discontinued = :discontinued WHERE productId = :productId";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(
            ":productName" => $productName,
            ":supplierId" => $supplierId,
            ":categoryId" => $categoryId,
            ":quantityPerUnit" => $quantityPerUnit,
            ":unitPrice" => $unitPrice,
            ":unitsInStock" => $unitsInStock,
            ":unitsOnOrder" => $unitsOnOrder,
            ":reorderLevel" => $reorderLevel,
            ":discontinued" => $discontinued,
            ":productId" => $productId,
        ));

        header("location: read.php");
    } catch (PDOException $e) {
        echo "<p>No se ha podido modificar el usuario." . $e->getMessage() . "</p>";
        echo "<a href=\"read.php\">Volver al panel de control</a>";
        die();
    }
} else {
    $conn = getDBConnection();
    $query = "SELECT productName, supplierId, categoryId, quantityPerUnit, unitPrice, unitsInStock, unitsOnOrder, reorderLevel, discontinued FROM product WHERE productId = :productId";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(":productId" => $productId));
    $currentProduct = $stmt->fetch();
}

function getSuppliers() {
    try {
        $conn = getDBConnection();
        $query = "SELECT supplierId, companyName FROM supplier";
        $stmt = $conn->query($query);
        $stmt->execute();
        $suppliers = $stmt->fetchall(PDO::FETCH_ASSOC);

        return $suppliers;
    } catch (PDOException $e) {
        echo "<p>No se ha podido obtener los proveedores</p>";
        die();
    }
}

function getCategories() {
    try {
        $conn = getDBConnection();
        $query = "SELECT categoryId, categoryName FROM category";
        $stmt = $conn->query($query);
        $stmt->execute();
        $categories = $stmt->fetchall(PDO::FETCH_ASSOC);

        return $categories;
    } catch (PDOException $e) {
        echo "<p>No se ha podido obtener las categorías</p>";
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
    <?php getHeader(); ?>

    <h1>Modificar producto</h1>
    <form method="POST">
        <div>
            <label for="productName">productName</label>
            <input name="productName" id="productName" type="text" value=<?php echo $currentProduct["productName"]; ?>>
        </div>
        <div>
            <label for="supplierId">companyName</label>
            <select name="supplierId" id="supplierId" required>
                <?php
                    $suppliers = getSuppliers();
                    foreach ($suppliers as $supplier) {
                        if ($supplier["supplierId"] == $currentProduct["supplierId"]) {
                            echo "<option value=\"${supplier["supplierId"]}\" selected>${supplier["companyName"]}</option>";
                        } else {
                            echo "<option value=\"${supplier["supplierId"]}\">${supplier["companyName"]}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="categoryId">categoryName</label>
            <select name="categoryId" id="categoryId" required>
                <?php
                    $categories = getCategories();
                    foreach ($categories as $category) {
                        if ($category["categoryId"] == $currentProduct["categoryId"]) {
                            echo "<option value=\"${category["categoryId"]}\" selected>${category["categoryName"]}</option>";
                        } else {
                            echo "<option value=\"${category["categoryId"]}\">${category["categoryName"]}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="quantityPerUnit">quantityPerUnit</label>
            <input name="quantityPerUnit" id="quantityPerUnit" type="number" min="0" value=<?php echo $currentProduct["quantityPerUnit"]; ?>>
        </div>
        <div>
            <label for="unitPrice">unitPrice</label>
            <input name="unitPrice" id="unitPrice" type="number" min="0" step="0.01" value=<?php echo $currentProduct["unitPrice"]; ?>>
        </div>
        <div>
            <label for="unitsInStock">unitsInStock</label>
            <input name="unitsInStock" id="unitsInStock" type="number" min="0" value=<?php echo $currentProduct["unitsInStock"]; ?>>
        </div>
        <div>
            <label for="unitsOnOrder">unitsOnOrder</label>
            <input name="unitsOnOrder" id="unitsOnOrder" type="number" min="0" value=<?php echo $currentProduct["unitsOnOrder"]; ?>>
        </div>
        <div>
            <label for="reorderLevel">reorderLevel</label>
            <input name="reorderLevel" id="reorderLevel" type="number" min="0" value=<?php echo $currentProduct["reorderLevel"]; ?>>
        </div>
        <div>
            <label for="discontinued">discontinued</label>
            <input name="discontinued" id="discontinued" type="number" min="0" max="1" value=<?php echo $currentProduct["discontinued"]; ?>>
        </div>
        <button type="submit">Modificar</button>
    </form>

    <a href="read.php">Volver al panel de control</a>
</body>
</html>
