<?php
    session_start();

    require_once "../Modelos/Categorias.php";

 require_once "../clases/MySQL.php";
if($_POST){
    if(isset($_POST["categoria"]) && isset($_POST["descripcion"]) ){
     $categoria= new Categoria(0,$_POST["categoria"],$_POST["descripcion"]);
 
    $mysql=new MySql();
    if($mysql->InsertarCategorias($categoria))
    echo "Producto creado correctamente";
    header("Location: http://localhost/independientes/proyecto/vistas/categorias.php");
   
}else{
    echo "datos invalidos";
}
}else{
    header("Location: http://localhost/independientes/proyecto/vistas/categorias.php");
}
?>