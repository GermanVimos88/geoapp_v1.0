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
<title>Uso del predio</title>
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

                    <div class="col-sm-8"><h2><b>Uso del predio</b></h2></div>

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


          					$codigo=$predio->codigo_uso_predio($clave);
                    $id_uso=$codigo->upd_iduso_predio;

					  					
  					        $uso_principal = utf8_decode($_POST["uso_principal"]);	 
  					        $uso_secundario = utf8_decode($_POST["uso_secundario"]);	 
                    $descripcion = utf8_decode($_POST["descripcion"]);  
  					        
                    
            			

					$res = $predio->actualizar_uso_predio($uso_principal,$uso_secundario,$descripcion,$id_uso);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
						$log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización Uso predio:',' ',$clave);


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

				$datos_predio=$predio->registro_uso_predio($clave);
			?>

      
			<div class="row">
				<form method="post">  
					          
        <div class="col-md-5">
          		          
                    <br>   
                    <p>
                      Clave predial: <input name="clave" id="clave" type="text" maxlength="20" value="<?php echo utf8_encode($datos_predio->upd_clave_predio);?>" disabled/>
                    </p>     
                    
              <br>
			       <br>
             


    <p>
      <tr>    
        <br>
        
           &nbsp;&nbsp;&nbsp;&nbsp;<td>Uso Principal:</td>
            <td>
              <select id="uso_principal" name="uso_principal" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_predio->upd_uso_principal.'"selected>'.$datos_predio->upd_uso_principal.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Acuacultura">Acuacultura </option>
            <option value="Agrícola">Agrícola </option>
            <option value="Agroindustrial">Agroindustrial </option>
            <option value="Bienestar social">Bienestar social </option>
            <option value="Casa comunal">Casa comunal </option>
            <option value="Comercial">Comercial </option>
            <option value="Comercial y residencial">Comercial y residencial </option>
            <option value="Conservación">Conservación </option>
            <option value="Cultural">Cultural </option>
            <option value="Diplomático">Diplomático </option>
            <option value="Educación">Educación </option>
            <option value="Espacio público">Espacio público </option>
            <option value="Financiero">Financiero </option>
            <option value="Forestal">Forestal </option>
            <option value="Hidrocarburo">Hidrocarburo </option>
            <option value="Industrial">Industrial </option>
            <option value="Institucional privado">Institucional privado </option>
            <option value="Institucional público">Institucional público </option>
            <option value="Minero">Minero </option>
            <option value="Pecuario">Pecuario </option>
            <option value="Preservación patrimonial">Preservación patrimonial </option>
            <option value="Protección ecológica">Protección ecológica </option>
            <option value="Recreación y deporte">Recreación y deporte </option>
            <option value="Religioso">Religioso </option>
            <option value="Residencial">Residencial </option>
            <option value="Salúd">Salúd </option>
            <option value="Seguridad">Seguridad </option>
            <option value="Servicios">Servicios </option>
            <option value="Servicios especiales">Servicios especiales </option>
            <option value="Transporte">Transporte </option>
            <option value="Turismo">Turismo </option>
            
           </select> </td>
          </tr>
      </p> 

      <br>  
             
      
      <p>
      <tr>    
        
           <td>Uso Secundario:</td>
            <td>
              <select id="uso_secundario" name="uso_secundario" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_predio->upd_uso_secundario.'"selected>'.$datos_predio->upd_uso_secundario.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="Acuacultura">Acuacultura </option>
            <option value="Agrícola">Agrícola </option>
            <option value="Agroindustrial">Agroindustrial </option>
            <option value="Bienestar social">Bienestar social </option>
            <option value="Casa comunal">Casa comunal </option>
            <option value="Comercial">Comercial </option>
            <option value="Comercial y residencial">Comercial y residencial </option>
            <option value="Conservación">Conservación </option>
            <option value="Cultural">Cultural </option>
            <option value="Diplomático">Diplomático </option>
            <option value="Educación">Educación </option>
            <option value="Espacio público">Espacio público </option>
            <option value="Financiero">Financiero </option>
            <option value="Forestal">Forestal </option>
            <option value="Hidrocarburo">Hidrocarburo </option>
            <option value="Industrial">Industrial </option>
            <option value="Institucional privado">Institucional privado </option>
            <option value="Institucional público">Institucional público </option>
            <option value="Minero">Minero </option>
            <option value="Pecuario">Pecuario </option>
            <option value="Preservación patrimonial">Preservación patrimonial </option>
            <option value="Protección ecológica">Protección ecológica </option>
            <option value="Recreación y deporte">Recreación y deporte </option>
            <option value="Religioso">Religioso </option>
            <option value="Residencial">Residencial </option>
            <option value="Salúd">Salúd </option>
            <option value="Seguridad">Seguridad </option>
            <option value="Servicios">Servicios </option>
            <option value="Servicios especiales">Servicios especiales </option>
            <option value="Transporte">Transporte </option>
            <option value="Turismo">Turismo </option>
            
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
          <br>          
          <label>Descripción:</label>
          <textarea  name="descripcion" id="descripcion" class='form-control' maxlength="255" ><?php echo utf8_encode($datos_predio->upd_descripcion);?></textarea>

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
				<br>        
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