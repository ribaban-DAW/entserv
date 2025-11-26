<?php

require_once "db.php";

try {
    $conn = getDBConnection();

    $select = "SELECT regionId, regionDescription ";

    $from = "FROM region";

    $query = $select . $from;
    $stmt = $conn->query($query);

    $output = "<table border=1>";
    $output .= "<thead>";
    $output .= "<tr>";
        $output .= "<th>regionId</th>";
        $output .= "<th>regionDescription</th>";
        $output .= "<th>actions</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= "<tr>";
            $output .= "<td>${row["regionId"]}</td>";
            $output .= "<td>${row["regionDescription"]}</td>";
            $output .= "<td colspan=2>";
                $output .= "<div>";
                $output .= "<a href=\"update.php?regionId=${row["regionId"]}\">Modify</a> ";
                $output .= "<a href=\"delete.php?regionId=${row["regionId"]}\">Delete</a>";
                $output .= "</div>";
            $output .= "</td>";
        $output .= "</tr>";
    }
    $output .= "</tbody>";
    $output .= "</table>";
    $output .= "<a href=\"create.php\">Create</a>";

    echo $output;
} catch (PDOException $pe) {
    die($pe->getMessage());
}

?>
