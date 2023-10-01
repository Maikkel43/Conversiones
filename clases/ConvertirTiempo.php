<?php 
require 'ClasePadre.php';

#segundo, minuto, Hora, Dia, semana

class RealizarConversionTiempo{
    public function convertirDatos($cantidad, $tiempoOrigen, $tiempoDestino) {
        try {
            // Validar la entrada
            $this->validarEntrada($cantidad, $tiempoOrigen, $tiempoDestino);

            // Instanciar la clase de conversión adecuada
            $converter = $this->instanciarClaseDeConversion($tiempoOrigen, $tiempoDestino, $cantidad);

            // Realizar la conversión
            $resultado = $converter->calcular();

            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function instanciarClaseDeConversion($tiempoOrigen, $tiempoDestino, $cantidad) {
        $conversiones = [
            'segundos' => [
                'minutos' => SegundosToMinutos::class,
                'horas' => SegundosToHoras::class,
                'dias' => SegundosToDias::class,
                'semanas' => SegundosToSemanas::class,
            ],
            'minutos' => [
                'segundos' => MinutosToSegundos::class,
                'horas' => MinutosToHoras::class,
                'dias' => MinutosToDias::class,
                'semanas' => MinutosToSemanas::class,
            ],
            'horas' => [
                'segundos' => HorasToSegundos::class,
                'minutos' => HorasToMinutos::class,
                'dias' => HorasToDias::class,
                'semanas' => HorasToSemanas::class,
            ],
            'dias' => [
                'segundos' => DiasToSegundos::class,
                'minutos' => DiasToMinutos::class,
                'horas' => DiasToHoras::class,
                'semanas' => DiasToSemanas::class,
            ],
            'semanas' => [
                'segundos' => SemanasToSegundos::class,
                'minutos' => SemanasToMinutos::class,
                'horas' => SemanasToHoras::class,
                'dias' => SemanasToDias::class,
            ],
        ];

        if (!isset($conversiones[$tiempoOrigen]) || !isset($conversiones[$tiempoOrigen][$tiempoDestino])) {
            throw new Exception("No se pudo realizar la conversión. Las unidades de masa seleccionadas son inválidas.");
        }

        $claseConversion = $conversiones[$tiempoOrigen][$tiempoDestino];
        return new $claseConversion($cantidad);
    }

    private function validarEntrada($cantidad, $tiempoOrigen, $tiempoDestino) {
        if (!is_numeric($cantidad) || $cantidad < 0) {
            throw new Exception("La cantidad ingresada no es válida.");
        }

        if (!in_array($tiempoOrigen, ['segundos', 'minutos', 'horas', 'dias', 'semanas']) ||
            !in_array($tiempoDestino, ['segundos', 'minutos', 'horas', 'dias', 'semanas'])) {
            throw new Exception("Las unidades de masa seleccionadas son inválidas.");
        }
    }
}

// de kilometros a las demas medidas

class SegundosToMinutos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0166667;
        return $resultado;
    }
}

class SegundosToHoras extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.000277778;
        return $resultado;
    }
}

class SegundosToDias extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1.15741 * pow(10, -5);
        return $resultado;
    }
}

class SegundosToSemanas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1.65344 * pow(10, -6); 
        return $resultado;
    }
}

//clases para convertir de metros a las demas longitudes

class MinutosToSegundos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 60;
        return $resultado;
    }
}

class MinutosToHoras extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.0166667;
        return $resultado;
    }
}

class MinutosToDias extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.000694444;
        return $resultado;
    }
}

class MinutosToSemanas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 9.92063 * pow(10, -5);
        return $resultado;
    }
}

//clases para convertir miligramos a las demas masas

class  HorasToSegundos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 3600;
        return $resultado;
    }
}

class HorasToMinutos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 60;
        return $resultado;
    }
}

class HorasToDias extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  0.0416667;
        return $resultado;
    }
}

class HorasToSemanas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  0.00595238;
        return $resultado;
    }
}

//clases para convertir de milimetros a las demas longitudes

class DiasToSegundos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 86400;
        return $resultado;
    }
}

class DiasToMinutos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1440;
        return $resultado;
    }
}

class DiasToHoras extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 24;
        return $resultado;
    }
}

class DiasToSemanas extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.142857;
        return $resultado;
    }
}

//clases para convertir de Pulgadas a las demas longitudes

class SemanasToSegundos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 604800;
        return $resultado;
    }
}

class SemanasToMinutos extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 10080;
        return $resultado;
    }
}

class SemanasToHoras extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 168;
        return $resultado;
    }
}

class SemanasToDias extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }
    
    public function calcular(){
        $resultado = $this->cantidad * 7;
        return $resultado;
    }
}
?>