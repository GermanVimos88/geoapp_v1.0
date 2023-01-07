<?php
	
	
	
	 session_start();

	 $id_prd=($_GET['id']);
   $clave=($_GET['ref']);



	 if (!isset($_SESSION['id_usuario']) and !isset($_POST['Salir'])) {
  		  	header('Location: error.php?mensaje=No has iniciado sesion');
    		unset($_SESSION['id_usuario']); //destruye la sesión
 			}

		else  {
	
 	?>


<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vista Características Construcción</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
  
    
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Construcción - <b>Características</b></h2></div>
                    	<div class="col-sm-4"> 		
                    					<br>
                      		
                          <a href="buscarPredio.php" class="btn btn-danger"><i class="icon-white icon-remove"></i><i class=""></i> Regresar </a>

                          <br>
                          <br>
                          
                          
                          <br>
                          <br>

                                        					
		               	</div>
                    					           			
                	</div>
                				
            	</div> 


              
              
              <div class="col-sm-4">
                     
                      <hr>
                      <br>
                      
                      <label>Clave predial: </label> <td><?php echo utf8_encode($clave);?><br> </td>
                      <br>
              </div> 


            			 <hr>	

            			
            				<table class="table table-bordered"  >
                			
                			<thead>
                    			<tr>
                        			
                        			<th width="120">Registro Nº</th>
                              <th width="120">No.Bloque</th>
                        			<th width="120">No.Piso</th>
                        			<th width="120">No.Unidad</th>
						                  <th width="120">Nivel del piso</th>
                              <th width="120">Condición física</th>
						                  <th width="120">Uso constructivo</th>
                        			<th width="120">Valor cultural</th>
                        			<th width="120">Área de construcción(m2)</th>
                              <th width="120">Año de construcción</th>
                              <th width="120">Año de restauración</th>
                              <th width="120">Estado de conservación</th>
                              <th width="120">Mampostería soportante</th>
                              <th width="120">Columnas</th>                        			
                              <th width="120">Vigas</th>
                              <th width="120">Entrepiso</th>
                              <th width="120">Cubierta-entrepiso</th>
                              <th width="120">Gradas</th>
                              <th width="120">Contrapiso</th>
                              <th width="120">Paredes</th>
                              <th width="120">Enlucido paredes</th>
                              <th width="120">Enlucido tumbados</th>
                              <th width="120">Revestimiento pared interior</th>
                              <th width="120">Revestimiento pared exterior</th>
                              <th width="120">Revestimiento cubierta</th>
                              <th width="120">Tumbados</th>
                              <th width="120">Ventanas</th>
                              <th width="120">Vidrios</th>
                              <th width="120">Puertas</th>
                              <th width="120">Closets</th>
                              <th width="120">Pisos</th>
                              <th width="120">Protección ventanas</th>
                              <th width="120">Gradas</th>
                              <th width="120">Clasificación vivienda</th>
                              <th width="120">Tipo de vivienda</th>
                              <th width="120">Condición de ocupación</th>
                              <th width="120">Acabado de piso</th>
                              <th width="120">Estado de piso</th>
                              <th width="120">No. hogares</th>
                              <th width="120">No. de habitantes</th>
                              <th width="120">No. de habitaciones</th>
                              <th width="120">No. de dormitorios</th>
                              <th width="120">Duchas</th>
                              <th width="120">Tenencia de la vivienda</th>
                              <th width="120">Telefono convencional</th>
                              <th width="120">No. Celulares</th>
                              <th width="120">Internet</th>

                        			<th width="120">ACCIONES</th>
                    					

	                   			</tr>
	                   		
                				</thead>
					        

               	              <?php 
               	              include ('database.php');
               	              $predio = new Database();
							                $listado = $predio->lectura_construccion_caracteristicas($clave);
              	            

               	              ?>
                			

                				<tbody>    
                          
                					<?php

                          $contador=0;

                					while ($fila= mysqli_fetch_object($listado)){
                          $contador=$contador+1;  
									  
                    $id = $fila->cdc_idconstruccion_caracteristicas;	
                    $bloque = $fila->cdc_numero_bloque;
									  $piso = $fila->cdc_numero_piso;
  									$unidad = $fila->cdc_numero_unidad;
									  $nivel_piso = $fila->cdc_nivel_piso;
       							$condicion= $fila->cdc_condicion_fisica;
  									$uso = $fila->cdc_uso_constructivo;
  									$v_cultural = $fila->cdc_valor_cultural;
                    $area = $fila->cdc_area_construccion;
                    $construccion = $fila->cdc_anio_construccion;
                    $restauracion = $fila->cdc_anio_restauracion;
                    $estado = $fila->cdc_estado_conservacion;
                    $mamposteria = $fila->cdc_mamposteria_soportante;
                    $columnas = $fila->cdc_columnas;
                    $vigas = $fila->cdc_vigas;
                    $entrepiso = $fila->cdc_entrepiso;
                    $entrepiso_cub = $fila->cdc_cubierta_entrepiso;
                    $gradas = $fila->cdc_gradas;
                    $contrapiso = $fila->cdc_contrapiso;
                    $paredes = $fila->cdc_paredes;
                    $paredes_enlucido = $fila->cdc_enlucido_paredes;
                    $tumbado_enlucido = $fila->cdc_enlucido_tumbados;
                    $rev_pared_interior = $fila->cdc_revestimiento_pared_interior;
                    $rev_pared_exterior = $fila->cdc_revestimiento_pared_exterior;
                    $rev_cubierta = $fila->cdc_revestimiento_cubierta;
                    $tumbados = $fila->cdc_tumbados;
                    $ventanas = $fila->cdc_ventanas;
                    $vidrios = $fila->cdc_vidrios;
                    $puertas = $fila->cdc_puertas;
                    $closets = $fila->cdc_closets;
                    $pisos = $fila->cdc_pisos;
                    $ventanas_proteccion = $fila->cdc_proteccion_ventanas;
                    $gradas_acab = $fila->cdc_gradas_acabados;
                    $vivienda_clas = $fila->cdc_clasificacion_vivienda;
                    $tipo_vivienda = $fila->cdc_tipo_vivienda;
                    $ocupacion = $fila->cdc_condicion_ocupacion;
                    $piso_acab = $fila->cdc_acabado_piso;
                    $piso_estado = $fila->cdc_estado_piso;
                    $hogares = $fila->cdc_numero_hogares;
                    $habitantes = $fila->cdc_numero_habitantes;
                    $habitaciones = $fila->cdc_numero_habitaciones;
                    $dormitorios = $fila->cdc_numero_dormitorios;
                    $duchas = $fila->cdc_espacios_aseo_duchas;
                    $vivienda_tenencia = $fila->cdc_tenencia_vivienda;
                    $telf_convencional = $fila->cdc_telefono_convencional;
                    $celulares = $fila->cdc_cantidad_celulares;
                    $internet = $fila->cdc_servicio_internet;

                					?>

									<tr>
	
  		  	
  											<td><?php echo utf8_encode($contador);?></td>
  											<td><?php echo utf8_encode($bloque);?></td>
                        <td><?php echo utf8_encode($piso);?></td>
  											<td><?php echo utf8_encode($unidad);?></td>
                        <td><?php echo utf8_encode($nivel_piso);?></td>
                        <td><?php echo utf8_encode($condicion);?></td>
                  			<td><?php echo utf8_encode($uso);?></td>
                        <td><?php echo utf8_encode($v_cultural);?></td>
                        <td><?php echo utf8_encode($area);?></td>
                        <td><?php echo utf8_encode($construccion);?></td>
                        <td><?php echo utf8_encode($restauracion);?></td>
                        <td><?php echo utf8_encode($estado);?></td>
                        <td><?php echo utf8_encode($mamposteria);?></td>
                        <td><?php echo utf8_encode($columnas);?></td>
                        <td><?php echo utf8_encode($vigas);?></td>
                        <td><?php echo utf8_encode($entrepiso);?></td>
                        <td><?php echo utf8_encode($entrepiso_cub);?></td>
                        <td><?php echo utf8_encode($gradas);?></td>
                        <td><?php echo utf8_encode($contrapiso);?></td>
                        <td><?php echo utf8_encode($paredes);?></td>
                        <td><?php echo utf8_encode($paredes_enlucido);?></td>
                        <td><?php echo utf8_encode($tumbado_enlucido);?></td>
                        <td><?php echo utf8_encode($rev_pared_interior);?></td>
                        <td><?php echo utf8_encode($rev_pared_exterior);?></td>
                        <td><?php echo utf8_encode($rev_cubierta);?></td>
                        <td><?php echo utf8_encode($tumbados);?></td>
                        <td><?php echo utf8_encode($ventanas);?></td>
                        <td><?php echo utf8_encode($vidrios);?></td>
                        <td><?php echo utf8_encode($puertas);?></td>
                        <td><?php echo utf8_encode($closets);?></td>
                        <td><?php echo utf8_encode($pisos);?></td>
                        <td><?php echo utf8_encode($ventanas_proteccion);?></td>
                        <td><?php echo utf8_encode($gradas_acab);?></td>
                        <td><?php echo utf8_encode($vivienda_clas);?></td>
                        <td><?php echo utf8_encode($tipo_vivienda);?></td>
                        <td><?php echo utf8_encode($ocupacion);?></td>
                        <td><?php echo utf8_encode($piso_acab);?></td>
                        <td><?php echo utf8_encode($piso_estado);?></td>
                        <td><?php echo utf8_encode($hogares);?></td>
                        <td><?php echo utf8_encode($habitantes);?></td>
                        <td><?php echo utf8_encode($habitaciones);?></td>
                        <td><?php echo utf8_encode($dormitorios);?></td>
                        <td><?php echo utf8_encode($duchas);?></td>
                        <td><?php echo utf8_encode($vivienda_tenencia);?></td>
                        <td><?php echo utf8_encode($telf_convencional);?></td>
                        <td><?php echo utf8_encode($celulares);?></td>
                        <td><?php echo utf8_encode($internet);?></td>


  										<td>


		

		                <a href="edicionConstruccionCaracteristicas.php?id=<?php echo $id_prd;?>&ref=<?php echo $clave;?>&cod=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                      
			
			
								

										</td>
	
										</tr>			

									<?php

												}


									?>                					


                				</tbody>            	
           				</table>           		
        </div>


        <div class="col-md-14">
        <br>
                
        <hr>
         
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Secciones: </label> 

         <br>
         <br>
      <p>
                
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="edicionPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Predio</a>
       
              &nbsp;&nbsp;<a href="edicionUbicacion.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Ubicación</a>
       
             &nbsp;&nbsp;<a href="edicionPropietario.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Propietario</a>
             &nbsp;&nbsp;<a href="edicionEstatusLegal.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Estatus legal</a>
             &nbsp;&nbsp;&nbsp;<a href="edicionLoteCaracteristicas.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Características Lote</a>
             &nbsp;&nbsp;<a href="edicionUsoPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Uso del predio</a>
             &nbsp;&nbsp;<a href="edicionInfraestructura.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Infraestructura</a>
             
      </p>
      <br>
      <p>       
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vistaObrasComplementarias.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Obras</a>
             &nbsp;&nbsp;<a href="vistaConstruccionCaracteristicas.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Construcción</a>
             
             &nbsp;&nbsp;<a href="edicionGraficoPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Gráfico</a>
             &nbsp;&nbsp;<a href="vistaInvestigacionPredio.php?id=<?php echo $id_prd?>&ref=<?php echo $clave?>" class="btn btn-info add-new"><i class=""></i> Investigación</a>
       </p> 
    
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

<?php	

  }
