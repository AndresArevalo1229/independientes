

<?php
    require_once "../Modelos/Categorias.php";
    require_once "../clases/MySQL.php";
if($_GET){
    if(isset($_GET["id"])){
 $categoria= new Categoria($_GET["id"],NULL,NULL);

    $mysql=new MySql();
    if($mysql->borrarCategoria($categoria)){
         echo "Producto Eliminado correctamente";
    header("Location: http://localhost/independientes/proyecto/vistas/categorias.php");
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