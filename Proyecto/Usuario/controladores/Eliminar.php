

<?php
   require_once "../../modelos/Carritos.php";
   require_once "../../clases/MySQL.php";
   require_once "../../modelos/Producto.php";
if($_GET){
    if(isset($_GET["id"])){
        $carrito= new Carrito($_GET["id"],null,null,null,null,null);

    $mysql=new MySql();
    if($mysql->borrarCarrito($carrito)){
         echo "carrito Eliminado correctamente";
    header("Location: ../vistas/carrito.php");
    }else{
        echo "no entro";
    }
    
   
}else{
    echo "datos invalidos";
}
}else{
    header("Location: http://localhost/independientes/proyecto/vistas/Categorias.php");

}

?>