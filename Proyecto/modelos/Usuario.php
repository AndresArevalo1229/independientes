<?php

class Usuario{
    private $_id;
    private $_nombre;
    private $_correo;
    private $_contra;
    private $_roles;

    function __construct($id,$nombre,$correo,$contra, $roles) {
        $this->_id=$id;
        $this->_nombre = $nombre;
        $this->_correo = $correo;
        $this->_contra = $contra;
        $this->_roles =$roles;
    }

    function getId(){
        return $this->_id;
    }
    function getNombre(){
        return $this->_nombre;
    }
    function setNombre($nombre){
        $this->_nombre = $nombre;
    }
    function getCorreo(){
        return $this->_correo;
    }
    function setCorreo($correo){
        $this->_correo = $correo;
    }
    function getContra(){
        return $this->_contra;
    }
    function setContra($contra){
        $this->_contra = $contra;
    }
    function getRoles(){
        return $this->_roles;
    }
    function setRoles($roles){
        $this->_roles = $roles;
    }
}