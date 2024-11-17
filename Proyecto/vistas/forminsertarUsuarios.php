<?php
    session_start();
    require_once "../diseño/navar.php";

    if(!isset($_SESSION["nombre"])&& $_SESSION["roles"]!="admin"){
        header ("Location: http://localhost/independientes/proyecto/Login_v4/");
        exit(); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuarios</title>
</head>
<body>
    <form action="../controladores/insertarUsuarios.php" method="post">
    <label for="">Nombre</label>
        <input type="text" name="nombre" id=""required>

        <label for="">Correo</label>
        <input type="email" name="correo" id=""required>

        <label for="">Contraseña</label>
        <input type="password" name="contra" id=""required>
        <label for="">Tipo de usuario</label>
        <select name="rol" id="" required>
         <option value="admin">Admin</option>
         <option value="usuario">Usuario</option>
        </select>
        <button type="submit">Guardar</button>

    </form>
    
</body>
</html>