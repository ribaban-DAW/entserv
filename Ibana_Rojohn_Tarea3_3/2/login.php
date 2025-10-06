<?php

// Con el fichero de la tarea anterior en la que habéis hecho un login,
// cuando el usuario se loguee correctamente, debéis crear una sesión y
// guardar el nombre. Una vez hecho esto, llamáis a otro fichero php en
// el que lea el nombre del usuario que ha iniciado sesión y le muestre
// un mensaje de bienvenida.

session_start();
echo "Hola " . $_SESSION['username'];

?>
