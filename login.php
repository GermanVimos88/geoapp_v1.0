<?php

	require ("Conexion.php");
	



				/*$dsn = 'mysql:dbname=ejemplo;host=127.0.0.1';
				$user = 'admin';
				$contraseña = '';

				try {
    				$gbd = new PDO($dsn, $user, $contraseña);
    				session_start();
				


				} catch (PDOException $e) {
    				echo 'Falló la conexión: ' . $e->getMessage();
				}*/




session_start();

//include ("actividadUsuario.php");
	

	if(isset($_SESSION["id_usuario"])){

		header("Location: index.php");
	}

	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		$error = '';
		
		//$sha1_pass = sha1($password);  //hash de la contraseña (encriptado)
		
		$sql = "SELECT usr_codigo_usuario, usr_tipo  FROM datos WHERE usr_usuario = '$usuario' AND usr_password = '$password'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['usr_codigo_usuario'];
			$_SESSION['tipo_usuario'] = $row['usr_tipo'];
			$_SESSION['usuario'] = $usuario;
			header("location: index.php");  //formulario informes
			//$log = new actividadUsuario();
            //		$log->registro_actividad($_SESSION['usuario'],'Ingresó al sistema',' ',' ');
			} else {
			$error = "El nombre o contraseña son incorrectos";
			}
	}







?>

<html>
	<head>


		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/custom.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




		<title>LogIn</title>
	</head>
	
	<body>
			<center>
				<h1><b>Sistema de información catastral y cartográfica</b></h1>
				
				<h2>GAD CUYUJA</h2>
				<br>
				<br>
		<h3>Iniciar sesión</h3>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
			<div><label>Usuario:</label><input id="usuario" name="usuario" type="text" ></div>
			<br />
			<div><label>Password:</label><input id="password" name="password" type="password"></div>
			<br />
			<div><input name="login" type="submit" value="login"></div> 
		</form> 
		
		<br />
		
		<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
	</body>
</html>
