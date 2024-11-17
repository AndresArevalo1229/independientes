

<?php
require_once "../Modelos/Usuario.php";
require_once "../clases/MySQL.php";
if($_GET){
    if(isset($_GET["id"])){
 $usuario= new Usuario($_GET["id"],NULL,NULL,NULL,NULL);

    $mysql=new MySql();
    if($mysql->borrarUsuario($usuario)){
         echo "Usuario Eliminado correctamente";
    header("Location: http://localhost/independientes/proyecto/vistas/");
    }else{
        echo "no entro";
    }
    
   
}else{
    echo "datos invalidos";
    header("Location: http://localhost/independientes/proyecto/vistas/");

}
}else{
    echo "no entro";
    header("Location: http://localhost/independientes/proyecto/vistas/");

}

?>