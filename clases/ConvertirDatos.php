<?php 
require 'ClasePadre.php';

#Bit, byte, kilobyte, megabyte, gigabyte

//clase para hacer las coversiones
class RealizarConversionDatos{
    public function convertirDatos($cantidad, $datosOrigen, $datosDestino) {
        try {
            // Validar la entrada
            $this->validarEntrada($cantidad, $datosOrigen, $datosDestino);

            // Instanciar la clase de conversión adecuada
            $converter = $this->instanciarClaseDeConversion($datosOrigen, $datosDestino, $cantidad);

            // Realizar la conversión
            $resultado = $converter->calcular();

            return $resultado;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function instanciarClaseDeConversion($datosOrigen, $datosDestino, $cantidad) {
        $conversiones = [
            'bit' => [
                'byte' => BitToByte::class,
                'kilobyte' => BitToKilobyte::class,
                'megabyte' => BitToMegabyte::class,
                'gigabyte' => BitToGigabyte::class,
            ],
            'byte' => [
                'bit' => ByteToBit::class,
                'kilobyte' => ByteToKilobyte::class,
                'megabyte' => ByteToMegabyte::class,
                'gigabyte' => ByteToGigabyte::class,
            ],
            'kilobyte' => [
                'bit' => KilobyteToBit::class,
                'byte' => KilobyteToByte::class,
                'megabyte' => KilobyteToMegabyte::class,
                'gigabyte' => KilobyteToGigabyte::class,
            ],
            'megabyte' => [
                'bit' => MegabyteToBit::class,
                'byte' => MegabyteToByte::class,
                'kilobyte' => MegabyteToKilobyte::class,
                'gigabyte' => MegabyteToGigabyte::class,
            ],
            'gigabyte' => [
                'bit' => GigabyteToBit::class,
                'byte' => GigabyteToByte::class,
                'kilobyte' => GigabyteToKilobyte::class,
                'megabyte' => GigabyteToMegabyte::class,
            ],
        ];

        if (!isset($conversiones[$datosOrigen]) || !isset($conversiones[$datosOrigen][$datosDestino])) {
            throw new Exception("No se pudo realizar la conversión. Las unidades de masa seleccionadas son inválidas.");
        }

        $claseConversion = $conversiones[$datosOrigen][$datosDestino];
        return new $claseConversion($cantidad);
    }

    private function validarEntrada($cantidad, $datosOrigen, $datosDestino) {
        if (!is_numeric($cantidad) || $cantidad < 0) {
            throw new Exception("La cantidad ingresada no es válida.");
        }

        if (!in_array($datosOrigen, ['bit', 'byte', 'kilobyte', 'megabyte', 'gigabyte']) ||
            !in_array($datosDestino, ['bit', 'byte', 'kilobyte', 'megabyte', 'gigabyte'])) {
            throw new Exception("Las unidades de masa seleccionadas son inválidas.");
        }
    }
}


// de bit a las demas medidas

class BitToByte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.125;
        return $resultado;
    }
}

class BitToKilobyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.000125;
        return $resultado;
    }
}

class BitToMegabyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1.25 * pow(10, -7);
        return $resultado;
    }
}

class BitToGigabyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1.25 * pow(10,-10); 
        return $resultado;
    }
}

//clases para convertir de metros a las demas longitudes

class ByteToBit extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 8;
        return $resultado;
    }
}

class ByteToKilobyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.001;
        return $resultado;
    }
}

class ByteToMegabyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1.0 * pow(10,-6);
        return $resultado;
    }
}

class ByteToGigabyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1.0 * pow(10, -9);
        return $resultado;
    }
}

//clases para convertir miligramos a las demas masas

class  KilobyteToBit extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 8000;
        return $resultado;
    }
}

class KilobyteToByte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}

class KilobyteToMegabyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  0.001;
        return $resultado;
    }
}

class KilobyteToGigabyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad *  1.0 * pow(10, -6);
        return $resultado;
    }
}

//clases para convertir de milimetros a las demas longitudes

class MegabyteToBit extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 8000000;
        return $resultado;
    }
}

class MegabyteToByte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000000;
        return $resultado;
    }
}

class MegabyteToKilobyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}

class MegabyteToGigabyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 0.001;
        return $resultado;
    }
}

//clases para convertir de Pulgadas a las demas longitudes

class GigabyteToBit extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 8000000000;
        return $resultado;
    }
}

class GigabyteToByte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000000000;
        return $resultado;
    }
}

class GigabyteToKilobyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }

    public function calcular(){
        $resultado = $this->cantidad * 1000000;
        return $resultado;
    }
}

class GigabyteToMegabyte extends Convertir{
    public function __construct($cantidad){
        parent::__construct($cantidad);
    }
    
    public function calcular(){
        $resultado = $this->cantidad * 1000;
        return $resultado;
    }
}
?>