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
<title>Infraestructura e Instalaciones</title>
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

                    <div class="col-sm-8"><h2><b>Infraestructura e Instalaciones</b></h2></div>

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

					          $codigo=$lote->codigo_infraestructura($clave);
                    $id_infraestructura=$codigo->inf_idinfraestructura;

					  					
  					        $tipo_via = utf8_decode($_POST["via_acceso"]);	 
  					        $rodadura = utf8_decode($_POST["rodadura"]);	 
                    $vias_adicionales = utf8_decode($_POST["vias_adicionales"]);  
  					        $agua_procedencia = utf8_decode($_POST["agua_procedencia"]);
  					        $agua_recepcion = utf8_decode($_POST["agua_recepcion"]);
                    $eliminacion_excretas = utf8_decode($_POST["eliminacion_excretas"]);
                    $energia_procedencia = utf8_decode($_POST["energia_procedencia"]);
                    $medidor = utf8_decode($_POST["medidor"]);
                    $energia_recepcion = utf8_decode($_POST["energia_recepcion"]);
                    $basura = utf8_decode($_POST["basura"]);
                    $telf_convencional = utf8_decode($_POST["convencional"]);
                    $celular = utf8_decode($_POST["celular"]);
                    $tv_cable = utf8_decode($_POST["tv_cable"]);
                    $internet = utf8_decode($_POST["internet"]);
                    $metodo_riego = utf8_decode($_POST["metodo_riego"]);
                    $disp_riego = utf8_decode($_POST["disp_riego"]);
                    $instalaciones_esp = utf8_decode($_POST["instalaciones_esp"]);
                    $ascensor = utf8_decode($_POST["ascensor"]);
                    $circuito_tv = utf8_decode($_POST["circuito_tv"]);
                    $montacarga = utf8_decode($_POST["montacarga"]);
                    $sistema_alterno_elect = utf8_decode($_POST["sistema_alterno_elect"]);
                    $aire_acondicionado =utf8_decode($_POST["aire_acondicionado"]);
                    $sistema_incendios = utf8_decode($_POST["sistema_incendios"]);
                    $gas_central = utf8_decode($_POST["gas_central"]);
                    $ventilacion = utf8_decode($_POST["ventilacion"]);
                    $voz_datos = utf8_decode($_POST["voz_datos"]);
                    $alumbrado_publico = utf8_decode($_POST["alumbrado_publico"]);
                    $basura_recoleccion = utf8_decode($_POST["basura_recoleccion"]);
                    $transporte_urbano = utf8_decode($_POST["transporte_urbano"]);
                    $aseo_calles = utf8_decode($_POST["aseo_calles"]);
                    $alcantarillado = utf8_decode($_POST["alcantarillado"]);
                    $aceras = utf8_decode($_POST["aceras"]);
                    $bordillos = utf8_decode($_POST["bordillos"]);
            			

					$res = $lote->actualizar_infraestructura($tipo_via,$rodadura,$vias_adicionales,$agua_procedencia,$agua_recepcion,$eliminacion_excretas,$energia_procedencia,$medidor,$energia_recepcion,$basura,$telf_convencional,$celular,$tv_cable,$internet,$metodo_riego,$disp_riego,$instalaciones_esp,$ascensor,$circuito_tv,$montacarga,$sistema_alterno_elect,$aire_acondicionado,$sistema_incendios,$gas_central,$ventilacion,$voz_datos,$alumbrado_publico,$basura_recoleccion,$transporte_urbano,$aseo_calles,$alcantarillado,$aceras,$bordillos,$id_infraestructura);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
						$log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización Infraestructura:',' ',$clave);


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

				$datos_lote=$lote->registro_infraestructura($clave);
			?>

      
			<div class="row">
				<form method="post">  
					
          <?php $id_infraestructura=$datos_lote->inf_idinfraestructura;?>

        <div class="col-md-5">
          		<br>
                                            
                    <p>
                      Clave predial: <input name="clave" id="clave" type="text" maxlength="20" value="<?php echo utf8_encode($datos_lote->inf_clave_predio);?>" disabled/>
                    </p>     
                    
              <br>
			        <br>
     
    <p>
      <tr>    
        <br>
           <td>Tipo Vía de acceso:</td>
            <td>
              <select id="tipo_via" name="tipo_via" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_tipo_via_acceso.'"selected>'.$datos_lote->inf_tipo_via_acceso.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Autopista">Autopista </option>
            <option value="Avenida">Avenida </option>
            <option value="Calle">Calle </option>
            <option value="Callejón">Callejón </option>
            <option value="Cam. de herradura">Cam. de herradura </option>
            <option value="Escalinata">Escalinata </option>
            <option value="Pasaje vehicular">Pasaje vehicular </option>
            <option value="Peatonal">Peatonal </option>
            <option value="Sendero">Sendero </option>
            <option value="Pasaje sin retorno">Pasaje sin retorno </option>
                       
           </select> </td>
          </tr>
      </p> 
                
    <p>
      <tr>    
        
           <td>Rodadura:</td>
            <td>
              <select id="rodadura" name="rodadura" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_rodadura.'"selected>'.$datos_lote->inf_rodadura.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Adoquín de cemento">Adoquín de cemento </option>
            <option value="Adoquín de piedra">Adoquín de piedra </option>
            <option value="Empedrado">Empedrado </option>
            <option value="Lastre">Lastre </option>
            <option value="Hormigón">Hormigón </option>
            <option value="Asfalto">Asfalto </option>
            <option value="Tierra">Tierra </option>
            <option value="Tratamiento bituminoso">Tratamiento bituminoso </option>
                     
                       
           </select> </td>
          </tr>
      </p>       
	 
                 
    <p>
      <tr>    
        
           <td>Otras vías de acceso:</td>
            <td>
              <select id="vias_adicionales" name="vias_adicionales" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_vias_acceso_adicionales.'"selected>'.$datos_lote->inf_vias_acceso_adicionales.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Aérea">Aérea </option>
            <option value="Férrea">Férrea </option>
            <option value="Fluvial">Fluvial </option>
            <option value="Marítima">Marítima </option>
                       
           </select> </td>
          </tr>
      </p> 


                
    <p>
      <tr>    
        
           <td>Agua proviene de:</td>
            <td>
              <select id="agua_procedencia" name="agua_procedencia" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_agua_procedencia.'"selected>'.$datos_lote->inf_agua_procedencia.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Red pública">Red pública </option>
            <option value="Pozo">Pozo </option>
            <option value="Río-Vertiente-Acequia">Río-Vertiente-Acequia </option>
            <option value="Carro repartidor">Carro repartidor </option>
            <option value="Agua lluvia">Agua lluvia </option>
                       
           </select> </td>
          </tr>
      </p>


                 
    <p>
      <tr>    
        
           <td>Agua recibe de:</td>
            <td>
              <select id="agua_recepcion" name="agua_recepcion" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_agua_recepcion.'"selected>'.$datos_lote->inf_agua_recepcion.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Tubería dentro de la vivienda">Tubería dentro de la vivienda </option>
            <option value="Tubería fuera de la vivienda">Tubería fuera de la vivienda </option>
            <option value="Tubería dentro del edificio">Tubería dentro del edificio </option>
            <option value="Recibe por otros medios">Recibe por otros medios </option>
            
                       
           </select> </td>
          </tr>
      </p>

   

      <br>           
    <p>
      <br>
      <br>
      <tr>    
       
           <td>Eliminación excretas:</td>
            <td>
              <select id="eliminacion_excretas" name="eliminacion_excretas" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_eliminacion_excretas.'"selected>'.$datos_lote->inf_eliminacion_excretas.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Red pública de alcantarillado">Red pública de alcantarillado </option>
            <option value="Pozo séptico">Pozo séptico </option>
            <option value="Pozo ciego">Pozo ciego </option>
            <option value="Descarga directa al mar,río o lago">Descarga directa al mar,río o lago </option>
            <option value="Letrina">Letrina </option>
            
                       
           </select> </td>
          </tr>
      </p>
                 
    <p>
      <tr>    
        
           <td>Energía eléctrica proviene de:</td>
            <td>
              <select id="energia_procedencia" name="energia_procedencia" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_energia_electrica_procedencia.'"selected>'.$datos_lote->inf_energia_electrica_procedencia.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Red pública">Red pública </option>
            <option value="Panel solar">Panel solar </option>
            <option value="Planta eléctrica">Planta eléctrica </option>
            <option value="Otro">Otro </option>
                        
                       
           </select> </td>
          </tr>
          <br>
          <tr>    
        <br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>¿Tiene medidor?:</td>
            <td>
              <select id="medidor" name="medidor" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_medidor.'"selected>'.$datos_lote->inf_medidor.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="1">Si </option>
            <option value="0">No </option>
                                    
                       
           </select> </td>
          </tr>

      </p>
                 
    <p>
      <br>
      <br>
      <tr>    
               
           &nbsp;&nbsp;<td>Eliminación de basura:</td>
            <td>
              <select id="basura" name="basura" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_eliminacion_basura.'"selected>'.$datos_lote->inf_eliminacion_basura.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Carro recolector">Carro recolector </option>
            <option value="Arrojan en terreno baldío/quebrada">Arrojan en terreno baldío/quebrada </option>
            <option value="La queman">La queman </option>
            <option value="La entierran">La entierran </option>
            <option value="Arrojan al río">Arrojan al río </option>
            <option value="Otra forma">Otra forma </option>

                       
           </select> </td>
          </tr>
      </p>
               
    <p>
      <tr>    
        
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>Método de riego:</td>
            <td>
              <select id="metodo_riego" name="metodo_riego" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_metodo_riego.'"selected>'.$datos_lote->inf_metodo_riego.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="Seco">Seco </option>
            <option value="No tiene">No tiene </option>
            <option value="Gravedad">Gravedad </option>
            <option value="Aspersión">Aspersión </option>
            <option value="Goteo">Goteo </option>
            <option value="Bombeo">Bombeo </option>
            <option value="Otro">Otro </option>
                           
           </select> </td>
          </tr>
      </p>     
 

          <p>
      <tr>    
        
           <td>Disponibilidad de riego:</td>
            <td>
              <select id="disp_riego" name="disp_riego" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_disponibilidad_riego.'"selected>'.$datos_lote->inf_disponibilidad_riego.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Ocasional">Ocasional </option>
            <option value="Permanente">Permanente </option>
                                       
           </select> </td>
          </tr>
      </p>

      <p>
      <tr>    
        
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>Alcantarillado:</td>
            <td>
              <select id="alcantarillado" name="alcantarillado" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_lote->inf_alcantarillado.'"selected>'.$datos_lote->inf_alcantarillado.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Red combinado">Red combinado </option>
            <option value="Sanitario">Sanitario </option>
            <option value="Pluvial">Pluvial </option>                                       
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
      <tr>
            <fieldset>  
        <legend>Comunicaciones:</legend>  
        <input type="checkbox" name="convencional" value="1" <?php if($datos_lote->inf_telefono_convencional=='1'){?>  checked  <?php } ?>  >Teléfono convencional<br>  
        <input type="checkbox" name="celular" value="1" <?php if($datos_lote->inf_celular=='1'){?>  checked  <?php } ?> >Teléfono celular<br>  
        <input type="checkbox" name="tv_cable" value="1" <?php if($datos_lote->inf_tv_cable=='1'){?>  checked  <?php } ?> >Tv por cable<br>
        <input type="checkbox" name="internet" value="1" <?php if($datos_lote->inf_internet=='1'){?>  checked  <?php } ?> >Internet<br>        
        <br>  
        
        </fieldset> 
          </tr>
      </p>

     
      <p>
      <tr>
            <fieldset>  
        <legend>Instalaciones especiales:</legend>  
        <input type="checkbox" name="instalaciones_esp" value="0" >No tiene<br>  
        <input type="checkbox" name="ascensor" value="1" <?php if($datos_lote->inf_ascensor=='1'){?>  checked  <?php } ?> >Ascensor<br>  
        <input type="checkbox" name="circuito_tv" value="1" <?php if($datos_lote->inf_circuito_cerrado_tv=='1'){?>  checked  <?php } ?> >Circuito cerrado de TV<br>
        <input type="checkbox" name="montacarga" value="1" <?php if($datos_lote->inf_montacarga=='1'){?>  checked  <?php } ?> >Montacarga<br>        
        <input type="checkbox" name="sistema_alterno_elect" <?php if($datos_lote->inf_sistema_alterno_electricidad=='1'){?>  checked  <?php } ?> value="1" >Sistema alterno de electricidad<br>        
        <input type="checkbox" name="aire_acondicionado" value="1" <?php if($datos_lote->inf_aire_acondicionado=='1'){?>  checked  <?php } ?> >Sistema aire acondicionado<br>        
        <input type="checkbox" name="sistema_incendios" value="1" <?php if($datos_lote->inf_sistema_contra_incendios=='1'){?>  checked  <?php } ?> >Sistema contra incendios<br>        
        <input type="checkbox" name="gas_central" value="1" <?php if($datos_lote->inf_gas_centralizado=='1'){?>  checked  <?php } ?> >Sistema gas centralizado<br>        
        <input type="checkbox" name="ventilacion" value="1" <?php if($datos_lote->inf_ventilacion=='1'){?>  checked  <?php } ?> >Sistema ventilación mecánica<br>        
        <input type="checkbox" name="voz_datos" value="1" <?php if($datos_lote->inf_sistema_voz_datos=='1'){?>  checked  <?php } ?> >Sistema de voz y datos<br>        

        <br>  
        
        </fieldset> 
          </tr>
      </p>

      
      <p>
      <tr>
            <fieldset>  
        <legend>Otros servicios:</legend>  
        <input type="checkbox" name="alumbrado_publico" value="1" <?php if($datos_lote->inf_alumbrado_publico=='1'){?>  checked  <?php } ?> >Alumbrado público<br>  
        <input type="checkbox" name="basura_recoleccion" value="1" <?php if($datos_lote->inf_recoleccion_basura=='1'){?>  checked  <?php } ?> >Recolección de basura<br>  
        <input type="checkbox" name="transporte_urbano" value="1" <?php if($datos_lote->inf_transporte_urbano=='1'){?>  checked  <?php } ?> >Transporte urbano<br>
        <input type="checkbox" name="aseo_calles" value="1" <?php if($datos_lote->inf_aseo_calles=='1'){?>  checked  <?php } ?> >Aseo de calles<br>        
        
        <br>  
        
        </fieldset> 
          </tr>
      </p>

      
      <p>
      <tr>
            <fieldset>  
        <legend>Aceras-Bordillos:</legend>  
        <input type="checkbox" name="aceras" value="1" <?php if($datos_lote->inf_aceras=='1'){?>  checked  <?php } ?> >Aceras<br>  
        <input type="checkbox" name="bordillos" value="1" <?php if($datos_lote->inf_bordillos=='1'){?>  checked  <?php } ?> >Bordillos<br>  
                
        <br>  
        
        </fieldset> 
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

        
			</div>
        
    
    <br>  
        <div class="footer span-12">
            <div class="container">
              <br>      
              <center> <b class="copyright"><a href=""> Sistemas Web </a> &copy; <?php echo date("Y")?> catastros </b></center>
            </div>
        </div>
    
</body>
</html>