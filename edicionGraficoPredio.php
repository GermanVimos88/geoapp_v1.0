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
<title>Gráfico Predio</title>
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

                    <div class="col-sm-8"><h2><b>Edición - Gráfico del predio</b></h2></div>

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
				$lote= new Database();
				
				if(isset($_POST) && !empty($_POST)){

          					$codigo=$lote->codigo_grafico_predio($clave);
                    $id_grafico=$codigo->grp_idgrafico_predio;

					  					
  					        $c_norte = utf8_decode($_POST["norte"]);	 
  					        $c_sur = utf8_decode($_POST["sur"]);	 
                    $c_este = utf8_decode($_POST["este"]);  
  					        $c_oeste = utf8_decode($_POST["oeste"]);
  					        $grafico = utf8_decode($_POST["grafico"]);
                    $area_lote = utf8_decode($_POST["area_lote"]);
                    $d_frente = utf8_decode($_POST["d_frente"]);
                    $fondo_relativo = utf8_decode($_POST["fondo_relativo"]);
                    $coord_x = utf8_decode($_POST["coord_x"]);
                    $coord_y = utf8_decode($_POST["coord_y"]);
                    $avaluo_tierras = utf8_decode($_POST["avaluo_tierras"]);
                    $avaluo_construccion = utf8_decode($_POST["avaluo_construccion"]);
                    $avaluo_total = utf8_decode($_POST["avaluo_total"]);                    
                    $descripcion = utf8_decode($_POST["descripcion"]);                                			
                    $observaciones = utf8_decode($_POST["observaciones"]);

					$res = $lote->actualizar_grafico_predio($c_norte,$c_sur,$c_este,$c_oeste,$area_lote,$d_frente,$fondo_relativo,$coord_x,$coord_y,$avaluo_tierras,$avaluo_construccion,$avaluo_total,$descripcion,$observaciones,$id_grafico);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
						$log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización Gráfico predio:',' ',$clave);


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

				$datos_lote=$lote->registro_grafico_predio($clave);
			?>

      
			<div class="row">
				<form method="post">  
				
        <div class="col-md-4">
          		
                                             
                    <p>
                      Clave predial: <input name="clave" id="clave" type="text" maxlength="20" value="<?php echo utf8_encode($datos_lote->grp_clave_predio);?>" disabled/>
                    </p>     
                    
              <br>
			        <br>

                          
                    
      
      <h3>Colindantes del predio</h3>
      <p>
        Norte: <input name="norte" id="norte" type="text" maxlength="50" value="<?php echo utf8_encode($datos_lote->grp_calle_norte);?>"/>
        <br>  
        &nbsp;&nbsp;&nbsp;Sur: <input name="sur" id="sur" type="text" maxlength="50" value="<?php echo utf8_encode($datos_lote->grp_calle_sur);?>"/>

      </p>       
	       
     
         <p>
        &nbsp;&nbsp;Este: <input name="este" id="este" type="text" maxlength="50" value="<?php echo utf8_encode($datos_lote->grp_calle_este);?>"/>
        <br>  
        Oeste: <input name="oeste" id="oeste" type="text" maxlength="50" value="<?php echo utf8_encode($datos_lote->grp_calle_oeste);?>"/>

        </p> 

        <br>
        <hr>
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;Avalúo Municipal</h3>
          <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Avalúo tierra: <input name="avaluo_tierras" id="avaluo_tierras" type="text" maxlength="15" value="<?php echo utf8_encode($datos_lote->grp_avaluo_tierras);?>"/>
          <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Avalúo construcciones: <input name="avaluo_construccion" id="avaluo_construccion" type="text" maxlength="15" value="<?php echo utf8_encode($datos_lote->grp_avaluo_construcciones);?>"/>
          <br>
          <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Avalúo Total: <input name="avaluo_total" id="avaluo_total" type="text" maxlength="15" value="<?php echo utf8_encode($datos_lote->grp_avaluo_total);?>"/>
               
         
        
        </div> 
                       

        <div class="col-md-5">

          <br>
          <br>
          <br>
          <table border="2" width="250" cellspacing="0" cellpadding="2" align="center">
           
            <tr><td width="250"><img src="<?php echo $datos_lote->grp_link_grafico;?>" width="250" height="250"></td></tr>

           </table> 



           <hr>
        <h3>Dimensiones del predio gráfico</h3>

        
        <p>
        <br>   
        Área gráfica del lote(m2): <input name="area_lote" id="area_lote" type="text" maxlength="15" value="<?php echo utf8_encode($datos_lote->grp_area_grafica_lote);?>"/>
        <br>  
        &nbsp;Dimensión del frente(m): <input name="d_frente" id="d_frente" type="text" maxlength="15" value="<?php echo utf8_encode($datos_lote->grp_dimension_frente);?>"/>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fondo relativo(m): <input name="fondo_relativo" id="fondo_relativo" type="text" maxlength="15" value="<?php echo utf8_encode($datos_lote->grp_fondo_relativo);?>"/>
        </p> 
                
        <p>
        <br>   
        Coordenada X (WGS 84 17S): <input name="coord_x" id="coord_x" type="text" maxlength="20" value="<?php echo utf8_encode($datos_lote->grp_coordenada_x);?>"/>
        <br>  
        Coordenada Y (WGS 84 17S): <input name="coord_y" id="coord_y" type="text" maxlength="20" value="<?php echo utf8_encode($datos_lote->grp_coordenada_y);?>"/>

       </p>
       

        </div>  










        <div class="col-md-3">
                  
         <center>  
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Secciones: </label> 

         <br>
         <br>
      <p>
                
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Predio</a>
       </p>  

     
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionUbicacion.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Ubicación</a>
       </p> 

        
      <p>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionPropietario.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Propietario</a>
       </p>  

       
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionEstatusLegal.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Estatus legal</a>
       </p>  

        
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionLoteCaracteristicas.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Características Lote</a>
       </p>  

        
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionUsoPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Uso del predio</a>
       </p>   
      
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionInfraestructura.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Infraestructura</a>
       </p> 

       <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vistaObrasComplementarias.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Obras</a>
       </p>     

       <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vistaConstruccionCaracteristicas.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Construcción</a>
       </p>   

       <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionGraficoPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Gráfico</a>
       </p>   

       <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vistaInvestigacionPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Investigación</a>
       </p>

   </center>
    
    </div>                  
     
               
        <br>

        <div class="col-md-12">
          
          <br>
          <br>
          <label>Descripción:</label>
          <textarea  name="descripcion" id="descripcion" class='form-control' maxlength="255" ><?php echo utf8_encode($datos_lote->grp_descripcion_grafico);?></textarea>
          <br>
          <label>Observaciones:</label>
          <textarea  name="observaciones" id="observaciones" class='form-control' maxlength="255" ><?php echo utf8_encode($datos_lote->grp_observaciones);?></textarea>
        </div> 



        <br>
        <br>


        		<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        
    <br>
    <br>
    <br>
    <br>  
        <div class="footer span-12">
            <div class="container">
              <br>      
              <center> <b class="copyright"><a href=""> Sistemas Web </a> &copy; <?php echo date("Y")?> catastros </b></center>
            </div>
        </div>
    
    
</body>
</html>