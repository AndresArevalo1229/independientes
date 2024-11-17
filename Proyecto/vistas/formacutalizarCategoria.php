<?php
    require_once "../Modelos/Categorias.php";
    require_once "../clases/MySQL.php";
    require_once "../diseño/navar.php";

if(isset($_GET)){
    if(isset($_GET["id"])){
        $id =$_GET["id"];
        $mysql=new MySql();
        $categoria = $mysql->obteneridCategoria($id);

        if($categoria == null){
            header("Location: categorias.php");
        }

    }

}


if(isset($_SESSION["nombre"])&& $_SESSION["roles"]=="admin"){

}else{
    header ("Location: http://localhost/independientes/proyecto/Login_v4/");
    exit(); 
}

    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Categorias</title>
</head>
<body>
    
    <form action="../controladores/ActualizarCategorias.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

   
        <label for="">Nombre de Categoria</label>
        <input type="" name="categoria" id="" value="<?php echo $categoria->getCategoria(); ?>"required>

        <label for="">descripcion</label>
        <input type="" name="descripcion" id="" value="<?php echo $categoria->getDescripcion(); ?>"required>
       
        <button type="submit">Cambiar</button>

    </form>
    
</body>
</html>