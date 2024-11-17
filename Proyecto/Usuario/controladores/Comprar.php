<?php
require_once "../../modelos/Carritos.php";
require_once "../../modelos/compras.php";
require_once "../../clases/MySQL.php";
require_once "../../modelos/Producto.php";


$mysql = new MySql();
$carritos = $mysql->obteneridUsuarioCarrito($_SESSION["id"]);
setlocale(LC_TIME, 'es_MX.UTF-8'); // Establecer la configuración regional para español mexicano

$fecha_actual = strftime("%Y-%m-%d"); // Formatear la fecha en formato mexicano
if ($carritos == null) {
    header("Location: ../index.php");
}
foreach ($carritos as $carrito) {
    $compras = new Compras(
        0,
        $carrito->getidProducto(),

        $carrito->getUsuario(),
        $fecha_actual
    );


    $mysql->InsertarCrompras($compras);
    $borrar= new Carrito($carrito->getId(),null,null,null,null,null);

    $mysql->borrarCarrito($borrar);
    echo '<script>alert("Compradp :)");</script>';
    echo '<script>window.location.href = "../index.php";</script>';


}






//creamos la tabla carritp


//usuario id









?>