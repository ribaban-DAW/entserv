<?php

function getHeader() {
    session_start();
    if (!isset($_SESSION["user"])) {
        return;
    }

    $header = "<header>";
    $header .= "<p>Hola " . $_SESSION["user"] . "</p>";
    $header .= "<a href=\"logout.php\">Cerrar sesión</a>";
    $header .= "</header>";

    echo $header;
}

?>
