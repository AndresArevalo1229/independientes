<?php

class Carrito{
   
    private $_id;
    private $_id_producto;
    private $_Producto;
    private $_id_usuario;
    private $_costo;
    private $_imagen;


    function __construct($id,$idproducto,$producto,$usuario,$costo,$imagen) {
        $this->_id=$id;
        $this->_id_producto = $idproducto;
        $this->_Producto = $producto;
        $this->_id_usuario = $usuario;
        $this->_costo = $costo;
        $this->_imagen= $imagen;

    }

    function getId(){
        return $this->_id;
    }
    
    function getidProducto(){
        return $this->_id_producto;
    }
    function setidProducto($idproducto){
        $this->_id_producto = $idproducto;
    }
    function getProducto(){
        return $this->_Producto;
    }
    function setProducto($producto){
        $this->_Producto = $producto;
    }
    function getUsuario(){
        return $this->_id_usuario;
    }
    function setUsuario($usuario){
        $this->_id_usuario = $usuario;
    }
    function getCosto(){
        return $this->_costo;
    }
    function setCosto($costo){
        $this->_costo = $costo;
    }
   
    function getImagen(){
        return $this->_imagen;
    }
}