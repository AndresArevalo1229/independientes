

<?php
    require_once "../../modelos/Carritos.php";
    require_once "../../clases/MySQL.php";
    require_once "../../modelos/Producto.php";


    if(isset($_GET)){//recibe el id de producto
        if(isset($_GET["id"])){
            $id =$_GET["id"];
            $mysql=new MySql();
            $producto = $mysql->obteneridProducto($id);
    
            if($producto == null){
                header("Location: ../index.php");
            }
    
        }
    
    }

    echo $_SESSION["id"];
    //creamos la tabla carritp

    
                                                                     //usuario id
 $carrito= new Carrito(
    0,$producto->getId(),
    $producto->getProducto(),
    $_SESSION["id"],$producto->getprecio(),$producto->getImagen());
  
 $mysql=new MySql();

   if($mysql->InsertarCarrito($carrito))
  header("Location: ../vistas/carrito.php");
   







?>