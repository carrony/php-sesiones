<?php
require_once("linea.php");

// Almacena los datos del carrito
class Carrito {

    private $lineas;

    public function __constructor() {
        $this->lineas=array();
    }

    public function getSize() {
        if (isset($this->lineas)) return count($this->lineas);
        return 0;
    }

    public function getTotalUnidades() {
        $num=0;
        foreach ($this->lineas as $linea) {
            $num += $linea->getUnidades();
        }
        return $num;
    }

    public function getTotal() {
        $suma=0;
        foreach ($this->lineas as $linea) {
            $suma += $linea->getArticulo()->getPrecio();
        }
        return $suma;
    }

    public function getLineas() {
        return $this->lineas;
    }

    public function addArticulo ($producto){
        if (isset($this->lineas[$producto->getNombre()])) {
            $linea = $this->lineas[$producto->getNombre()];
            $linea->incUnidades();
        } else {
            $linea = new Linea($producto);
        }
        $this->lineas[$producto->getNombre()] = $linea;
    }

}
?>