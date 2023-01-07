<?php
	
    session_start();

   $id_prd=($_GET['id']);
   $clave=($_GET['ref']);
   

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
<title>Ubicación Predio</title>
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

                    <div class="col-sm-8"><h2>Ubicación <b>Predio</b></h2></div>

                    <div class="col-sm-4">

                    	   <br>
                        <a href="buscarPredio.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                        
                        
                    </div>

                </div>

                
                
                <hr>
                      
                      
                      

            </div>
            <?php
				
				include ("database.php");
        include ("actividadUsuario.php");


        
        //include ("Log.php");
				$predio= new Database();
				
				if(isset($_POST) && !empty($_POST)){


					
            $codigo=$predio->codigo_ubicacion($clave);
            $id_ubicacion=$codigo->ubc_idubicacion;

					//$clave_anterior = utf8_decode($predio->limpiar($_POST["clave_ant"]));

					  $eje_principal = utf8_decode($predio->limpiar($_POST["eje_principal"]));	 
  					
  					$codigo_placa = utf8_decode($predio->limpiar($_POST["placa_predial"]));	 
  					$eje_secundario = utf8_decode($predio->limpiar($_POST["eje_secundario"]));	 
  					$nombre_predio = trim(utf8_decode($_POST["nombre_predio"]));
  					$sector = utf8_decode($predio->limpiar($_POST["sector"]));	
  					
  					

					$res = $predio->actualizar_ubicacion($eje_principal,$codigo_placa,$eje_secundario,$nombre_predio,$sector,$id_ubicacion);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
						$log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización Ubicación:',' ',$clave);


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

				$datos_ubicacion=$predio->registro_ubicacion($clave);
			?>

      
			<div class="row">
				<form method="post">  
							
        
        <div class="col-md-5">          		
              
              <br>
                      
                      <label>Clave Catastral: </label> <td><?php echo utf8_encode($datos_ubicacion->ubc_clave_predio);?> </td>

                                             
    <p>
      <tr>    
        <br>
        <br>
        <br>
        <br>
            <td>Eje principal:</td>
            <td>
              <select id="eje_principal" name="eje_principal" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_ubicacion->ubc_eje_principal.'"selected>'.$datos_ubicacion->ubc_eje_principal.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="Vía Interoceánica">Vía Interoceánica </option>
            <option value="Huila">Huila </option>
                       
           </select> </td>
          </tr>
      </p>    
					
				
      <p>
      <tr>    
        
            <td>Eje Secundario (calle):</td>
            <td>
              <select id="eje_secundario" name="eje_secundario" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_ubicacion->ubc_eje_secundario.'"selected>'.$datos_ubicacion->ubc_eje_secundario.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="Jesús del Gran Poder">Jesús del Gran Poder </option>
            <option value="Huila">Huila </option>
            <option value="Oriente">Oriente </option>
                       
           </select> </td>
          </tr>
      </p>  


      <p>
      <tr>    
        
            <td>Nombre del Sector:</td>
            <td>
              <select id="sector" name="sector" >
                <?php                      

                  echo '<option value="'.$datos_ubicacion->ubc_sector.'"selected>'.$datos_ubicacion->ubc_sector.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Cuyuja">Cuyuja </option>
            <option value="La Bahía">La Bahía </option>
            
                       
           </select> </td>
          </tr>
      </p>      



        </div>

			
				<div class="col-md-3">
									
				<br>
        <br>
        <br>
        <br>
        <br>
      <p>
              Código de placa predial: <input name="placa_predial" id="placa_predial" type="text" maxlength="45" value="<?php echo utf8_encode($datos_ubicacion->ubc_codigo_placa_predial);?>" />
       </p>  

     <br>
      <p>
              Nombre predio: <input name="nombre_predio" id="nombre_predio" type="text" maxlength="45" value="<?php echo utf8_encode($datos_ubicacion->ubc_nombre_predio);?>" />
       </p>  
      
    </div>

      
        <div class="col-md-4">
                  
         <center>  
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label>Secciones: </label> 


      <p>
        <br>
        
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Predio</a>
       </p>  

     
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionUbicacion.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Ubicación</a>
       </p> 

        
      <p>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="edicionPropietario.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Propietario</a>
       </p>  

       
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionEstatusLegal.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Estatus legal</a>
       </p>  

        
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionLoteCaracteristicas.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Características Lote</a>
       </p>  

        
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionUsoPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Uso del predio</a>
       </p>   
      
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionInfraestructura.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Infraestructura</a>
       </p>

       <p>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vistaObrasComplementarias.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Obras</a>
       </p>      

       <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vistaConstruccionCaracteristicas.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Construcción</a>
       </p>   

       <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionGraficoPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Gráfico</a>
       </p>   

       <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vistaInvestigacionPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Investigación</a>
       </p>



   </center>
    
    </div>

               
        <br>


        		<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
          <br>  
        <br> 
        <br>  
        <br> 
				</div>
				</form>

         <br>  
        <div class="footer span-12">
            <div class="container">
              <br>      
              <center> <b class="copyright"><a href=""> Sistemas Web </a> &copy; <?php echo date("Y")?> catastros </b></center>
            </div>
        </div>

			</div>
        
    
    
    
</body>
</html>