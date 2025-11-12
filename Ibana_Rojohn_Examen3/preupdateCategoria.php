<?php

// Crea una app con php en la que se pida un número (id). Al darle a enviar debe cargar
// un formulario con los datos de la categoría que tenga el id indicado en el primer
// formulario. Se debe poder modificar el nombre de la categoría y guardar los datos modificados.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Actualizar Categoría</h1>
    <form method="GET" action="updateCategoria.php">
        <div>
            <label for="id">ID Categoría</label>
            <input id="id" name="id" type="number" min="0" step="1" required>
        </div>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
