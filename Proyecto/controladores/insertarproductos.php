<?php
    session_start();

    require_once "../Modelos/Producto.php";

 require_once "../clases/MySQL.php";
if($_POST){
    if(isset($_POST["producto"]) && isset($_POST["categoria"]) && isset($_POST["Precio"]) ){
        if (isset ($_FILES['imagen']['name'])) {
            if (($_FILES['imagen']['name'] != "")) {
                $targer_dir = "../files_".$_SESSION["DB"]."/"; //carpeta de destino de archivo
                $file = $_FILES["imagen"]["name"];//obtener el nombre original del archivo
                $path = pathinfo($file);
                // print_r($path);
                $filename = $path['filename'];//obtenemos el nombre del archivo

                $ext = $path['extension'];//obtenemos la extension del archivo
                $temp_name = $_FILES["imagen"]["tmp_name"];//
                $completo= $filename . '.' . $ext;
                echo $completo;

                $path_filename_ext = $targer_dir . $filename . '.' . $ext; //donde se va a almacenar el archivo
                echo $path_filename_ext;
                if (file_exists($path_filename_ext)) {//valida si el archivo existe
                     echo "<script>alert('Error: ya esta registrado este imagen');</script>";
                    echo "<script>window.location.href = 'http://localhost/independientes/proyecto/vistas/productos.php';</script>";
			
                } else {//si eno existe al archivo lo mueve a la carpeta que le indiquemos
                    move_uploaded_file($temp_name, $path_filename_ext);
                    echo "el archivo se guardo correctamente";
                    ?>
                    <img src="<?php echo $path_filename_ext; ?>" alt="hols">
                    <?php
                    $producto= new Producto(0,$_POST["producto"],$_POST["categoria"],$_POST["Precio"],$completo);
 
                    $mysql=new MySql();
                    if($mysql->InsertarProducto($producto))
                    echo "Producto creado correctamente";
                    header("Location: http://localhost/independientes/proyecto/vistas/productos.php");
                   
                }
            } else {
                echo "esta sin subir el archivo";
            }
        } else {
        }
 
}else{
    echo "datos invalidos   ";
    echo $_POST["producto"];
    echo $_POST["categoria"];
    echo $_POST["Precio"];

}
}else{
    header("Location: http://localhost/independientes/proyecto/vistas/productos.php");
}
?>