<?php
 require_once "../diseño/navar.php";

 require_once "../Modelos/Producto.php";
 require_once "../clases/MySQL.php";


 if(!isset($_SESSION["nombre"])&& $_SESSION["roles"]!="admin"){
    header ("Location: http://localhost/independientes/proyecto/Login_v4/");
        exit(); 
    }
 if(isset($_GET)){
    if(isset($_GET["id"])){
        $id =$_GET["id"];
        $mysql=new MySql();
        $producto = $mysql->obteneridProducto($id);

        if($producto == null){
            header("Location: index.php");
        }

    }

}

  
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver Producto</title>
</head>
    
<body>
    
    <table >
        <thead >   
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th></th>
                <th></th>
                   
            </tr>
        </thead>
        <tbody>
        <?php
            echo "<tr>
            <td>". $id."</td>   
            <td>".$producto->getProducto()."</td>   
            <td>".$producto->getcategoria()."</td>   
            <td>".$producto->getprecio()."</td>   

            </tr>"; 
        
        ?>
       
    </table>
    
   
    
    

       
        <a href="productos.php">regresar</a>
    
</body>
</html>