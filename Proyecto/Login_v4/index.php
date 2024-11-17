


<?php
require_once "../modelos/Usuario.php";
require_once "../clases/mySQL.php";
if(isset($_POST)){

	if(isset($_POST["gmail"]) && isset($_POST["contra"])){
		$_SESSION['DB'] =$_POST["DB"];

		$gmail =$_POST["gmail"];
		$contra =$_POST["contra"];

		$mysql=new MySql();

        $usuario = $mysql->iniciarseccion($gmail);


		if($usuario == null){
			echo "<script>alert('Error: El correo electrónico no existe');</script>";
			session_destroy();
			echo "<script>window.location.href = 'http://localhost/independientes/proyecto/vistas';</script>";
			exit(); 

			
		 
        }
		$contraseñaReal=$usuario->getContra();
		session_start();
		if($contra==$contraseñaReal){
			
			$_SESSION["id"]=$usuario->getId();
			$_SESSION["nombre"]=$usuario->getNombre();
			$_SESSION["correo"]=$gmail;
			$_SESSION["contra"]=$contra;
			$_SESSION["roles"]=$usuario->getRoles();
			if($_SESSION["roles"]=="admin"){
				header("Location: http://localhost/independientes/proyecto/vistas");

			}else{

				header("Location: ../Usuario/");

			}

		}else{
			session_destroy();

			echo "<script>alert('Error: La contraseña es incorrecta');</script>";
            echo "<script>window.location.href = 'http://localhost/independientes/proyecto/vistas';</script>";
			exit(); 
		}
	}


}
/*
if($_POST){
    session_start();
    if($_POST["correo"]=="hola@hola.com" && $_POST["contra"]=="1234"){

         $_SESSION["correo"]=$_POST["correo"];
    }
   

}
  */  
   // $_SESSION

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.JPG');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form"  method="post">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Correo</span>
						<input class="input100" type="text" name="gmail" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="contra" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" >

					<select name="DB" id="" required>
                    <option value="" disabled selected>Selecciona una Surcusal</option>

                    <option value="im_delice_GDL">Guadalajara</option>
                    <option value="im_delice_TLQ">Tlaquepaque</option>
                    </select>
					</div>

					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn"  type="submit">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							no tienes cuenta?
						</span>

						<a href="../register" class="txt2">
							Registrar
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>