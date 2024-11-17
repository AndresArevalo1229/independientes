

<?php
    require_once "../Modelos/Categorias.php";
    require_once "../clases/MySQL.php";

if($_POST){

    if(isset($_POST["categoria"]) && isset($_POST["descripcion"])){


 $categoria= new Categoria($_POST["id"],$_POST["categoria"],$_POST["descripcion"]);
  
 $mysql=new MySql();

    if($mysql->actualizarCategoria($categoria))
    header("Location: http://localhost/independientes/proyecto/vistas/Categorias.php");
   
}else{
    echo "datos invalidos";
}




}else{
    header("Location: http://localhost/independientes/proyecto/vistas/Categorias.php");

}

?>