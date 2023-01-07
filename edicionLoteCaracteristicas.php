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
<title>Características Lote</title>
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

                    <div class="col-sm-8"><h2><b>Características del Lote</b></h2></div>

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

					          $codigo=$lote->codigo_lote($clave);
                    $id_lote=$codigo->clt_idcaracteristicas_lote;

					  					
  					        $ocupacion = utf8_decode($_POST["ocupacion"]);	 
  					        $localizacion = utf8_decode($_POST["localizacion"]);	 
                    $forma = utf8_decode($_POST["forma"]);  
  					        $topografia = utf8_decode($_POST["topografia"]);
  					        $cobertura_nativa = utf8_decode($_POST["cobertura_nativa"]);
                    $ecosistema = utf8_decode($_POST["ecosistema"]);
                    $afectaciones = utf8_decode($_POST["afectaciones"]);
                    $riesgos = utf8_decode($_POST["riesgos"]);
                    $calidad = utf8_decode($_POST["calidad"]);
                    
            			

					$res = $lote->actualizar_lote($ocupacion,$localizacion,$forma,$topografia,$cobertura_nativa,$ecosistema,$afectaciones,$riesgos,$calidad,$id_lote);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
						$log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización Características Lote:',' ',$clave);


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

				$datos_lote=$lote->registro_lote($clave);
			?>

      
			<div class="row">
				<form method="post">  
					
        <div class="col-md-5">
          		<br>                      
                       
                    <p>
                      Clave predial: <input name="clave" id="clave" type="text" maxlength="20" value="<?php echo utf8_encode($datos_lote->clt_clave_predio);?>" disabled/>
                    </p>     
                           
			  <br>
        <br>           
    <p>
      <tr>    
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>Ocupación:</td>
            <td>
              <select id="ocupacion" name="ocupacion" >
                <?php                      

                  echo '<option value="'.$datos_lote->clt_ocupacion.'"selected>'.$datos_lote->clt_ocupacion.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Edificado">Edificado </option>
            <option value="No Edificado">No Edificado </option>
            <option value="En construcción">En construcción </option>
                       
           </select> </td>
          </tr>
      </p> 

                
    <p>
      <tr>    
           <td>Localización en la manzana:</td>
            <td>
              <select id="localizacion" name="localizacion" >
                <?php                      

                  echo '<option value="'.$datos_lote->clt_localizacion_manzana.'"selected>'.$datos_lote->clt_localizacion_manzana.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Esquinero">Esquinero </option>
            <option value="En cabecera">En cabecera </option>
            <option value="Intermedio">Intermedio </option>
            <option value="En L">En L </option>
            <option value="En T">En T </option>
            <option value="En cruz">En cruz </option>
            <option value="Manzanero">Manzanero </option>
            <option value="Triángulo">Triángulo </option>
            <option value="En callejón">En callejón </option>
            <option value="Interior">Interior </option>
                       
           </select> </td>
          </tr>
      </p>       
	                 
    <p>
      <tr>    
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>Forma:</td>
            <td>
              <select id="forma" name="forma" >
                <?php                      

                  echo '<option value="'.$datos_lote->clt_forma.'"selected>'.$datos_lote->clt_forma.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Regular">Regular </option>
            <option value="Irregular">Irregular </option>
            <option value="Muy irregular">Muy irregular </option>
                       
           </select> </td>
          </tr>
      </p> 
                 
    <p>
      <tr>        
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td>Topografía:</td>
            <td>
              <select id="topografia" name="topografia" >
                <?php                      

                  echo '<option value="'.$datos_lote->clt_topografia.'"selected>'.$datos_lote->clt_topografia.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="A nivel">A nivel </option>
            <option value="Bajo nivel">Bajo nivel </option>
            <option value="Sobre nivel">Sobre nivel </option>
            <option value="Escarpado arriba">Escarpado arriba </option>
            <option value="Escarpado abajo">Escarpado abajo </option>
            <option value="Accidentado">Accidentado </option>
                       
           </select> </td>
          </tr>
      </p>
                 
    <p>
      <tr>    
        <br>
           <td>Cobertura nativa predominante (Rural):</td>
            <td>
              <select id="cobertura_nativa" name="cobertura_nativa" >
                <?php                      

                  echo '<option value="'.$datos_lote->clt_cobertura_nativa_predominante.'"selected>'.$datos_lote->clt_cobertura_nativa_predominante.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Arbórea">Arbórea </option>
            <option value="Arbustiva">Arbustiva </option>
            <option value="Herbácea">Herbácea </option>
            <option value="Otro">Otro </option>
            
                       
           </select> </td>
          </tr>
      </p>




   </div>  				
			
      
      <div class="col-md-3">
              
      <br>
      <br>
      <br> 
      <br>          
    <p>
      <tr>    
        <br>
          &nbsp;&nbsp;&nbsp;<td>Ecosistema relevante (Rural):</td>
            <td>
              <select id="ecosistema" name="ecosistema" >
                <?php                      

                  echo '<option value="'.$datos_lote->clt_ecosistema_relevante.'"selected>'.$datos_lote->clt_ecosistema_relevante.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Páramo">Páramo </option>
            <option value="Humedal">Humedal </option>
            <option value="Manglar">Manglar </option>
            <option value="Bosque primario">Bosque primario </option>
            <option value="Bosque secundario">Bosque secundario </option>
            
                       
           </select> </td>
          </tr>
      </p>
                 
    <p>
      <tr>        
          &nbsp;&nbsp;&nbsp;<td>Afectaciones:</td>
            <td>
              <select id="afectaciones" name="afectaciones" >
                <?php                      

                  echo '<option value="'.$datos_lote->clt_afectaciones.'"selected>'.$datos_lote->clt_afectaciones.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Río">Río </option>
            <option value="Estero">Estero </option>
            <option value="Quebrada">Quebrada </option>
            <option value="Oleoducto">Oleoducto </option>
            <option value="Red alta o media tensión">Red alta o media tensión </option>
            <option value="Proyectos urbanísticos">Proyectos urbanísticos </option>
            <option value="Protección patrimonial">Protección patrimonial </option>
            
                       
           </select> </td>
          </tr>
      </p>

                 
    <p>
      <tr>      
           &nbsp;&nbsp;&nbsp;<td>Riesgos:</td>
            <td>
              <select id="riesgos" name="riesgos" >
                <?php                      

                  echo '<option value="'.$datos_lote->clt_riesgos.'"selected>'.$datos_lote->clt_riesgos.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Inundable">Inundable </option>
            <option value="Deleznable">Deleznable </option>
            <option value="Volcánico">Volcánico </option>
            <option value="Al borde del barranco">Al borde del barranco </option>
            <option value="Al borde de la quebrada">Al borde de la quebrada </option>
                            
                       
           </select> </td>
          </tr>
      </p>
               
    <p>
      <tr>          
           &nbsp;&nbsp;&nbsp;<td>Calidad de suelo:</td>
            <td>
              <select id="calidad" name="calidad" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->clt_calidad_suelo.'"selected>'.$datos_lote->clt_calidad_suelo.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="Seco">Seco </option>
            <option value="Húmedo">Húmedo </option>
            <option value="Cenagoso">Cenagoso </option>
            <option value="Inundable">Inundable </option>
                           
           </select> </td>
          </tr>
      </p>

               
        </div> 




        <div class="col-md-4">
                  
         <center>  
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Secciones: </label> 

         <br>
         <br>
      <p>
                
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Predio</a>
       </p>  

     
      <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionUbicacion.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Ubicación</a>
       </p> 

        
      <p>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionPropietario.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Propietario</a>
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