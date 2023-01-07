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
<title>Vista Obras Complementarias</title>
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
                    <div class="col-sm-8"><h2>Obras complementarias <b>Mejoras</b></h2></div>
                    	<div class="col-sm-4"> 		
                    					<br>
                      		
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
                   
            			
            				<table class="table table-bordered"  >
                			
                			<thead>                        
                    			<tr>
                        			
                        			<th width="120">Registro Nº</th>
                              <th width="120">Tipo de Obra</th>
                        			<th width="120">Dimensión a</th>
                        			<th width="120">Dimensión b</th>
						                  <th width="120">Dimensión c</th>
                              <th width="120">Cantidad(m/m2/m3)</th>
						                  <th width="120">Material</th>
                        			<th width="120">Edad</th>
                        			<th width="120">Estado</th>                        			
                        			<th width="120">ACCIONES</th>
                    					

	                   			</tr>
	                   		
                				</thead>
					        

               	              <?php 
               	              include ('database.php');
               	              $predio = new Database();
							                $listado = $predio->lectura_obras_complementarias($clave);
              	            

               	              ?>
                			

                				<tbody>    
                          
                					<?php

                          $contador=0;  
                					while ($fila= mysqli_fetch_object($listado)){
                            $contador=$contador+1;  

									  $id = $fila->obc_idobras_complementarias;	
                    $tipo_obra = $fila->obc_tipo_obra;
									  $a = $fila->obc_dimension_a;
  									$b = $fila->obc_dimension_b;
									  $c = $fila->obc_dimension_c;
       							$metros= $fila->obc_cantidad_metros;
  									$material = $fila->obc_material;
  									$edad = $fila->obc_edad;
                    $estado = $fila->obc_estado;


                					?>

									<tr>
	
  		  	
  											<td><?php echo utf8_encode($contador);?></td>
  											<td><?php echo utf8_encode($tipo_obra);?></td>
                        <td><?php echo utf8_encode($a);?></td>
  											<td><?php echo utf8_encode($b);?></td>
                        <td><?php echo utf8_encode($c);?></td>
                        <td><?php echo utf8_encode($metros);?></td>
                  			<td><?php echo utf8_encode($material);?></td>
                        <td><?php echo utf8_encode($edad);?></td>
                        <td><?php echo utf8_encode($estado);?></td>

  										<td>


		

		                <a href="edicionObraComplementaria.php?id=<?php echo $id_prd;?>&ref=<?php echo $clave;?>&cod=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                      
			
			
								

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
    
    <br>  
    <br>  
    <br>  
    <br>     
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

<?php	

  }
