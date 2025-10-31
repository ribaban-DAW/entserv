<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <script src="../js/main.js"></script>
</head>
<body>    
    <h1>Venta</h1>

    <form>
        <div>
            <label for="factura">Factura</label>
            <input id="factura" name="factura" type="text" onkeyup="asyncFilterVenta()">
        </div>
        <div>
            <label for="empleado">Empleado</label>
            <input id="empleado" name="empleado" type="text" onkeyup="asyncFilterVenta()">
        </div>
        <div>
            <label for="cliente">Cliente</label>
            <input id="cliente" name="cliente" type="text" onkeyup="asyncFilterVenta()">
        </div>
        <div>
            <label for="fruta">Fruta</label>
            <input id="fruta" name="fruta" type="text" onkeyup="asyncFilterVenta()">
        </div>
    </form>
    <table>
        <thead>
            <tr>
                <th>Factura</th>
                <th>Empleado</th>
                <th>Cliente</th>
                <th>Fruta</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody id="container">
            <script>asyncFilterVenta()</script>
        </tbody>
    </table>
</body>
</html>
