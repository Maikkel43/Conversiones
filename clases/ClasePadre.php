<?php 
abstract class Convertir{
    public $cantidad;

    public function __construct($cantidad){
        $this->cantidad = $cantidad;
    }

    abstract public function calcular();
}
?>