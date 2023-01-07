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
<title>Vista Investigación predial</title>
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
                    <div class="col-sm-8"><h2>Investigación predial <b>Datos</b></h2></div>
                    	<div class="col-sm-4"> 		
                    					<br>
                      		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="buscarPredio.php" class="btn btn-danger"><i class="icon-white icon-remove"></i><i class=""></i> Regresar </a>

                          <br>
                          <br>
                                                    
                          <br>

                                        					
		               	</div>
                    					           			
                	</div>
                				
            	</div> 


              
              
              <div class="col-sm-4">
                     
                      <hr>
                      <br>
                      
                      <label>Clave predial: </label> <td><?php echo utf8_encode($clave);?> <br></td>
                      <br>
              </div> 


            			 <hr>	
                   <br>	
            			
            				<table class="table table-bordered"  >
                			
                			<thead>
                    		
                        	<tr>
                        			
                        			<th width="120">Registro Nº</th>
                              <th width="120">Tipo de informante</th>
                        			<th width="120">Nombre</th>
                        			<th width="120">Apellido</th>
						                  <th width="120">Teléfono c</th>
                              <th width="120">Email</th>
						                  <th width="120">Propietario desconocido</th>
                        			<th width="120">Otra fuente de información</th>
                        			<th width="120">Dimensiones del terreno</th>                        			
                              <th width="120">Linderos definidos</th>
                              <th width="120">Nuevo bloque No.</th>
                              <th width="120">Ampliación bloque No.</th> 
                              <th width="120">Actualizador</th>
                              
                              <th width="120">Cédula</th> 
                              <th width="120">Fecha</th>
                              <th width="120">Firma</th>
                              <th width="120">Supervisor</th>
                              
                              <th width="120">Cédula</th>
                              <th width="120">Fecha</th>
                              <th width="120">Firma</th>                                                          
                        			<th width="120">ACCIONES</th>
                    					

	                   			</tr>
	                   		
                				</thead>
					        

               	              <?php 
               	              include ('database.php');
               	              $predio = new Database();
							                $listado = $predio->lectura_investigacion_predial($clave);
              	            

               	              ?>
                			

                				<tbody>    
                          
                					<?php

                					while ($fila= mysqli_fetch_object($listado)){

									  $id = $fila->inv_idinvestigacion_predial;	
                    $tipo = $fila->inv_tipo_informante;
									  $nombre_inf = $fila->inv_nombre_informante;
  									$apellido_inf = $fila->inv_apellidos_informante;
									  $telefono_inf = $fila->inv_telefono_informante;
       							$email_inf= $fila->inv_email_informante;
  									$propietario_desc = $fila->inv_propietario_desconocido;
  									$otra_fuente = $fila->inv_otra_fuente_informacion;
                    $dimension_terreno = $fila->inv_dimensiones_terreno_irregular;
                    $linderos = $fila->inv_linderos_definidos;
                    $nuevo_bloque = $fila->inv_nuevo_bloque_numero;
                    $amp_bloque = $fila->inv_ampliacion_bloque_numero;
                    $nombre_act = $fila->inv_nombre_actualizador;
                    $apellido_act = $fila->inv_apellido_actualizador;
                    $anio_act = $fila->inv_anio_actualizacion;
                    $mes_act = $fila->inv_mes_actualizacion;
                    $dia_act = $fila->inv_dia_actualizacion;
                    $cedula_act = $fila->inv_cedula_actualizador;
                    $firma_act = $fila->inv_firma_actualizador;
                    $nombre_supv = $fila->inv_nombre_supervisor;
                    $apellido_supv = $fila->inv_apellido_supervisor;
                    $cedula_supv = $fila->inv_cedula_supervisor;
                    $anio_supv = $fila->inv_anio_supervision;
                    $mes_supv = $fila->inv_mes_supervision;
                    $dia_supv = $fila->inv_dia_supervision;
                    $firma_supv = $fila->inv_firma_supervisor;

                					?>

									<tr>
	
  		  	
  											<td><?php echo utf8_encode($id);?></td>
  											<td><?php echo utf8_encode($tipo);?></td>
                        <td><?php echo utf8_encode($nombre_inf);?></td>
  											<td><?php echo utf8_encode($apellido_inf);?></td>
                        <td><?php echo utf8_encode($telefono_inf);?></td>
                        <td><?php echo utf8_encode($email_inf);?></td>
                  			<td><?php echo utf8_encode($propietario_desc);?></td>
                        <td><?php echo utf8_encode($otra_fuente);?></td>
                        <td><?php echo utf8_encode($dimension_terreno);?></td>
                        <td><?php echo utf8_encode($linderos);?></td>
                        <td><?php echo utf8_encode($nuevo_bloque);?></td>
                        <td><?php echo utf8_encode($amp_bloque);?></td>
                        <td><?php echo utf8_encode($nombre_act." ".$apellido_act);?></td>
                        
                        <td><?php echo utf8_encode($cedula_act);?></td>
                        <td><?php echo utf8_encode($dia_act."-".$mes_act."-".$anio_act);?></td>
                        <td><?php echo utf8_encode($firma_act);?></td>
                        <td><?php echo utf8_encode($nombre_supv." ".$apellido_supv);?></td>
                        
                        <td><?php echo utf8_encode($cedula_supv);?></td>
                        <td><?php echo utf8_encode($dia_supv."-".$mes_supv."-".$anio_supv);?></td>
                        <td><?php echo utf8_encode($firma_supv);?></td>

  										<td>


		

		                <a href="" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                      
			
			
								

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
