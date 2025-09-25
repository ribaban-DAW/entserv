<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.4.1</title>
</head>
<body>

<?php

// Crea un programa que gestione una cuenta bancaria. Debéis crear una clase que controle
// la cuenta y en la que se puedan hacer ingresos, retiradas y consultar el balance. En el
// código principal prueba cada uno de los métodos de la clase.

echo "<h1>Tarea 2.4.1</h1>";

class CuentaBancaria {
    private float $balance;

    function __construct(float $balance = 0) {
        $this->balance = $balance;
    }
    
    function ingreso(float $importe) {
        $this->balance += $importe;
    }

    function retirada(float $importe) {
        $this->balance -= $importe;
    }

    function consultarBalance(): float {
        return $this->balance;
    }
}

$cuenta = new CuentaBancaria();

echo "<p>En la cuenta tienes: " . $cuenta->consultarBalance() . "€</p>";
$importeIngreso = 100.5;
$cuenta->ingreso(100.5);
echo "<p>Se ha realizado un ingreso de ${importeIngreso}€</p>";
echo "<p>En la cuenta tienes: " . $cuenta->consultarBalance() . "€</p>";
$importeRetirada = $importeIngreso / 3;
$cuenta->retirada($importeRetirada);
echo "<p>Se ha realizado una retirada de ${importeRetirada}€</p>";
echo "<p>En la cuenta tienes: " . $cuenta->consultarBalance() . "€</p>";

?>

</body>
</html>
