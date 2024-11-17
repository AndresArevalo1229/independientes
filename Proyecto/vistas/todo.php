<?php
 require_once "../modelos/Usuario.php";
 require_once "../diseño/navar.php";

 require_once "../clases/mySQL.php";


 

    if(isset($_POST)){
        if(isset($_POST["DB"])){
            $_SESSION['DB'] =$_POST["DB"];
            
    
        }
    
    }
    if(isset($_SESSION['DB'])){
        $db=$_SESSION['DB'];

    }else{  $db="im_delice_GDL";}



    if(isset($_SESSION["nombre"])&& $_SESSION["roles"]=="admin"){
        

   
     //Se crea la instancia de la clase MySql
     $mysql = new MySql();
     //Se llama al metodo para obtener los usuarios
     $usuarios = $mysql->obtenerUsuariosdelosdos();
     $usuarios2 = $mysql->obtenerUsuariosdelosdos2();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>
</head>
<script>
     function confirmarEliminacion(idUsuario) {
        if(confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            // Si el usuario confirma la eliminación, redireccionar a la página que maneja la eliminación
            window.location.href = '../controladores/EliminarUsuarios.php?id=' + idUsuario;
        }
    }
</script>
<body>
    <?php
//include transactions
//$jsonInsert='"username": "evesmax","email":"andres.arevalonavarro@gmail.com", "date":"'.date('Y-m-d H:i:s').'", "secction": "index.php" ';
//require "../clases/transactions.php";

    if(count($usuarios)){

    
    ?>
    <table class="table table-hover">
        <thead >   <?php   echo "<div style='text-align: center;'>Bienvenido " . $_SESSION["nombre"] . "</div>"; ?>
        <?php   echo "<div style='text-align: center;'>Base de Datos: " . $db . "</div>"; ?>
        <div style='text-align: center;'>
   
                    </div>  
        <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Contra</th>
                <th scope="col">Roless</th>
                
               
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($usuarios as $usuario){
            echo "<tr>
            <th scope='row'>".$usuario->getId()."</td>   
            <td>".$usuario->getNombre()."</td>   
            <td>".$usuario->getCorreo()."</td>   
            <td>".$usuario->getContra()."</td>   
            <td>".$usuario->getRoles()."</td>  
 
           </tr>"; 
        }
        foreach($usuarios2 as $usuario){
            echo "<tr>
            <th scope='row'>".$usuario->getId()."</td>   
            <td>".$usuario->getNombre()."</td>   
            <td>".$usuario->getCorreo()."</td>   
            <td>".$usuario->getContra()."</td>   
            <td>".$usuario->getRoles()."</td>  
 
           </tr>"; 
        }
        ?>
                        <td colspan="7" style="text-align: center;  width: 200px;">
                        <a href='forminsertarUsuarios.php?' class="btn btn-outline-success" role="button"
                        style="text-align: center;  width: 300px;">Crear</a></td>

        </tbody>
    </table>
    <?php

    }else{

    
    ?>
    <label for="">No hay Registros</label>
    <a href="forminsertarUsuarios.php">Crear</a>
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

