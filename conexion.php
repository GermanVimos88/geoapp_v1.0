<?php 
		



		

		$usuario = "root"; //CAMBIAR
		$contraseña = "root"; //CAMBIAR

		//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
				$mysqli=new mysqli("localhost",$usuario,$contraseña,"usuarios"); 
	
			if(mysqli_connect_errno()){
			echo 'Conexion Fallida : ', mysqli_connect_error();
			exit();
			}
				
			 
			
?>