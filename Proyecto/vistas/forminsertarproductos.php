<?php
 require_once "../Modelos/Categorias.php";
 require_once "../diseño/navar.php";

 require_once "../clases/MySQL.php";
 //Se crea la instancia de la clase MySql
 $mysql = new MySql();
 //Se llama al metodo para obtener los categorias
 $categorias = $mysql->obtenerCategorias();



 if(!isset($_SESSION["nombre"])&& $_SESSION["roles"]!="admin"){
    header("Location: http://localhost/independientes/proyecto/Login_v4/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar productos</title>
</head>
<style>
   body {

    background-image: url('https://img.freepik.com/foto-gratis/vista-superior-tortilla-mexicana-espacio-copia_23-2148614430.jpg');
        background-size: cover;
        background-position: center;
        
        }

        form {

            background-color: rgba(255, 255, 255, 0.8); /* Agrega un fondo semi-transparente al formulario */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 800px; /* Ancho del contenedor del formulario */
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
        .no-categorias {
        text-align: center;
        margin-top: 0px;
        background-color: #fff; /* Agrega un fondo blanco */
        
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: autos;
    }

    .no-categorias a {
        color: #4caf50;
        text-decoration: none;
    }

    .no-categorias a:hover {
        text-decoration: underline;
    }
  </style>
<body>
    <?php
    if (count($categorias)) {


        ?>
       
        <form action="../controladores/insertarproductos.php" 
        enctype="multipart/form-data" method="post">
            <label for="producto">Nombre del producto:</label>
            <input type="text" name="producto" id="producto" required>
            
            <label for="precio">Precio:</label>
            <input type="number" name="Precio" id="" required>

            <label for="categoria">Categoría:</label>
            <select class="form-select" aria-label="Default select example" name="categoria" id="categoria"
                style="height: 50px;"required>
                <option value="" disabled selected>Selecciona una categoría</option>

                <?php
                foreach($categorias as $categoria){
                    echo "
                    <option value=".$categoria->getCategoria().">".$categoria->getCategoria()."</option>  
                   "; 
                }

        ?>
               
            </select>
            <label for="precio">Imagen:</label>

            <input type="file" name="imagen" id="imagen"required>

            <button type="submit">Guardar</button>
        </form>

        <!-- -->
        <?php

    } else {


        ?>
       <div class="no-categorias">
            <p>No tienes datos de categorías. Debes tener al menos una categoría para agregar productos.</p>
            <a href="forminsertarCategoria.php">Agregar categorías</a>
        </div>
        

        <?php
    }
    ?>
</body>

</html>