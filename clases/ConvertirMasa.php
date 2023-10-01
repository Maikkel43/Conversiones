<?php

require 'ClasePadre.php';

//clase para hacer las coversiones
class RealizarConversion{
        public function convertirMasa($cantidad, $masaOrigen, $masaDestino) {
            try {
                // Validar la entrada
                $this->validarEntrada($cantidad, $masaOrigen, $masaDestino);
    
                // Instanciar la clase de conversión adecuada
                $converter = $this->instanciarClaseDeConversion($masaOrigen, $masaDestino, $cantidad);
    
                // Realizar la conversión
                $resultado = $converter->calcular();
    
                return $resultado;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        private function instanciarClaseDeConversion($masaOrigen, $masaDestino, $cantidad) {
            $conversiones = [
                'onza' => [
                    'libra' => OnzasToLibra::class,
                    'miligramo' => OnzasToMiligramos::class,
                    'gramo' => OnzasToGramos::class,
                    'kilogramo' => OnzasToKilogramos::class,
                ],
                'libra' => [
                    'onza' => LibraToOnzas::class,
                    'miligramo' => LibraToMiligramos::class,
                    'gramo' => LibraToGramos::class,
                    'kilogramo' => LibraToKilogramos::class,
                ],
                'miligramo' => [
                    'onza' => MiligramosToOnza::class,
                    'libra' => MiligramosToLibra::class,
                    'gramo' => MiligramosToGramos::class,
                    'kilogramo' => MiligramosToKilogramos::class,
                ],
                'gramo' => [
                    'onza' => GramosToOnzas::class,
                    'libra' => GramosToLibras::class,
                    'miligramo' => GramosToMiligramos::class,
                    'kilogramo' => GramosToKilogramos::class,
                ],
                'kilogramo' => [
                    'onza' => KilogramosToOnzas::class,
                    'libra' => KilogramosToLibras::class,
                    'miligramo' => KilogramosToMiligramos::class,
                    'gramo' => KilogramosToGramos::class,
                ],
            ];
    
            if (!isset($conversiones[$masaOrigen]) || !isset($conversiones[$masaOrigen][$masaDestino])) {
                throw new Exception("No se pudo realizar la conversión. Las unidades de masa seleccionadas son inválidas.");
            }
    
            $claseConversion = $conversiones[$masaOrigen][$masaDestino];
            return new $claseConversion($cantidad);
        }
    
        private function validarEntrada($cantidad, $masaOrigen, $masaDestino) {
            if (!is_numeric($cantidad) || $cantidad < 0) {
                throw new Exception("La cantidad ingresada no es válida.");
            }
    
            if (!in_array($masaOrigen, ['onza', 'libra', 'miligramo', 'gramo', 'kilogramo']) ||
                !in_array($masaDestino, ['onza', 'libra', 'miligramo', 'gramo', 'kilogramo'])) {
                throw new Exception("Las unidades de masa seleccionadas son inválidas.");
            }
        }
    }


//clases para hacer las conversiones de onzas a las demas masas

class OnzasToLibra extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0625; 
        return $resultado;
    }
}

class OnzasToMiligramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 28349.5;
        return $resultado;
    }
}

class OnzasToGramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 28.35;
        return $resultado;
    }
}

class OnzasToKilogramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0283495;
        return $resultado;
    }
}

//clases para convertir de libra a las demas masas

class LibraToOnzas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 16;
        return $resultado;
    }
}

class LibraToMiligramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 453592.37;
        return $resultado;
    }
}

class LibraToGramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 453.59;
        return $resultado;
    }
}

class LibraToKIlogramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.453592;
        return $resultado;
    }
}

//clases para convertir miligramos a las demas masas

class MiligramosToOnza extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * (3.5274 * pow(10, -5));
        return $resultado;
    }
}

class MiligramosToLibra extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * (2.20462 * pow(10, -6));
        return $resultado;
    }
}

class MiligramosToGramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  0.001;
        return $resultado;
    }
}

class MiligramosToKilogramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  1.0 * pow(10, -6);
        return $resultado;
    }
}

//clases para convertir de gramos a las demas masas

class GramosToOnzas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.035274;
        return $resultado;
    }
}

class GramosToLibras extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.00220462;
        return $resultado;
    }
}

class GramosToMiligramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}

class GramosToKilogramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.001;
        return $resultado;
    }
}

//clases para convertir de kilogramos a las demas masas

class KilogramosToOnzas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 35.27;
        return $resultado;
    }
}

class KilogramosToLibras extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 2.20462;
        return $resultado;
    }
}

class KilogramosToMiligramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000000;
        return $resultado;
    }
}

class KilogramosToGramos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }
    
    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}
?>