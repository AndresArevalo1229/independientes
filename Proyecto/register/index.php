<?php
require_once "../modelos/Usuario.php";
require_once "../clases/mySQL.php";
if (isset($_POST)) {

	if (isset($_POST["username"]) && isset($_POST["gmail"]) && isset($_POST["pass"])) {
		$rol = "usuario";
		$_SESSION['DB'] =$_POST["DB"];
		$usuario = new Usuario(0, $_POST["username"], $_POST["gmail"], $_POST["pass"], $rol);

		$mysql = new MySql();
		$evaluar = $mysql->iniciarseccion($_POST["gmail"]);


		if($evaluar != null){
			echo "<script>alert('Error: El correo electrónico ya esta registrado');</script>";
			session_destroy();
			echo "<script>window.location.href = 'http://localhost/independientes/proyecto/register/';</script>";
			exit(); 

			
		 
        }

		if ($mysql->InsertarUsuario($usuario)) {


			echo "<script>alert('Usuario ingresado correctamente inicia sesion');</script>";
			echo "<script>window.location.href ='http://localhost/independientes/proyecto/Login_v4';</script>";

		} else {
			
				echo "<script>alert('Error: ');</script>";
				echo "<script>window.location.href = 'http://localhost/independientes/proyecto/register';</script>";



			
		}

	} else {
		echo "<script>alert('Error: Datos invalidos);</script>";
	}
} else {

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Regitrate</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
				<!--AQUIIIIII-->
				<form class="login100-form validate-form" method="post" required>
					<span class="login100-form-title p-b-49">
						Registrate
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
						<span class="label-input100">Nombre de Usuario</span>
						<input class="input100" type="text" name="username" placeholder="Type your username" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
						<span class="label-input100">Correo</span>
						<input class="input100" type="email" name="gmail" placeholder="Type your username" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" >

					<select name="DB" id="" required>
                    <option value="" disabled selected>Selecciona una Surcusal</option>

                    <option value="im_delice_GDL">Guadalajara</option>
                    <option value="im_delice_TLQ">Tlaquepaque</option>
                    </select>
					</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Registrar
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						
						<a href="../Login_v4" class="txt2">
							Regresar
						</a>
					</div>

					<div class="flex-col-c p-t-155">
						

						
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