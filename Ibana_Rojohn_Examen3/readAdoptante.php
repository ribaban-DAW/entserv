<?php

require_once "db.php";

try {
    $conn = getDBConnection();
    $select = "SELECT id, nif, nombre, apellidos, alta, baja ";
    $from = "FROM adoptantes ";
    $query = $select . $from;
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $output = "<table border=1>";
    $output .= "<thead>";
    $output .= "<tr>";
        $output .= "<th>ID</th>";
        $output .= "<th>NIF</th>";
        $output .= "<th>Nombre</th>";
        $output .= "<th>Apellidos</th>";
        $output .= "<th>Alta</th>";
        $output .= "<th>Baja</th>";
        $output .= "<th>Acciones</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= "<tr>";
            $output .= "<td>${row["id"]}</td>";
            $output .= "<td>${row["nif"]}</td>";
            $output .= "<td>${row["nombre"]}</td>";
            $output .= "<td>${row["apellidos"]}</td>";
            $output .= "<td>${row["alta"]}</td>";
            $output .= "<td>${row["baja"]}</td>";
            $output .= "<td colspan=2>";
                $output .= "<div>";
                    $output .= "<a href=\"updateAdoptante.php?id=${row["id"]}\">Modify</a> ";
                    $output .= "<a href=\"deleteAdoptante.php?id=${row["id"]}\">Delete</a>";
                $output .= "</div>";
            $output .= "</td>";
        $output .= "</tr>";

    }
    $output .= "</tbody>";
    $output .= "</table>";

    $output .= "<a href=\"createAdoptante.php\">Crear</a>";

    echo $output;
}
catch (PDOException $e) {
    echo "<p>No se han podido leer los adoptantes. Motivo: " . $e->getMessage() . "</p>";
}

?>
