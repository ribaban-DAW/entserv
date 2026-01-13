<?php

require_once "env.php";

// Devuelve la conexión a la base de datos o null si hay un error
function getDBConnection() {
    try {
        $host = $GLOBALS['host'];
        $dbname = $GLOBALS['dbname'];
        $username = $GLOBALS['username'];
        $password = $GLOBALS['password'];
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);

        return $conn;
    } catch (PDOException $e) {
        return null;
    }
}

// Devuelve una respuesta JSON con su status code, mensaje y datos
function send_response($status, $status_message, $data = null) {
    // Establece el header HTTP
    header("HTTP/1.1 $status $status_message");
    
    $response["status"] = $status;
    $response["status_message"] = $status_message;
    if (!is_null($data)) {
        $response["data"] = $data;
    }
    
    echo json_encode($response);
}

// Devuelve una respuesta 200
function send_ok($data) {
    send_response(200, "OK", $data);
}

// Devuelve una respuesta 201
function send_created($data) {
    send_response(201, "Created", $data);
}

// Establece el contenido a JSON
header("Content-Type:application/json");

// Devuelve los productos, un array vacío o null si hay un error
// NOTA: El array vacío es para que no muestre un error si no hay productos
function get_products() {
    $conn = getDBConnection();
    if (is_null($conn)) {
        return null;
    }

    $stmt = $conn->query("SELECT * FROM productos");
    
    $products =  $stmt->fetchall(PDO::FETCH_ASSOC);
    if (!$products) {
        return [];
    }
    
    return $products;
}

// Devuelve un producto dado su id o null si hay un error
function get_product_by_id($id) {        
    $conn = getDBConnection();
    if (is_null($conn)) {
        return null;
    }

    $select = " SELECT *";
    $from = " FROM productos";
    $where = " WHERE id = :id";

    $query = $select . $from . $where;

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ":id" => $id,
        ]);

        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$product) {
            return null;
        }

        return $product;
    } catch (PDOException $e) {
        return null;
    }
}

// Devuelve true si se ha creado el producto o false si hay un error
function create_product($nombre, $precio, $stock) {
    $conn = getDBConnection();
    if (is_null($conn)) {
        return false;
    }

    $query = "INSERT INTO productos (nombre, precio, stock) VALUES (:nombre, :precio, :stock)";

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ":nombre" => $nombre,
            ":precio" => $precio,
            ":stock" => $stock,
        ]);

        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// La API es llamada con GET, devuelve una respuesta con todos los productos, un producto por su id o un error
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET["id"] ?? null;
    if (is_null($id)) {
        $products = get_products();
        if (is_null($products)) {
            return send_response(500, "No se han podido obtener los productos");
        }

        return send_ok($products);
    }

    $product = get_product_by_id($id);
    if (is_null($product)) {
        return send_response(404, "Producto con ID $id no encontrado");
    }

    return send_ok($product);

// La API es llamada con POST, devuelve una respuesta con el producto creado o un error
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtengo los datos de la request
    $data = json_decode(file_get_contents("php://input"), true);

    // Validación de errores
    $nombre = $data["nombre"] ?? null;
    if (is_null($nombre)) {
        return send_response(400, "El campo 'nombre' no puede estar vacío");
    }

    $precio = $data["precio"] ?? null;
    if (is_null($precio) || !is_numeric($precio)) {
        return send_response(400, "El campo 'precio' no puede estar vacío y tiene que ser un número");
    }

    $stock = $data["stock"] ?? null;
    if (is_null($stock) || !is_numeric($stock)) {
        return send_response(400, "El campo 'stock' no puede estar vacío y tiene que ser un número");
    }

    if (!create_product($nombre, $precio, $stock)) {
        return send_response(500, "No se ha podido crear el producto");
    }
    
    return send_created([
        "nombre" => $nombre,
        "precio" => $precio,
        "stock" => $stock,
    ]);
}
?>
