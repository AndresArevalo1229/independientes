<?php

class Categoria{
    private $_id;
    private $_categoria;
    private $_descripcion;

    function __construct($id,$categoria,$descripcion) {
        $this->_id=$id;
        $this->_categoria = $categoria;
        $this->_descripcion = $descripcion;
    }

    function getId(){
        return $this->_id;
    }
    
    function getCategoria(){
        return $this->_categoria;
    }
    function setcategoria($categoria){
        $this->_categoria = $categoria;
    }
    function getDescripcion(){
        return $this->_descripcion;
    }
    function setDescripcion($descripcion){
        $this->_descripcion = $descripcion;
    }
   
}