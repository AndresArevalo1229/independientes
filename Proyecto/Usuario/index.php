<?php

 require_once "../Modelos/Producto.php";
 require_once "../diseño/navarusuario.php";

 require_once "../clases/MySQL.php";



 





    if(isset($_SESSION["nombre"])){
        
        

   
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
    <div style='text-align: center;'>
                    <select name="DB" id="" required>
                    <option value="" disabled selected>Ordenar por</option>

                    <option value=""><a href="">Categorias</a> </option>
                    <option value="">Mayor precio a menor</option>
                    <option value="">Menor a Mayor precio</option>
                    </select>
                    
                    </div>
    
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
            <a href='./controladores/agregarCarrito.php?id=".$producto->getId()."'class='btn btn-outline-warning' role='button'>Agregar Carrito</a>
            </tr>"; 
        }
        ?>
        <tr>
        <style>
    
</style>
      
        </tr>

  </tbody>
  </table>

   
    <?php
    }else{

    
    ?>
    <label for="">No hay Registros de productos</label>

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

