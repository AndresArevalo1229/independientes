<?php
 require_once "../diseño/navar.php";

 require_once "../Modelos/Usuario.php";
 require_once "../clases/MySQL.php";
 if(!isset($_SESSION["nombre"])){
    header ("Location: http://localhost/independientes/proyecto/Login_v4/");
        exit(); 
    }
 if(isset($_GET)){
    if(isset($_GET["id"])){
        $id =$_GET["id"];
        $mysql=new MySql();
        $usuario = $mysql->obteneridUsuarios($id);

        if($usuario == null){
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
    <title>ver usuario</title>
</head>
    
<body>
    
    <table >
        <thead >   
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contra</th>
                <th>Roless</th>
                <th></th>
                <th></th>
                   
            </tr>
        </thead>
        <tbody>
        <?php
            echo "<tr>
            <td>". $id."</td>   
            <td>".$usuario->getNombre()."</td>   
            <td>".$usuario->getCorreo()."</td>   
            <td>".$usuario->getContra()."</td>   
            <td>".$usuario->getRoles()."</td>   
            </tr>"; 
        
        ?>
       
    </table>
    
   
    
    

       
        <a href="index.php">regresar</a>
    
</body>
</html>