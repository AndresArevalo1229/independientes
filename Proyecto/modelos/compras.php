<?php

class Compras{
   
    private $_id;
    private $_id_producto;
    private $_id_usuario;
    private $_fecha;


    function __construct($id,$idproducto,$usuario,$fecha) {
        $this->_id=$id;
        $this->_id_producto = $idproducto;
        $this->_id_usuario = $usuario;
        $this->_fecha = $fecha;

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
   
    function getUsuario(){
        return $this->_id_usuario;
    }
    function setUsuario($usuario){
        $this->_id_usuario = $usuario;
    }
    function getFecha(){
        return $this->_fecha;
    }
    function setFecha($fecha){
        $this->_fecha = $fecha;
    }
   
}