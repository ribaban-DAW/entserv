<?php

include "header.php";
include "db.php";
include "utils.php";

function getMenu() {
    $employeeNumber = isset($_SESSION["employeeNumber"]) ? $_SESSION["employeeNumber"] : null;
    $menu = "<section>";
    $menu .= "<h1>Menú</h1>";
    $menu .= "<ol>";
    $menu .= "<li>Gestión de Clientes</li>";
    $menu .= "<li><a href=\"readProductos.php\">Gestión de Productos</a></li>";
    $menu .= "<li>Gestión de Ventas</li>";
    if (hasUserPrivileges($employeeNumber)) {
        $menu .= "<li><a href=\"read.php\">Gestión de Empleados</a></li>";
        $menu .= "<li>Gestión de Categorías</li>";
        $menu .= "<li>Gestión de Oficinas</li>";
    }
    $menu .= "</ol>";
    $menu .= "</section>";

    echo $menu;
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
    <?php
        getHeader();
        getMenu();
    ?>
</body>
</html>
