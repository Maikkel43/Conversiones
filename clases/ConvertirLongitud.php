<?php 

require 'ClasePadre.php';

#kilometro, metro, centimetro, pulgada, milimetro

//clase para hacer las coversiones
class RealizarConversionLongitud{
    public function convertirLongitud($cantidad, $longitudOrigen, $longitudDestino) {
        try {
            // Validar la entrada
            $this->validarEntrada($cantidad, $longitudOrigen, $longitudDestino);

            // Instanciar la clase de conversión adecuada
            $converter = $this->instanciarClaseDeConversion($longitudOrigen, $longitudDestino, $cantidad);

            // Realizar la conversión
            $resultado = $converter->calcular();

            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function instanciarClaseDeConversion($longitudOrigen, $longitudDestino, $cantidad) {
        $conversiones = [
            'kilometro' => [
                'metro' => KilometrosToMetros::class,
                'centimetro' => KilometrosToCentimetros::class,
                'milimetro' => KilometrosToMilimetros::class,
                'pulgada' => KilometrosToPulgadas::class,
            ],
            'metro' => [
                'kilometro' => MetrosToKilometros::class,
                'centimetro' => MetrosToCentimetros::class,
                'milimetro' => MetrosToMilimetros::class,
                'pulgada' => MetrosToPulgadas::class,
            ],
            'centimetro' => [
                'kilometro' => CentimetrosToKilometros::class,
                'metro' => CentimetrosToMetros::class,
                'milimetro' => MiligramosToMilimetros::class,
                'pulgada' => MiligramosToPulgadas::class,
            ],
            'milimetro' => [
                'kilometro' => MilimetrosToKilometros::class,
                'metro' => MilimetrosToMetros::class,
                'centimetro' => MilimetrosToCentimetros::class,
                'pulgada' => MilimetrosToPulgadas::class,
            ],
            'pulgada' => [
                'kilometro' => PulgadasToKilometros::class,
                'metro' => PulgadasToMetros::class,
                'centimetro' => PulgadasToCentimetros::class,
                'milimetro' => PulgadasToMilimetros::class,
            ],
        ];

        if (!isset($conversiones[$longitudOrigen]) || !isset($conversiones[$longitudOrigen][$longitudDestino])) {
            throw new Exception("No se pudo realizar la conversión. Las unidades de masa seleccionadas son inválidas.");
        }

        $claseConversion = $conversiones[$longitudOrigen][$longitudDestino];
        return new $claseConversion($cantidad);
    }

    private function validarEntrada($cantidad, $longitudOrigen, $longitudDestino) {
        if (!is_numeric($cantidad) || $cantidad < 0) {
            throw new Exception("La cantidad ingresada no es válida.");
        }

        if (!in_array($longitudOrigen, ['kilometro', 'metro', 'centimetro', 'milimetro', 'pulgada']) ||
            !in_array($longitudDestino, ['kilometro', 'metro', 'centimetro', 'milimetro', 'pulgada'])) {
            throw new Exception("Las unidades de masa seleccionadas son inválidas.");
        }
    }
}

// de kilometros a las demas medidas

class KilometrosToMetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}

class KilometrosToCentimetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 100000;
        return $resultado;
    }
}

class KilometrosToMilimetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000000;
        return $resultado;
    }
}

class KilometrosToPulgadas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  39370.1; 
        return $resultado;
    }
}

//clases para convertir de metros a las demas longitudes

class MetrosToKilometros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.001;
        return $resultado;
    }
}

class MetrosToCentimetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 100;
        return $resultado;
    }
}

class MetrosToMilimetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}

class MetrosToPulgadas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 39.3701;
        return $resultado;
    }
}

//clases para convertir miligramos a las demas masas

class  CentimetrosToKilometros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * (1.0 * pow(10, -5));
        return $resultado;
    }
}

class CentimetrosToMetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.01;
        return $resultado;
    }
}

class CentimetrosToMilimetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  10;
        return $resultado;
    }
}

class CentimetrosToPulgadas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  0.393701;
        return $resultado;
    }
}

//clases para convertir de milimetros a las demas longitudes

class MilimetrosToKilometros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  1.0 * pow(10, -6);
        return $resultado;
    }
}

class MilimetrosToMetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.001;
        return $resultado;
    }
}

class MilimetrosToCentimetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.1;
        return $resultado;
    }
}

class MilimetrosToPulgadas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  0.0393701;
        return $resultado;
    }
}

//clases para convertir de Pulgadas a las demas longitudes

class PulgadasToKilometros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 2.54 * pow(10, -5);
        return $resultado;
    }
}

class PulgadasToMetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0254;
        return $resultado;
    }
}

class PulgadasToCentimetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 2.54;
        return $resultado;
    }
}

class PulgadasToMilimetros extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }
    
    public function calcular(){
        $resultado = $this->cantidad * 25.4;
        return $resultado;
    }
}
?>