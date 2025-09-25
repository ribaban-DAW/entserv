<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2.4.2</title>
</head>
<body>

<?php

// Debes crear un programa donde se controle un coche y se pueda acelerar,
// frenar y obtener la velocidad. Además esta clase va a tener las propiedades
// color, marca y modelo. También debes crear otra clase cochera en la que la única
// función será pintar un vehículo. Esta función debe admitir como primer parámetro
// una clase de tipo coche y el nuevo color. La aceleración y frenada deben ir en
// incrementos de 10 y la máxima velocidad será 100km/h y la mínima 0 km/h.
// En el código principal debes verificar todo lo programado. Debes hacer un bucle que
// acelere sin parar hasta alcanzar la máxima velocidad y frenar hasta pararlo.

echo "<h1>Tarea 2.4.2</h1>";

class Coche {
    private int $MAX_VELOCIDAD = 100;
    private int $MIN_VELOCIDAD = 0;
    private int $DELTA_VELOCIDAD = 10;

    private int $velocidad;
    private string $color;
    private string $marca;
    private string $modelo;

    function __construct(int $velocidad = 0, string $color = "#FFBBFF", string $marca = "marca", string $modelo = "modelo") {
        $this->velocidad = $velocidad;
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
    }
    
    function acelerar(): bool {
        if ($this->velocidad >= 100) {
            return false;
        }
        
        $this->velocidad += $this->DELTA_VELOCIDAD;

        return true;
    }
    
    function frenar() {
        if ($this->velocidad <= 0) {
            return false;
        }
        $this->velocidad -= $this->DELTA_VELOCIDAD;

        return true;
    }

    function obtenerVelocidad(): int {
        return $this->velocidad;
    }

    function setColor(string $nuevoColor) {
        $this->color = $nuevoColor;
    }

    function getColor() {
        return $this->color;
    }

    function getMarca() {
        return $this->marca;
    }

    function getModelo() {
        return $this->modelo;
    }
}

class Cochera {
    function pintar(Coche $coche, string $nuevoColor) {
        $coche->setColor($nuevoColor);
    }
}

$coche = new Coche();
$cochera = new Cochera();

echo "<p>El color del coche es " . $coche->getColor() . "</p>";
do {
    echo "<p>La velocidad actual es de " . $coche->obtenerVelocidad() . " km/h</p>";
} while ($coche->acelerar());

$cochera->pintar($coche, "#222222");
echo "<p>El color del coche es " . $coche->getColor() . "</p>";

do {
    echo "<p>La velocidad actual es de " . $coche->obtenerVelocidad() . " km/h</p>";
} while ($coche->frenar());


?>

</body>
</html>
