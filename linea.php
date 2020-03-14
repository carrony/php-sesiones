<?php

class Linea {
    private $articulo;
    private $unidades;

    public function __construct($articulo, $unidades=1){
        $this->articulo=$articulo;
        $this->unidades=$unidades;
    }

    public function incUnidades($unidades=1) {
        $this->unidades += $unidades;
    }

    public function getUnidades() {
        return $this->unidades;
    }

    public function getArticulo() {
        return $this->articulo;
    }
}
?>