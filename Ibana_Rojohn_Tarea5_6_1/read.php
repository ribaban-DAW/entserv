<?php

require_once "db.php";

// NOTA: La columna jefe se añadió en un ejercicio que se hizo en clase para practicar los JOIN, lo incluyo por si acaso,
// pero no hago JOIN porque no lo pide el ejercicio.

try {
    $conn = getDBConnection();

    $select = "SELECT employeeId, lastname, firstname, title, titleOfCourtesy, birthDate, hireDate, address, city, region, postalCode, country, phone, extension, mobile, email, photo, notes, mgrId, photoPath, jefe ";

    $from = "FROM employee";

    $query = $select . $from;
    $stmt = $conn->query($query);

    $output = "<table border=1>";
    $output .= "<thead>";
    $output .= "<tr>";
        $output .= "<th>employeeId</th>";
        $output .= "<th>lastname</th>";
        $output .= "<th>firstname</th>";
        $output .= "<th>title</th>";
        $output .= "<th>titleOfCourtesy</th>";
        $output .= "<th>birthDate</th>";
        $output .= "<th>hireDate</th>";
        $output .= "<th>address</th>";
        $output .= "<th>city</th>";
        $output .= "<th>region</th>";
        $output .= "<th>postalCode</th>";
        $output .= "<th>country</th>";
        $output .= "<th>phone</th>";
        $output .= "<th>extension</th>";
        $output .= "<th>mobile</th>";
        $output .= "<th>email</th>";
        $output .= "<th>photo</th>";
        $output .= "<th>notes</th>";
        $output .= "<th>mgrId</th>";
        $output .= "<th>photoPath</th>";
        $output .= "<th>jefe</th>";
        $output .= "<th>actions</th>";
    $output .= "</tr>";
    $output .= "</thead>";
    $output .= "<tbody>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= "<tr>";
            $output .= "<td>${row["employeeId"]}</td>";
            $output .= "<td>${row["lastname"]}</td>";
            $output .= "<td>${row["firstname"]}</td>";
            $output .= "<td>${row["title"]}</td>";
            $output .= "<td>${row["titleOfCourtesy"]}</td>";
            $output .= "<td>${row["birthDate"]}</td>";
            $output .= "<td>${row["hireDate"]}</td>";
            $output .= "<td>${row["address"]}</td>";
            $output .= "<td>${row["city"]}</td>";
            $output .= "<td>${row["region"]}</td>";
            $output .= "<td>${row["postalCode"]}</td>";
            $output .= "<td>${row["country"]}</td>";
            $output .= "<td>${row["phone"]}</td>";
            $output .= "<td>${row["extension"]}</td>";
            $output .= "<td>${row["mobile"]}</td>";
            $output .= "<td>${row["email"]}</td>";
            $output .= "<td>${row["photo"]}</td>";
            $output .= "<td>${row["notes"]}</td>";
            $output .= "<td>${row["mgrId"]}</td>";
            $output .= "<td>${row["photoPath"]}</td>";
            $output .= "<td>${row["jefe"]}</td>";
            $output .= "<td colspan=2>";
                $output .= "<div>";
                $output .= "<a href=\"update.php?employeeId=${row["employeeId"]}\">Modify</a> ";
                $output .= "<a href=\"delete.php?employeeId=${row["employeeId"]}\">Delete</a>";
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
