<?php
	
    session_start();

    if (isset($_GET['id'])){
		$id=intval($_GET['id']); //talvez funcione con inv_codigo_investigacion
	} else {
		header("location:VistaInvestigaciones.php");
	}

	//Falta controlar el inicio de sesión


 if($_POST['Salir']){ // cuando presiona el botón salir
    header('Location: index.php');
    //unset($_SESSION['id_usuario']); //destruye la sesión
      }



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Actualizar datos de Investigaciones</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Investigación</b></h2></div>
                    <div class="col-sm-4">
                        <a href="VistaInvestigaciones.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("database.php");
        include ("actividadUsuario.php");
        //include ("Log.php");
				$investigacion= new Database();
				
				if(isset($_POST) && !empty($_POST)){
					//$nombres = $investigacion->limpiar($_POST['nombres']);
					

					  //intval($_POST['id_inv']);

					  

            


            //$aviso=$investigacion->actualizar_path_ofimatica();    //Funcion para actualizar los nuevos paths de ofimatica con FAS1 al final
      //$avisomul= $investigacion->actualizar_path_multimedia(); //Funcion para actualizar los nuevos paths de multimedia con FAS1 al final

            $cod_inpc=utf8_decode($investigacion->limpiar($_POST["codigoinpc"]));
  					$cod_bibliografia = utf8_decode($investigacion->limpiar($_POST["codigosipce"]));
            $fase= intval($investigacion->limpiar($_POST["fase_inv"])); //fase de la investigación
            $inv_procedente = utf8_decode($investigacion->limpiar($_POST["investigacion_procedente"])); //investigación de la que procede la fase 1
  					

            date_default_timezone_set('America/Guayaquil');  
            $fecha_edicion=date('d/M/Y - g:ia');
            $editado = 'Si';
            $descripcion = utf8_decode($investigacion->limpiar($_POST["descripcion"]));
            $observacion = utf8_decode($investigacion->limpiar($_POST["observaciones"]));



            switch($_SESSION['usuario']){ 
    		
    		case 'usuario': $sistematizador = 20;
            
            break;

            }                           

					
					

					$res = $investigacion->actualizar_investigacion($cod_inpc,$cod_bibliografia,$fase,$inv_procedente,$titulo,$modalidad,$doc_ofi,$doc_mul,$doc_carto,$provincia,$canton,$regional,$autorizacion,$dia_inicio,$mes_inicio,$anio_inicio,$dia_fin,$mes_fin,$anio_fin,$estado,$restos,$calidad,$editado,$fecha_edicion,$tipo,$analisis,$descripcion,$observacion,$sistematizador,$id);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
						$log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización de investigación ','INV',$id);


					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_investigacion=$investigacion->registro_investigacion($id);
			?>
			<div class="row">
				<form method="post">  
				
        
				<div class="col-md-6">
          <br>
					<label>Codigo Investigación: </label> <td><b><?php echo utf8_encode($datos_investigacion->inv_codigo_final);?> </b></td>
					<br>
          <br>
					<label>Codigo INPC:</label>
					<input type="text" name="codigoinpc" id="codigoinpc" class='form-control' maxlength="100" value="<?php echo utf8_encode($datos_investigacion->inv_codigo_inpc);?>">
					<label>Codigo SIPCE:</label>
					<input type="text" name="codigosipce" id="codigosipce" class='form-control' maxlength="100" value="<?php echo utf8_encode($datos_investigacion->inv_codigo_bibliografia);?>">					
				
        <p>
            <tr>
              <br>
              <br>
            <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fase:</b></td>
            <td>
              <select id="fase_inv" name="fase_inv">
                <?php
                    echo '<option value="'.utf8_encode($datos_investigacion->inv_fase).'"selected>'.utf8_encode($datos_investigacion->inv_fase).'</option>';                                      
                ?> 
            <option value="">--------------</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            </select> </td>
          </tr>
            </p>



            <div class="col-md-12">
          <br>
          <label>Descripcion:</label>
          <textarea  name="descripcion" id="descripcion" class='form-control' maxlength="255" ><?php echo utf8_encode($datos_investigacion->inv_descripcion);?></textarea>
            </div>

          <div class="col-md-12">
          <br>
          <label>Observaciones:</label>
          <textarea  name="observaciones" id="observaciones" class='form-control' maxlength="255" ><?php echo utf8_encode($datos_investigacion->inv_observaciones);?></textarea>
          </div>




     	<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html> 