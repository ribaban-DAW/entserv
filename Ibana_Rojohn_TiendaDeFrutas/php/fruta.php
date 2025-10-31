<?php
    include_once "pdoconfig.php";
    include_once "db.php";

    
    function getFrutas() {
        $precio = isset($_REQUEST["precio"]) ? $_REQUEST["precio"] : null;
        $temporada = isset($_REQUEST["temporada"]) ? strtolower($_REQUEST["temporada"]) : null;
        $nombre = isset($_REQUEST["nombre"]) ? strtolower($_REQUEST["nombre"]) : null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = getDBConnection();
    
            $select = "SELECT PK_Id, Nombre, Temporada, Precio, Stock, Origen, Proveedor";
            $from = " FROM fruta";
    
            $where = " WHERE Precio >= :precio";
            $where .= " AND LOWER(Temporada) LIKE :temporada";
            $where .= " AND LOWER(Nombre) LIKE :nombre";
    
            $query = $select . $from . $where;
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ":precio" => $precio,
                ":temporada" => "%$temporada%",
                ":nombre" => "%$nombre%",
            ]);
            $frutas = $stmt->fetchall();

            return $frutas;
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado Fruta</h1>
    <form method="POST">
        <div>
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text">
        </div>
        <div>
            <label for="temporada">Temporada</label>
            <input id="temporada" name="temporada" type="text">
        </div>
        <div>
            <label for="precio">Precio</label>
            <input id="precio" name="precio" type="number" step="0.01" min="0">
        </div>
        <button type="submit">Filtrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Temporada</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Origen</th>
                <th>Proveedor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $frutas = getFrutas();
                $output = "";
                foreach ($frutas as $fruta) {
                    $output .= "<tr>";
                        $output .= "<td>${fruta["PK_Id"]}</td>";
                        $output .= "<td>${fruta["Nombre"]}</td>";
                        $output .= "<td>${fruta["Temporada"]}</td>";
                        $output .= "<td>${fruta["Precio"]}</td>";
                        $output .= "<td>${fruta["Stock"]}</td>";
                        $output .= "<td>${fruta["Origen"]}</td>";
                        $output .= "<td>${fruta["Proveedor"]}</td>";
                    $output .= "</tr>";
                }
            
                echo $output;
            ?>
        </tbody>
    </table>
</body>
</html>
