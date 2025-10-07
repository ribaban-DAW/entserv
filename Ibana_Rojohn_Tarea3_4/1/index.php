<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 3.4.1</title>
</head>
<body>

<?php

// Crea una aplicación en la que se muestre en tablas un listado de todos
// los Empleados de la empresa, a qué departamento pertenecen y en qué
// ciudad están.

echo "<h1>Tarea 3.4.1</h1>";

require_once '../pdoconfig.php';
require_once '../db.php';

try {
	$conn = getDBConnection("empresa");
	
	$query = "SELECT e.*, d.Ciudad FROM empleados AS e JOIN departamentos AS d ON e.Departamento = d.CodDept;";
	$stmt = executeQuery($conn, $query);
	
	// TODO(srvariable): Seguramente haya una mejor manera de hacer esto para evitar tener que escribir lo mismo
	// tantas veces
	$array_title = ["Nombre", "Apellido1", "Apellido2", "Departamento", "Ciudad"];
	$array_cells = [];
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		array_push($array_cells, [$row["Nombre"], $row["Apellido1"], $row["Apellido2"], $row["Departamento"], $row["Ciudad"]]);
	}

	require_once '../utils.php';
	$output = formatArrayAsTable($array_title, $array_cells);
	echo $output;

} catch (PDOException $e) {
	die($e->getMessage());
}



?>

</body>
</html>
