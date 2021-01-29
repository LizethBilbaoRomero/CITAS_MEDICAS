<?php
require_once "login.php";
require_once "funciones.php";

session_start();

if (count($_POST)>0) {
	$conexion = new mysqli($hn, $un, $pw, $db, $port);
	if ($conexion->connect_error) {
		die("Fatal Error");
	}

	$escuela = get_post($conexion, "escuela");
	$nombres = get_post($conexion, "nombres");
	$apellidos = get_post($conexion, "apellidos");
	$codigo = get_post($conexion, "codigo");
	$correo = get_post($conexion, "correo");
	$usuario = get_post($conexion, "usuario");
	$password = get_post($conexion, "password");
	$password = md5($password);

	$query = "INSERT INTO `usuario`(`perfil`, `escuela`, `nombres`, `apellidos`, `codigo`, `correo`, `usuario`, `password`) 
	VALUES (2, '$escuela', '$nombres', '$apellidos', '$codigo', '$correo', '$usuario', '$password')";
	$result = $conexion->query($query);
	if ($result) {
		echo "<script>alert('se creó')</script>";
	}else{
		echo "<script>alert('falló')</script>";
	}
}

?>
<!doctype html>
<html lang='es'>

<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0'>
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col col-12">
				<h1>Registrarme</h1>
			</div>
			<div class="col col-12">
				<div class="card">
					<div class="card-body">
						<form action="registro.php" method="post">
							<div class="form-group">
								<label for="escuelaprofesional">Escuela Profesional</label>
								<select class="form-control" id="escuelaprofesional" name="escuela">
									<option value="EPIS">EPIS</option>
									<option value="EPIA">EPIA</option>
									<option value="EPIAM">EPIAM</option>
									<option value="EPAE">EPAE</option>
									<option value="EPIPE">EPIPE</option>
									<option value="EPC">EPC</option>
								</select>
							</div>
							<div class="form-group">
								<label for="nombre">Nombres</label>
								<input type="text" class="form-control" id="nombre" name="nombres">
							</div>
							<div class="form-group">
								<label for="apellido">Apellidos</label>
								<input type="text" class="form-control" id="apellido" name="apellidos">
							</div>
							<div class="form-group">
								<label for="codigo">Código</label>
								<input type="text" class="form-control" id="codigo" name="codigo">
							</div>
							<div class="form-group">
								<label for="correo">Correo</label>
								<input type="email" class="form-control" id="correo" name="correo">
							</div>
							<div class="form-group">
								<label for="usuario">Usuario</label>
								<input type="text" class="form-control" id="usuario" name="usuario">
							</div>
							<div class="form-group">
								<label for="pass">Password</label>
								<input type="password" class="form-control" id="pass" name="password">
							</div>
							<button type="submit" class="btn btn-primary">Registrarme</button>

						</form>
					</div>
					<div class="card-footer">
						<p>¿Ya tienes una cuenta? <a href="index.php">Iniciar Sesión</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>