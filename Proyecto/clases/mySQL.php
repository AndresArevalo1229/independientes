<?php
 session_start();
class MySql{
    
    public $_connection;
    public $_connection2;
    public $_connection3;
    function __construct(){
       
        if(isset($_SESSION["DB"])){
            $this->_connection = mysqli_connect("localhost","root","",$_SESSION['DB'],3308);
            if(!$this->_connection)
                echo "<script>alert('Sin éxito en la conexión');</script>";
    
        }else{
            $this->_connection = mysqli_connect("localhost","root","","im_delice_gdl",3308);
            if(!$this->_connection)
                echo "<script>alert('Sin éxito en la conexión');</script>";
        }
        $this->_connection2 = mysqli_connect("localhost","root","","im_delice_gdl",3308);
            if(!$this->_connection2)
                echo "<script>alert('Sin éxito en la conexión');</script>";
        $this->_connection3 = mysqli_connect("localhost","root","","im_delice_tlq",3308);
             if(!$this->_connection3)
             echo "<script>alert('Sin éxito en la conexión');</script>";
    
       
    }
    

//----------------------------------------SECCION...................................................
    /**
     * Metodo para obtener un id de ususario
     */
    function iniciarseccion($gmail){

        $usuarios= null;

        $res = mysqli_query($this->_connection, "SELECT * FROM usuarios WHERE correo='$gmail'");


        
        if(mysqli_num_rows($res)){
            $data=mysqli_fetch_array($res);
            $usuarios = new Usuario ($data["id"],$data["nombre"],$data["correo"],$data["contra"],$data["roles"]);
        }
        return $usuarios;
    }








//------.....USUARIOS.................................-------------------------------------------------------------
/**
     * Metodo para obtener un arreglo de usuarios de los dos
     */

     function obtenerUsuariosdelosdos(){
        $usuarios = [];
        $res = mysqli_query($this->_connection2,"SELECT * FROM usuarios");
        $array = mysqli_fetch_all($res,MYSQLI_BOTH);
        echo "<br/><br/><br/><br/>";

        foreach ($array as $row) {
       //     print_r($row);    


            $usuarios[] = new Usuario(
                $row['id'],
                $row['nombre'],
                $row['correo'],
                $row['contra'],
                $row['roles']
            );
        }
        return $usuarios;
    }
    function obtenerUsuariosdelosdos2(){
        $usuarios = [];
        $res = mysqli_query($this->_connection3,"SELECT * FROM usuarios");
        $array = mysqli_fetch_all($res,MYSQLI_BOTH);
        echo "<br/><br/><br/><br/>";

        foreach ($array as $row) {
       //     print_r($row);    


            $usuarios[] = new Usuario(
                $row['id'],
                $row['nombre'],
                $row['correo'],
                $row['contra'],
                $row['roles']
            );
        }
        return $usuarios;
    }



/**
     * Metodo para obtener un arreglo de usuarios
     */

    function obtenerUsuarios(){
        $usuarios = [];
        $res = mysqli_query($this->_connection,"SELECT * FROM usuarios");
        $array = mysqli_fetch_all($res,MYSQLI_BOTH);
        echo "<br/><br/><br/><br/>";

        foreach ($array as $row) {
       //     print_r($row);    


            $usuarios[] = new Usuario(
                $row['id'],
                $row['nombre'],
                $row['correo'],
                $row['contra'],
                $row['roles']
            );
        }
        return $usuarios;
    }


