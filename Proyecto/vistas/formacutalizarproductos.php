<?php
    require_once "../Modelos/Producto.php";
    require_once "../clases/MySQL.php";
    require_once "../diseño/navar.php";
    require_once "../Modelos/Categorias.php";

    if(!isset($_SESSION["nombre"])&& $_SESSION["roles"]!="admin"){
        header ("Location: http://localhost/independientes/proyecto/Login_v4/");
            exit(); 
        }
if(isset($_GET)){
    if(isset($_GET["id"])){
        $id =$_GET["id"];
        $mysql=new MySql();
        $producto = $mysql->obteneridProducto($id);
        $categorias = $mysql->obtenerCategorias();

        if($producto == null){
            header("Location: productos.php");
        }

    }

}

  
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar producto</title>
</head>
<style>
     body {

background-image: url('https://img.freepik.com/foto-gratis/vista-superior-tortilla-mexicana-espacio-copia_23-2148614430.jpg');
    background-size: cover;
    background-position: center;
    
    }

    form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            font-family: Arial, sans-serif;
            margin: auto;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

</style>
<body>
    
    <form action="../controladores/ActualizarProductos.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="imagen" value="<?php echo $producto->getImagen(); ?>">

    <label for="">Nombre del producto</label>
        <input type="text" name="producto" id="" value="<?php echo $producto->getProducto(); ?>"required>

       
        <label for="">Precio</label>
        <input type="number" name="Precio" id="" value="<?php echo $producto->getprecio(); ?>"required>
        <label for="">Categoria</label>

        <select class="form-select" aria-label="Default select example" name="categoria" id="categoria"
                style="height: 50px;"required>
                <option value="" disabled selected> <?php echo $producto->getCategoria()?></option>

                <?php
                foreach($categorias as $categoria){
                    echo "
                    <option value=".$categoria->getCategoria().">".$categoria->getCategoria()."</option>  
                   "; 
                }

        ?>
               
            </select>


       
        <button type="submit">Cambiar</button>

    </form>
    
</body>
</html>