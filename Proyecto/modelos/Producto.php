<?php

class Producto{
    private $_id;
    private $_Producto;
    private $_categoria;
    private $_precio;
    public $_imagen;

    function __construct($id,$producto,$categoria,$precio,$imagen) {
        $this->_id=$id;
        $this->_Producto = $producto;
        $this->_categoria = $categoria;
        $this->_precio = $precio;
        $this->_imagen= $imagen;

    }

    function getId(){
        return $this->_id;
    }
    function getProducto(){
        return $this->_Producto;
    }
    function setProducto($producto){
        $this->_Producto = $producto;
    }
    function getcategoria(){
        return $this->_categoria;
    }
    function setcategoria($categoria){
        $this->_categoria = $categoria;
    }
    function getprecio(){
        return $this->_precio;
    }
    function setprecio($precio){
        $this->_precio = $precio;
    }
    function getImagen(){
        return $this->_imagen;
    }
   
}