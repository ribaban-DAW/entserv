<?php

require_once "db.php";

try {
    $conn = getDBConnection();
    $select = "SELECT can.id, can.Nombre, cat.Nombre AS NombreCategoria, can.FechaRecogida, can.FechaAdopcion, ado.nif AS NIFAdoptante, ado.Nombre AS NombreAdoptante ";
    $from = "FROM cangrejos AS can INNER JOIN categorias AS cat ON can.Categoria = cat.id INNER JOIN adoptantes AS ado ON can.IdAcogedor = ado.id";
    $query = $select . $from;
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $output = "<table border=1>";
    $output .= "<thead>";
    $output .= "<tr>";
        $output .= "<th>id</th>";
        $output .= "<th>Nombre</th>";
        $output .= "<th>Nombre Categoría</th>";
        $output .= "<th>FechaRecogida</th>";
        $output .= "<th>FechaAdopcion</th>";
        $output .= "<th>NIF Adoptante + Nombre Adoptante</th>";
        $output .= "<th>Acciones</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= "<tr>";
            $output .= "<td>${row["id"]}</td>";
            $output .= "<td>${row["Nombre"]}</td>";
            $output .= "<td>${row["NombreCategoria"]}</td>";
            $output .= "<td>${row["FechaRecogida"]}</td>";
            $output .= "<td>${row["FechaAdopcion"]}</td>";
            $output .= "<td>";
                $output .= "${row["NIFAdoptante"]} + ";
                $output .= "${row["NombreAdoptante"]}";
            $output .= "</td>";
            $output .= "<td colspan=2>";
                $output .= "<a href=\"updateCangrejosCompleto.php?id=${row["id"]}\">Modify</a> ";
                $output .= "<a href=\"deleteCangrejosCompleto.php?id=${row["id"]}\">Delete</a>";
            $output .= "</td>";
            $output .= "</tr>";
    }
    $output .= "</tbody>";
    $output .= "</table>";

    $output .= "<a href=\"createCangrejosCompleto.php\">Crear</a>";

    echo $output;
}
catch (PDOException $e) {
    echo "<p>No se han podido leer las categorías. Motivo: " . $e->getMessage() . "</p>";
}

?>
