

<?php
    require_once "../Modelos/Producto.php";
    require_once "../clases/MySQL.php";
if($_GET){
    if(isset($_GET["id"])){

    $mysql=new MySql();
    $imagen = $mysql->obteneridProducto($_GET["id"]);

    if($mysql->borrarProducto($_GET["id"])){
        $targer_dir = "../files_".$_SESSION["DB"]."/".$imagen->getImagen(); //carpeta de destino de archivo
        unlink($targer_dir);

    header("Location: http://localhost/independientes/proyecto/vistas/productos.php");
    }else{
        echo "no entro";
    }
    
   
}else{
    echo "datos invalidos";
}
}else{
    header("Location: http://localhost/independientes/proyecto/vistas/productos.php");
}

?>