    /*Metodo para insertar un usuario nuevo*/
    function InsertarUsuario(Usuario $usuario){

      $id=-1;
        if($usuario){
          $res=mysqli_query($this->_connection,"INSERT INTO usuarios (nombre,correo,contra,roles)
            VALUES ('".$usuario->getNombre()."','".$usuario->getCorreo()."','".$usuario->getContra()."','".$usuario->getRoles()."')");

            if($res){// este significa que obtiene el id que se inserto el sql de sqwi
  //              arriba de q es de usuario 

                  $id=mysqli_insert_id($this->_connection);
              }
          }
          return $id;
  
      }




      /**
     * Metodo para obtener un id de ususario
     */
    function obteneridUsuarios($id){

        $usuarios= null;
        $res = mysqli_query($this->_connection, "SELECT * FROM usuarios WHERE id=$id");
        if(mysqli_num_rows($res)){
            $data=mysqli_fetch_array($res);
            $usuarios = new Usuario ($data["id"],$data["nombre"],$data["correo"],$data["contra"],$data["roles"]);
        }
        return $usuarios;
    }



     /*
     
        Metodo para cambiar un usuario */

    function actualizarUsuario(Usuario $usuario){
        $res=false;

        if($usuario->getId()){

            $query="UPDATE usuarios SET  nombre= '".$usuario->getNombre()."',".
            "correo='".$usuario->getCorreo()."',".
            "contra='".$usuario->getContra()."',".
            "roles='".$usuario->getRoles()."' WHERE id=".$usuario->getId();
            $res=mysqli_query($this->_connection,$query);

            
        }
        return $res;
       
    }


   
     
       /*  Metodo para eliminar un usuario nuevo*/
        function borrarUsuario(Usuario $usuario){
            $res=false;
            
            if($usuario->getId()){
                $query="DELETE FROM usuarios WHERE id=".$usuario->getId();
                $res=mysqli_query($this->_connection,$query);
                
                
            }else{
                echo "no";
            }
            return $res;
           
        }






//-------PRODUCTOS----------------------------------------------------------------------------------
        function obtenerProducto(){
            $productos = [];
            $res = mysqli_query($this->_connection,"SELECT * FROM productos");
            $array = mysqli_fetch_all($res,MYSQLI_BOTH);
            echo "<br/><br/><br/><br/>";
    
            foreach ($array as $row) {
           //     print_r($row);    
    
    
                $productos[] = new Producto(
                    $row['id'],
                    $row['Producto'],
                    $row['categoria'],
                    $row['precio'],
                    $row['imagen']
                );
            }
            return $productos;
        }




         /*Metodo para insertar un Producto nuevo*/
    function InsertarProducto(Producto $producto){
        $id=-1;
          if($producto){
            $res=mysqli_query($this->_connection,"INSERT INTO productos (Producto,categoria,precio,imagen)
              VALUES ('".$producto->getProducto()."','".$producto->getcategoria()."','".$producto->getprecio()."'
              ,'".$producto->getImagen()."')");
              if($res){// este significa que obtiene el id que se inserto el sql de sqwi
    //              arriba de q es de usuario 
                    $id=mysqli_insert_id($this->_connection);
                }
            }
            return $id;
    
        }



         /**
     * Metodo para obtener un id de Producto
     */
    function obteneridProducto($id){

        $productos= null;
        $res = mysqli_query($this->_connection, "SELECT * FROM productos WHERE id=$id");
        if(mysqli_num_rows($res)){
            $data=mysqli_fetch_array($res);
            $productos = new Producto ($data["id"],$data["Producto"],$data["categoria"],$data["precio"],$data["imagen"]);
        }
        return $productos;
    }


  /*
     
        Metodo para cambiar un producto */

        function actualizarProducto(Producto $producto){
            $res=false;
    
            if($producto->getId()){
    
                $query="UPDATE productos SET  Producto= '".$producto->getProducto()."',".
                "categoria='".$producto->getcategoria()."',".
                "precio='".$producto->getprecio()."'WHERE id=".$producto->getId();
                $res=mysqli_query($this->_connection,$query);
    
                
            }
            return $res;
           
        }



        /*  Metodo para eliminar un Producto nuevo*/
        function borrarProducto($id){
            $res=false;
            
            if($id){
                $query="DELETE FROM productos WHERE id=".$id;
                $res=mysqli_query($this->_connection,$query);
                
                
            }else{
                echo "no";
            }
            return $res;
           
        }

//-------------Categorias-----------------------------------------------------------
        //Metodo para obtener datos de la categorias
        function obtenerCategorias(){
            $categorias = [];
            $res = mysqli_query($this->_connection,"SELECT * FROM Categorias");
            $array = mysqli_fetch_all($res,MYSQLI_BOTH);
            echo "<br/><br/><br/><br/>";
    
            foreach ($array as $row) {
           //     print_r($row);    
    
    
                $categorias[] = new Categoria(
                    $row['id'],
                    $row['categoria'],
                    $row['descripcion']
                );
            }
            return $categorias;
        }


        // metodo para eliminar categorias
        function borrarCategoria(Categoria $categoria){
            $res=false;
            
            if($categoria->getId()){
                $query="DELETE FROM Categorias WHERE id=".$categoria->getId();
                $res=mysqli_query($this->_connection,$query);
                
                
            }else{
                echo "no";
            }
            return $res;
           
        }

        // metodo para insertar  una nueva categoria a la BD

        function InsertarCategorias(Categoria $categoria){
            $id=-1;
            if($categoria){
              $res=mysqli_query($this->_connection,"INSERT INTO Categorias (categoria,descripcion)
                VALUES ('".$categoria->getCategoria()."','".$categoria->getDescripcion()."')");
                if($res){// este significa que obtiene el id que se inserto el sql de sqwi
      //              arriba de q es de usuario 
                      $id=mysqli_insert_id($this->_connection);
                  }
              }
              return $id;
      
        }

          /**
     * Metodo para obtener un id de categorias
     */
    function obteneridCategoria($id){

        $categorias= null;
        $res = mysqli_query($this->_connection, "SELECT * FROM Categorias WHERE id=$id");
        if(mysqli_num_rows($res)){
            $data=mysqli_fetch_array($res);
            $categorias = new Categoria ($data["id"],$data["categoria"],$data["descripcion"]);
        }
        return $categorias;
    }


/*
     
        Metodo para cambiar un categoria */

        function actualizarCategoria(Categoria $categoria){
            $res=false;
    
            if($categoria->getId()){
    
                $query="UPDATE Categorias SET categoria= '".$categoria->getCategoria()."',".
                "descripcion='".$categoria->getDescripcion().
                "'WHERE id=".$categoria->getId();
                $res=mysqli_query($this->_connection,$query);
    
                
            }
            return $res;
           
        }


//--------------Carritos----------------------------------------------------------

    //----------AgregarCarrito------------------
    function InsertarCarrito(Carrito $carrito){
        $id=-1;
          if($carrito){
            $res=mysqli_query($this->_connection,"INSERT INTO carrito (id_producto,producto,id_usuario,costo,imagen)
              VALUES ('".$carrito->getidProducto()."','".$carrito->getProducto()."','".$carrito->getUsuario()."','".$carrito->getCosto()."'
              ,'".$carrito->getImagen()."')");
              if($res){// este significa que obtiene el id que se inserto el sql de sqwi
    //              arriba de q es de usuario 
                    $id=mysqli_insert_id($this->_connection);
                }
            }
            return $id;
    
        }


             /**
     * Metodo para obtener un id de usuario en carrito
     */
    function obteneridUsuarioCarrito($id){

        $carritos = [];

        $res = mysqli_query($this->_connection, "SELECT * FROM carrito WHERE id_usuario=$id");
        $array = mysqli_fetch_all($res,MYSQLI_BOTH);
        echo "<br/><br/><br/><br/>";

        foreach ($array as $row) {
       //     print_r($row);    


       $carritos[] = new Carrito (
        $row["id"],
        $row["id_producto"],
        $row["producto"],

        $row["id_usuario"],
        $row["costo"],
        $row["imagen"]);

        }
        
        
       
        return $carritos;
    }
//------------------Eliminar
    function borrarCarrito(Carrito $carrito){
        $res=false;
        
        if($carrito->getId()){
            $query="DELETE FROM carrito WHERE id=".$carrito->getId();
            $res=mysqli_query($this->_connection,$query);
            
            
        }else{
            echo "no";
        }
        return $res;
       
    }
    


//--------------COMPRAS----------------------------------------------------------

//     * Metodo para obtener  COMPRAS

function obtenerCompras(){

    $compras = [];

    $res = mysqli_query($this->_connection, "SELECT * FROM compras");
    $array = mysqli_fetch_all($res,MYSQLI_BOTH);
    echo "<br/><br/><br/><br/>";

    foreach ($array as $row) {
   //     print_r($row);    


   $compras[] = new Compras (
    $row["id"],
    $row["id_producto"],

    $row["id_usuario"],
    $row["fecha"]
   );

    }
    
    
   
    return $compras;
}
//     * Metodo para obtener un id de usuario en COMPRAS

function obteneridUsuarioCompras($id){

        $compras = [];

        $res = mysqli_query($this->_connection, "SELECT * FROM compras WHERE id_usuario=$id");
        $array = mysqli_fetch_all($res,MYSQLI_BOTH);
        echo "<br/><br/><br/><br/>";

        foreach ($array as $row) {
       //     print_r($row);    

 
       $compras[] = new Compras (
        $row["id"],
        $row["id_producto"],

        $row["id_usuario"],
        $row["fecha"]
       );

        }
        
        
       
        return $compras;
    }




     //----------AgregarCompras------------------
     function InsertarCrompras(Compras $compras){
        $id=-1;
          if($compras){
            $res=mysqli_query($this->_connection,"INSERT INTO compras (id_producto,id_usuario,fecha)
              VALUES ('".$compras->getidProducto()."','".$compras->getUsuario()."','".$compras->getFecha()."'
              )");
              if($res){// este significa que obtiene el id que se inserto el sql de sqwi
    //              arriba de q es de usuario 
                    $id=mysqli_insert_id($this->_connection);
                }
            }
            return $id;
    
        }


}