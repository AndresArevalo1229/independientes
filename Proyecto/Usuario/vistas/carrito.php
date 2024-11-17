<?php

 require_once "../../modelos/Carritos.php";
 require_once "../../diseño/navarusuario.php";

 require_once "../../clases/MySQL.php";



 





    if(isset($_SESSION["nombre"])){
        
        

   
     //Se crea la instancia de la clase MySql
     $mysql = new MySql();
     //Se llama al metodo para obtener los productoss
     $carritos = $mysql->obteneridUsuarioCarrito($_SESSION["id"]);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
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
    if(count($carritos)){

    
    ?>
    <table class="table table-hover">
    <thead> <?php   echo "<div style='text-align: center;'>Carrito de " . $_SESSION["nombre"] . "</div>"; ?>
 
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">costo</th>
      <th scope="col">Imagen</th>
      <th scope="col"
      style="  ">Acciones
    </tr>
  </thead>
  <tbody>
  <?php
  $suma=0;
        foreach($carritos as $carrito){
            $targer_dir = "../../files_".$_SESSION["DB"]."/".$carrito->getImagen(); //carpeta de destino de archivo
            $suma += $carrito->getCosto();
            echo "<tr >
            <th scope='row'>".$carrito->getId()."</th>   
            <td>".$carrito->getProducto()."</td>   
            <td>".$carrito->getCosto()."</td>   
            <td><img src='".$targer_dir."' alt='hols'></td>   
            

            <td >
            <a href='../controladores/Eliminar.php?id=".$carrito->getId()."'class='btn btn-outline-warning' role='button'>Eliminar Carrito</a>
            </tr>"; 
        }
        $_SESSION["Total"]=$suma;
        ?>
        <tr>
        <style>
    
</style>
            <td colspan="6" style="text-align: center;  width: 200px;" >
            <a  href="../controladores/Comprar.php" class="btn btn-outline-success" role="button"
            style="text-align: center;  width: 200px;">Comprar</a>
            <h1>
            <h1>Total: $<?php echo $_SESSION["Total"]; ?></h1>
            
            </td>

        </tr>

  </tbody>
  </table>

   
    <?php
    }else{

    
    ?>
    <label for="">No hay productos agregados al carrito</label>
    <a href="../index.php">productos</a>

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

