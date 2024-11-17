<?php
 require_once "../Modelos/Usuario.php";
 require_once "../clases/MySQL.php";
 require_once "../diseño/navar.php";
 if(!isset($_SESSION["nombre"])&& $_SESSION["roles"]!="admin"){
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
    <title>Actualizar Usuarios</title>
</head>
<body>
    
    <form action="../controladores/ActualizarUsuarios.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <label for="">Nombre</label>
        <input type="text" name="nombre" id="" value="<?php echo $usuario->getNombre(); ?>"required>

        <label for="">Correo</label>
        <input type="email" name="correo" id="" value="<?php echo $usuario->getCorreo(); ?>"required>

        <label for="">Contraseña</label>
        <input type="password" name="contra" id="" value="<?php echo $usuario->getContra(); ?>"required>
        <label for="">Tipo de usuario</label>
        <select name="rol" id="" required>
         <option value="admin">Admin</option>
         <option value="usuario">Usuario</option>
        </select>
        <button type="submit">Cambiar</button>

    </form>
    
</body>
</html>