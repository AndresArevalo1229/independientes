<?php

 require_once "../Modelos/Producto.php";
 require_once "../diseño/navar.php";

 require_once "../clases/MySQL.php";



 

    if(isset($_POST)){
        if(isset($_POST["DB"])){
            $_SESSION['DB'] =$_POST["DB"];
            
    
        }
    
    }
    if(isset($_SESSION['DB'])){
        $db=$_SESSION['DB'];

    }else{  $db="im_delice_gdl";}



    if(isset($_SESSION["nombre"])&& $_SESSION["roles"]=="admin"){
        
        

   
     //Se crea la instancia de la clase MySql
     $mysql = new MySql();
     //Se llama al metodo para obtener los productoss
     $productos = $mysql->obtenerProducto();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>productos</title>
</head>
<script>
     function confirmarEliminacion(idProducto) {
        if(confirm('¿Estás seguro de que deseas eliminar este producto?')) {
            // Si el producto confirma la eliminación, redireccionar a la página que maneja la eliminación
            window.location.href = '../controladores/EliminarProductos.php?id=' + idProducto;
        }
    }
</script>
<style>
    img {
    width: 200px;
    height: 150px;
}
</style>
<body>
    <?php
    if(count($productos)){

    
    ?>
    <table class="table table-hover">
    <thead> <?php   echo "<div style='text-align: center;'>Bienvenido " . $_SESSION["nombre"] . "</div>"; ?>
    <?php   echo "<div style='text-align: center;'>Base de Datos: " . $db . "</div>"; ?>
    <div style='text-align: center;'>
    <form action="" method="post"  >
                    <select name="DB" id="" required>
                    <option value="" disabled selected>Selecciona una base de datos</option>

                    <option value="im_delice_GDL">Guadalajara</option>
                    <option value="im_delice_TLQ">Tlaquepaques</option>
                    </select>
                    <button type="submit">Cambiar a surcusal </button> 
                    </form>
                    </div>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">categoria</th>
      <th scope="col">precio</th>
      <th scope="col">Imagen</th>
      <th scope="col"
      style="  ">Acciones
    </tr>
  </thead>
  <tbody>
  <?php
        foreach($productos as $producto){
            $targer_dir = "../files_".$_SESSION["DB"]."/".$producto->getImagen(); //carpeta de destino de archivo

            echo "<tr >
            <th scope='row'>".$producto->getId()."</th>   
            <td>".$producto->getProducto()."</td>   
            <td>".$producto->getcategoria()."</td>   
            <td>".$producto->getprecio()."</td>   
            <td><img src='".$targer_dir."' alt='hols'></td>   
            

            <td >
            <a href='formacutalizarproductos.php?id=".$producto->getId()."'class='btn btn-outline-warning' role='button'>Actualizar</a>
            <a href='Verproductos.php?id=".$producto->getId()."'class='btn btn-outline-info' role='button'>Ver</a>
            <a href='#' onclick='confirmarEliminacion(".$producto->getId().")'class='btn btn-outline-danger' role='button'>Borrar</a></td>
            </tr>"; 
        }
        ?>
        <tr>
        <style>
    
</style>
            <td colspan="6" style="text-align: center;  width: 200px;" >
            <a  href="forminsertarproductos.php" class="btn btn-outline-success" role="button"
            style="text-align: center;  width: 200px;">crear</a>

            </td>

        </tr>

  </tbody>
  </table>

   
    <?php
    }else{

    
    ?>
    <label for="">No hay Registros</label>
    <a href="forminsertarproductos.php">Crear</a>

    <?php
    }
    ?>
</body>
</html>
<?php

    }else{
        header ("Location: http://localhost/independientes/proyecto/Login_v4/");
        exit(); 
    }
    ?>

