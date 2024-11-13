<?php

require_once "../modelos/compras.php";
require_once "../diseño/navar.php";
require_once "../modelos/Producto.php";
require_once "../modelos/Usuario.php";

require_once "../clases/MySQL.php";









if (isset($_SESSION["nombre"])) {




    //Se crea la instancia de la clase MySql
    $mysql = new MySql();
    //Se llama al metodo para obtener los productoss
    $compras = $mysql->obtenerCompras();
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
        if (count($compras)) {
                  
            ?>

<table class="table table-hover">
    
    <thead> <?php   echo "<div style='text-align: center;'>Compras de " . $_SESSION["nombre"] . "</div>"; ?>
 <tr>
 <th scope="col">#</th>
 <th scope="col">Usuario
 </th>
 <th scope="col">correo
 </th>
      <th scope="col">Producto</th>
      <th scope="col">costo</th>
      <th scope="col">Imagen</th>
      <th scope="col"
      style="  ">fecha
    </tr>
  </thead>
  <tbody>
  <?php
  $suma=0;
        foreach($compras as $compra){
            $producto = $mysql->obteneridProducto($compra->getidProducto());
            $usuario = $mysql->obteneridUsuarios($compra->getUsuario());

            $targer_dir = "../files_".$_SESSION["DB"]."/".$producto->getImagen(); //carpeta de destino de archivo
            $suma += $producto->getprecio();
            echo "<tr >
            <th scope='row'>".$compra->getId()."</th> 
            <td>".$usuario->getNombre()."</td>   
            <td>".$usuario->getCorreo()."</td>   
  
            <td>".$producto->getProducto()."</td>   
            <td>".$producto->getprecio()."</td>   
            <td><img src='".$targer_dir."' alt='hols'></td>   
            <td>".$compra->getFecha()."</td>   


            </tr>"; 
        }
        $_SESSION["Total"]=$suma;
        ?>
        <tr>
        <style>
    
</style>
            <td colspan="6" style="text-align: center;  width: 200px;" >
            
            <h1>Total: $<?php echo $_SESSION["Total"]; ?></h1>
            
            </td>

        </tr>

  </tbody>
  </table>

            <?php
        } else {


            ?>
            <label for="">No hay compras </label>
            <a href="index.php">Inicio</a>

            <?php
        }
        ?>
    </body>

    </html>
    <?php

} else {
    header("Location: http://localhost/independientes/proyecto/Login_v4/");
    exit();
}
?>