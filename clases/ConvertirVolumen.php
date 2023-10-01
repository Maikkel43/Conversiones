<?php 

require 'ClasePadre.php';

#litro, galon, onza, mililitro, taza

class RealizarConversionVolumen{
    public function convertirDatos($cantidad, $volumenOrigen, $volumenDestino) {
        try {
            // Validar la entrada
            $this->validarEntrada($cantidad, $volumenOrigen, $volumenDestino);

            // Instanciar la clase de conversión adecuada
            $converter = $this->instanciarClaseDeConversion($volumenOrigen, $volumenDestino, $cantidad);

            // Realizar la conversión
            $resultado = $converter->calcular();

            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function instanciarClaseDeConversion($volumenOrigen, $volumenDestino, $cantidad) {
        $conversiones = [
            'litro' => [
                'galon' => LitroToGalon::class,
                'onza' => LitroToOnza::class,
                'mililitro' => LitroToMililitro::class,
                'taza' => LitroToTaza::class,
            ],
            'galon' => [
                'litro' => GalonToLitro::class,
                'onza' => GalonToOnza::class,
                'mililitro' => GalonToMililitro::class,
                'taza' => GalonToTaza::class,
            ],
            'onza' => [
                'litro' => OnzaToLitro::class,
                'galon' => OnzaToGalon::class,
                'mililitro' => OnzaToMililitro::class,
                'taza' => OnzaToTaza::class,
            ],
            'mililitro' => [
                'litro' => MililitroToLitro::class,
                'galon' => MililitroToGalon::class,
                'onza' => MililitroToOnza::class,
                'taza' => MililitroToTaza::class,
            ],
            'taza' => [
                'litro' => TazaToLitro::class,
                'galon' => TazaToGalon::class,
                'onza' => TazaToOnza::class,
                'mililitro' => TazaToMililitro::class,
            ],
        ];

        if (!isset($conversiones[$volumenOrigen]) || !isset($conversiones[$volumenOrigen][$volumenDestino])) {
            throw new Exception("No se pudo realizar la conversión. Las unidades de masa seleccionadas son inválidas.");
        }

        $claseConversion = $conversiones[$volumenOrigen][$volumenDestino];
        return new $claseConversion($cantidad);
    }

    private function validarEntrada($cantidad, $volumenOrigen, $volumenDestino) {
        if (!is_numeric($cantidad) || $cantidad < 0) {
            throw new Exception("La cantidad ingresada no es válida.");
        }

        if (!in_array($volumenOrigen, ['litro', 'galon', 'onza', 'mililitro', 'taza']) ||
            !in_array($volumenDestino, ['litro', 'galon', 'onza', 'mililitro', 'taza'])) {
            throw new Exception("Las unidades de masa seleccionadas son inválidas.");
        }
    }
}

// de kilometros a las demas medidas

class LitroToGalon extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.227021;
        return $resultado;
    }
}

class LitroToOnza extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.227021;
        return $resultado;
    }
}

class LitroToMililitro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}

class LitroToTaza extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 4.23; 
        return $resultado;
    }
}

//clases para convertir de metros a las demas longitudes

class GalonToLitro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 3.79;
        return $resultado;
    }
}

class GalonToOnza extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 128;
        return $resultado;
    }
}

class GalonToMililitro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 3785.41;
        return $resultado;
    }
}

class GalonToTaza extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 16;
        return $resultado;
    }
}

//clases para convertir miligramos a las demas masas

class  OnzaToLitro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0295735;
        return $resultado;
    }
}

class OnzaToGalon extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0078125;
        return $resultado;
    }
}

class OnzaToMililitro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  29.57;
        return $resultado;
    }
}

class OnzaToTaza extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  0.125;
        return $resultado;
    }
}

//clases para convertir de milimetros a las demas longitudes

class MililitroToLitro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.001;
        return $resultado;
    }
}

class MililitroToGalon extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.000264172;
        return $resultado;
    }
}

class MililitroToOnza extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.033814;
        return $resultado;
    }
}

class MililitroToTaza extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.00422675;
        return $resultado;
    }
}

//clases para convertir de Pulgadas a las demas longitudes

class TazaToLitro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.236588;
        return $resultado;
    }
}

class TazaToGalon extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0625;
        return $resultado;
    }
}

class TazaToOnza extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 8;
        return $resultado;
    }
}

class TazaToMililitro extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }
    
    public function calcular(){
        $resultado = $this->cantidad * 236.59;
        return $resultado;
    }
}
?>