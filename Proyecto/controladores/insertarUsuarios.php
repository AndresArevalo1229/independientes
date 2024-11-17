<?php
    session_start();

 require_once "../Modelos/Usuario.php";

 require_once "../clases/MySQL.php";
if($_POST){
    if(isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contra"]) && isset($_POST["rol"])){

 $usuario= new Usuario(0,$_POST["nombre"],$_POST["correo"],$_POST["contra"],$_POST["rol"]);
 
    $mysql=new MySql();
    $evaluar = $mysql->iniciarseccion($_POST["correo"]);


    if($evaluar != null){
        echo "<script>alert('Error: El correo electrónico ya esta registrado');</script>";

        echo "<script>window.location.href = 'http://localhost/independientes/proyecto/vistas/';</script>";

     
    }else{
    if($mysql->InsertarUsuario($usuario))
        header("Location: http://localhost/independientes/proyecto/vistas/");
    

    }




   
}else{
    echo "datos invalidos";
}
}else{
    header("Location: http://localhost/independientes/proyecto/vistas/");
}
?>