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
    <title>Insertar Categoria</title>
</head>
<body>
    <form action="../controladores/insertarCategorias.php" method="post">
    <label for="">Nombre del la categorias</label>
        <input type="text" name="categoria" id=""required>
        
        <label for="">descripcion</label>
        <input type="" name="descripcion" id=""required>

        <button type="submit">Guardar</button>

    </form>
    
</body>
</html>