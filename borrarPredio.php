<?php

		session_start();

		$id_prd=($_GET['id']);


		include ("database.php");
        include ("actividadUsuario.php");


        $predio= new Database();

        $res = $predio->borrar_predio($id_prd);

        if($res){
						$message= "Datos eliminados con éxito";
						$class="alert alert-success";
            			$log = new actividadUsuario();
            			$log->registro_actividad($_SESSION['usuario'],'Eliminación Predio:',' ',$id_prd);


					}else{
						$message="No se pudieron eliminar los datos";
						$class="alert alert-danger";
					}


		 
			//header('Location:buscarPredio.php');			

?>

