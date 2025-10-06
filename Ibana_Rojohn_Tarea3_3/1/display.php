<?php

// Crea un fichero php en el que se creen 3 cookies en el sistema.
// En el mismo fichero llama a otro documento php que recupere esas
// cookies y muestre por pantalla el nombre de la cookie y el valor
// que tiene cada una.

if (isset($_COOKIE['nombre1'])) {
    echo "<p>" . $_COOKIE['nombre1'] . "</p>";    
}

if (isset($_COOKIE['nombre2'])) {
    echo "<p>" . $_COOKIE['nombre2'] . "</p>";    
}

if (isset($_COOKIE['nombre3'])) {
    echo "<p>" . $_COOKIE['nombre3'] . "</p>";    
}

?>
