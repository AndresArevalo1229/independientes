<?php
 require_once "../Modelos/Categorias.php";
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
     //Se llama al metodo para obtener los categorias
     $categorias = $mysql->obtenerCategorias();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorias</title>
</head>
<script>
     function confirmarEliminacion(idCategoria) {
        if(confirm('¿Estás seguro de que deseas eliminar esta Categoria?')) {
            // Si el Categoria confirma la eliminación, redireccionar a la página que maneja la eliminación
            window.location.href = '../controladores/EliminarCategorias.php?id=' + idCategoria;
        }
    }
</script>
<body>
    <?php
    if(count($categorias)){

    
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
      <th scope="col">categoria</th>
      <th scope="col">descripcion</th>
      <th scope="col"
      style="  ">Acciones
    </tr>
  </thead>
  <tbody>
  <?php
        foreach($categorias as $categoria){
            echo "<tr >
            <th scope='row'>".$categoria->getId()."</th>   
            <td>".$categoria->getCategoria()."</td>   
            <td>".$categoria->getDescripcion()."</td>   

            <td >
            <a href='formacutalizarCategoria.php?id=".$categoria->getId()."'class='btn btn-outline-warning' role='button'>Actualizar</a>
            <a href='VerCategorias.php?id=".$categoria->getId()."'class='btn btn-outline-info' role='button'>Ver</a>
            <a href='#' onclick='confirmarEliminacion(".$categoria->getId().")'class='btn btn-outline-danger' role='button'>Borrar</a></td>
            </tr>"; 
        }
        ?>
        <tr>
        <style>
    
</style>
            <td colspan="6" style="text-align: center;  width: 200px;" >
            <a  href="forminsertarCategoria.php" class="btn btn-outline-success" role="button"
            style="text-align: center;  width: 200px;">crear</a>

            </td>

        </tr>

  </tbody>
  </table>

   
    <?php
    }else{

    
    ?>
    <label for="">No hay Registros</label>
    <a href="forminsertarCategoria.php">Crear</a>

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

