<?php

// Para construir la URL de la API usando una ruta agnóstica, para que funcione sin que cambiar nada,
// suponiendo que 'cliente.php' y 'api.php' están en el mismo directorio.
$host = $_SERVER["HTTP_HOST"];
$basename = dirname($_SERVER["SCRIPT_NAME"]);
$url = "http://$host$basename/api.php";

// Muestra el error y muere
function show_error_and_die($response) {
    // Inspirado en https://darkintaqt.com/blog/file_get_contents-statuscode
    // Como la respuesta tiene la siguiente forma: 'HTTP/1.1 500 Error al crear el producto'
    // Con los paréntesis capturo los grupos, en este caso capturo el código de estado y el mensaje de error.
    preg_match('/HTTP\/1\.1 ([0-9]+) (.*)/', $response, $matches);

    $output = "<p>Error: {$matches[1]}. Razón: {$matches[2]}</p>";
    $output .= "<a href='cliente.php'>Volver</a>";
    die($output);
}

$response = @file_get_contents($url);
if ($response === false) {
    show_error_and_die($http_response_header[0]);
}

$products_data = json_decode($response, true);
$products = $products_data["data"] ?? null;

// El cliente.php se autollama con GET para obtener un producto por id
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET["id"] ?? null;
    if (!is_null($id)) {
        $response = @file_get_contents("$url?id=$id", true);
        if ($response === false) {
            show_error_and_die($http_response_header[0]);
        }

        $product_data = json_decode($response, true);
        if (isset($product_data["data"])) {
            $product = $product_data["data"];
            
            // Almacenados en nombre, precio y stock respectivamente para poder mostrarlo en el formulario
            $nombre = $product["nombre"];
            $precio = $product["precio"];
            $stock = $product["stock"];
        } else {
            show_error_and_die($http_response_header[0]);
        }
    }

// El cliente.php se autollama con POST para crear un producto en formato JSON
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? null;
    $precio = $_POST["precio"] ?? null;
    $stock = $_POST["stock"] ?? null;

    $data = [
        "nombre" => $nombre,
        "precio" => $precio,
        "stock" => $stock,
    ];

    // Inspirado de https://www.php.net/manual/en/function.file-get-contents.php#Hcom108309
    $opts = [
        "http" => [
            "method" => "POST",
            "header" => "Content-Type: application/json\r\n",
            "content" => json_encode($data),
        ],
    ];
    $context = stream_context_create($opts);
    $created_data = @file_get_contents($url, false, $context);
    if ($created_data === false) {
        show_error_and_die($http_response_header[0]);
    }

    // Redirección al mismo archivo para recargar la tabla de productos
    header("Location: cliente.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product["nombre"]; ?></td>
                <td><?php echo $product["precio"]; ?></td>
                <td><?php echo $product["stock"]; ?></td>
                <td><a href='cliente.php?id=<?php echo $product["id"]; ?>'>Editar</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <form method="post">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?? ""; ?>" required>
        </div>

        <div>
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" step="0.01" value="<?php echo $precio ?? ""; ?>" required>
        </div>

        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?php echo $stock ?? ""; ?>" required>
        </div>

        <button type="submit">Crear</button>
    </form>
</body>
</html>
