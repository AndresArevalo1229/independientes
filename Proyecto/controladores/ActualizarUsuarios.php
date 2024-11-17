

<?php
 require_once "../Modelos/Usuario.php";
 require_once "../clases/MySQL.php";

if($_POST){

    if(isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contra"])
    && isset($_POST["id"]) && isset($_POST["rol"])){


 $usuario= new Usuario($_POST["id"],$_POST["nombre"],$_POST["correo"],$_POST["contra"],$_POST["rol"]);
  
 $mysql=new MySql();

    if($mysql->actualizarUsuario($usuario))
    header("Location: http://localhost/independientes/proyecto/vistas/");
   
}else{
    echo "datos invalidos";
}
}else{
    header("Location: http://localhost/independientes/proyecto/vistas/");

}

?>