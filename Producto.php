<?php

class Producto {
    private $codigo;
    private $nombre;
    private $precio;
    private $existencia;
    
    //function __construct($codigo, $nombre, $precio, $existencia) {
        //$this->codigo = $codigo;
       // $this->nombre = $nombre;
        //$this->precio = $precio;
      //  $this->existencia = $existencia;
    //}
    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getExistencia() {
        return $this->existencia;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setExistencia($existencia) {
        $this->existencia = $existencia;
    }
}