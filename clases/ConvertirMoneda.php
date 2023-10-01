<?php 
require 'ClasePadre.php';

#Dólar Estadounidense (USD), Euro (EUR), Libra Esterlina (GBP), Yen Japonés (JPY), Dólar Canadiense (CAD)

class RealizarConversionMoneda{
    public function convertirDatos($cantidad, $monedaOrigen, $monedaDestino) {
        try {
            // Validar la entrada
            $this->validarEntrada($cantidad, $monedaOrigen, $monedaDestino);

            // Instanciar la clase de conversión adecuada
            $converter = $this->instanciarClaseDeConversion($monedaOrigen, $monedaDestino, $cantidad);

            // Realizar la conversión
            $resultado = $converter->calcular();

            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function instanciarClaseDeConversion($monedaOrigen, $monedaDestino, $cantidad) {
        $conversiones = [
            'usd' => [
                'euro' => DolarEstadounidenseToEuro::class,
                'libra' => DolarEstadounidenseToLibraEsterlina::class,
                'yen' => DolarEstadounidenseToYen::class,
                'dolarCanadiense' => DolarEstadounidenseToDolarEstadounidense::class,
            ],
            'euro' => [
                'usd' => EuroToDolarEstadounidense::class,
                'libra' => EuroToLibraEsterlina::class,
                'yen' => EuroToYen::class,
                'dolarCanadiense' => EuroToDolarCanadiense::class,
            ],
            'libra' => [
                'usd' => LibraEsterlinaToDolarEstadounidense::class,
                'euro' => LibraEsterlinaToEuro::class,
                'yen' => LibraEsterlinaToYen::class,
                'dolarCanadiense' => LibraEsterlinaToDolarCanadiense::class,
            ],
            'yen' => [
                'usd' => YenToDolarEstadounidense::class,
                'euro' => YenToDolarEuro::class,
                'libra' => YenToLibraEsterlina::class,
                'dolarCanadiense' => YenToDolarCanadiense::class,
            ],
            'dolarCanadiense' => [
                'usd' => DolarCanadienseToDolarEstadounidense::class,
                'euro' => DolarCanadienseToEuro::class,
                'libra' => DolarCanadienseToLibraEsterlina::class,
                'yen' => DolarCanadienseToYen::class,
            ],
        ];

        if (!isset($conversiones[$monedaOrigen]) || !isset($conversiones[$monedaOrigen][$monedaDestino])) {
            throw new Exception("No se pudo realizar la conversión. Las unidades de masa seleccionadas son inválidas.");
        }

        $claseConversion = $conversiones[$monedaOrigen][$monedaDestino];
        return new $claseConversion($cantidad);
    }

    private function validarEntrada($cantidad, $monedaOrigen, $monedaDestino) {
        if (!is_numeric($cantidad) || $cantidad < 0) {
            throw new Exception("La cantidad ingresada no es válida.");
        }

        if (!in_array($monedaOrigen, ['usd', 'euro', 'libra', 'yen', 'dolarCanadiense']) ||
            !in_array($monedaDestino, ['usd', 'euro', 'libra', 'yen', 'dolarCanadiense'])) {
            throw new Exception("Las unidades de masa seleccionadas son inválidas.");
        }
    }
}

// de kilometros a las demas medidas

class DolarEstadounidenseToEuro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 28349.5;
        return $resultado;
    }
}

class DolarEstadounidenseToLibraEsterlina extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 28.35;
        return $resultado;
    }
}

class DolarEstadounidenseToYen extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0283495;
        return $resultado;
    }
}

class DolarEstadounidenseToDolarCanadiense extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0625; 
        return $resultado;
    }
}

//clases para convertir de metros a las demas longitudes

class EuroToDolarEstadounidense extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 16;
        return $resultado;
    }
}

class EuroToLibraEsterlina extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 453592.37;
        return $resultado;
    }
}

class EuroToYen extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 453.59;
        return $resultado;
    }
}

class EuroToDolarCanadiense extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.453592;
        return $resultado;
    }
}

//clases para convertir miligramos a las demas masas

class  LibraEsterlinaToDolarEstadounidense extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * (3.5274 * pow(10, -5));
        return $resultado;
    }
}

class LibraEsterlinaToEuro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * (2.20462 * pow(10, -6));
        return $resultado;
    }
}

class LibraEsterlinaToYen extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  0.001;
        return $resultado;
    }
}

class LibraEsterlinaToDolarCanadiense extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  1.0 * pow(10, -6);
        return $resultado;
    }
}

//clases para convertir de milimetros a las demas longitudes

class YenToDolarEstadounidense extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.035274;
        return $resultado;
    }
}

class YenToEuro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.00220462;
        return $resultado;
    }
}

class YenToLibraEsterlina extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}

class YenToDolarCanadiense extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.001;
        return $resultado;
    }
}

//clases para convertir de Pulgadas a las demas longitudes

class DolarCanadienseToDolarEstadounidense extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 35.27;
        return $resultado;
    }
}

class DolarCanadienseToEuro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 2.20462;
        return $resultado;
    }
}

class DolarCanadienseToLibraEsterlina extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000000;
        return $resultado;
    }
}

class DolarCanadienseToYen extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }
    
    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}
?>