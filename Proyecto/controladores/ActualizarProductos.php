

<?php
    require_once "../Modelos/Producto.php";
    require_once "../clases/MySQL.php";

if($_POST){

    if(isset($_POST["producto"]) && isset($_POST["categoria"]) && isset($_POST["Precio"])
   ){


 $producto= new Producto($_POST["id"],$_POST["producto"],$_POST["categoria"],$_POST["Precio"],$_POST["imagen"]);
  
 $mysql=new MySql();

    if($mysql->actualizarProducto($producto))
    header("Location: http://localhost/independientes/proyecto/vistas/productos.php");
   
}else{
    echo "datos invalidos";
}
}else{
    header("Location: http://localhost/independientes/proyecto/vistas/productos.php");

}

?>