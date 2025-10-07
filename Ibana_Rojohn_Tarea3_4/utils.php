<?php

function formatArrayAsTable(array $array_title, array $array_cells): string {
    $output = "<table>";

    $output .= "<thead>";
    $output .= "<tr>";
    foreach ($array_title as $title) {
        $output .= "<th>" . $title . "</th>";
    }
    $output .= "</tr>";
    $output .= "</thead>";

    foreach ($array_cells as $cells) {
        $output .= "<tr>";
        foreach ($cells as $cell) {
            $output .= "<td>" . $cell . "</td>";
        }
        $output .= "</tr>";
    }

    $output .= "</table>";

    return $output;
}

?>
