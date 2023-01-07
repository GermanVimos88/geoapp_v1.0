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
<title>Identificación del Titular</title>
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

                    <div class="col-sm-8"><h2>Identificación <b>Titular</b></h2></div>

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
				$propietario= new Database();
				
				if(isset($_POST) && !empty($_POST)){


					
           $cedula = utf8_decode($_POST["cedula"]);	 
  					
  					$tipo = utf8_decode($_POST["tipo"]);	 
  					$primer_ap = utf8_decode($_POST["apellido_1"]);	 
            $segundo_ap = utf8_decode($_POST["apellido_2"]);  
  					$primer_nom = utf8_decode($_POST["nombre_1"]);
  					$segundo_nom = utf8_decode($_POST["nombre_2"]);
            $tipo_documento = utf8_decode($_POST["documento"]);
            $estado_civil = utf8_decode($_POST["estado_civil"]);
            $porcentaje_prt = utf8_decode($_POST["participacion"]);
            $representante = utf8_decode($_POST["representante"]);
            $anio_nacimiento = utf8_decode($_POST["anio_nacimiento"]);
            $mes_nacimiento = utf8_decode($_POST["mes_nacimiento"]);
            $dia_nacimiento = utf8_decode($_POST["dia_nacimiento"]);
            $nacionalidad = utf8_decode($_POST["nacionalidad"]);
            $email = utf8_decode($_POST["email"]);
            $telefono = utf8_decode($_POST["telefono"]);
            $ciudad_domicilio = utf8_decode($_POST["ciudad_domicilio"]);
            $dir_domicilio = utf8_decode($_POST["dir_domicilio"]);
            $jefe_hogar = utf8_decode($_POST["jefe_hogar"]);
            $personeria = utf8_decode($_POST["personeria"]);
            $ruc = utf8_decode($_POST["ruc"]);
            $razon_social = utf8_decode($_POST["razon_social"]);
            $acuerdo = utf8_decode($_POST["acuerdo"]);
            $rep_legal = utf8_decode($_POST["rep_legal"]);
            $conyugue = utf8_decode($_POST["conyugue"]);
            $apellidos_conyugue = utf8_decode($_POST["apellidos_conyugue"]);
            $nombres_conyugue = utf8_decode($_POST["nombres_conyugue"]);
            $doc_conyugue = utf8_decode($_POST["doc_conyugue"]);
            $id_conyugue = utf8_decode($_POST["id_conyugue"]);
            $telefono_conyugue = utf8_decode($_POST["telefono_conyugue"]);
            $porcentaje_conyugue = utf8_decode($_POST["porcentaje_conyugue"]);
            $email_conyugue = utf8_decode($_POST["email_conyugue"]);            
            			

					$res = $propietario->actualizar_propietario($tipo,$primer_ap,$segundo_ap,$primer_nom,$segundo_nom,$tipo_documento,$estado_civil,$porcentaje_prt,$representante,$anio_nacimiento,$mes_nacimiento,$dia_nacimiento,$nacionalidad,$email,$telefono,$ciudad_domicilio,$dir_domicilio,$jefe_hogar,$personeria,$ruc,$razon_social,$acuerdo,$rep_legal,$conyugue,$apellidos_conyugue,$nombres_conyugue,$doc_conyugue,$id_conyugue,$telefono_conyugue,$porcentaje_conyugue,$email_conyugue,$id_prd);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
						$log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización Propietario:',' ',$id_prd);


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

				$datos_propietario=$propietario->registro_propietario($id_prd);
			?>

      
			<div class="row">
				<form method="post">  
					          
        <div class="col-md-4">
          		<br>
                      <label>Clave Catastral: </label> <td><?php echo utf8_encode($clave);?> </td>
                                    
              <br>
                      
                       <br>
                    <p>
                      Cédula: <input name="cedula" id="cedula" type="text" maxlength="20" value="<?php echo utf8_encode($datos_propietario->pro_identificacion);?>" disabled/>
                    </p>     
                           
       <p>
        <tr>    
        <br>
           <td>Personeria:</td>
            <td>
              <select id="tipo" name="tipo" >
                <?php                      

                  echo '<option value="'.$datos_propietario->pro_tipo_propietario.'"selected>'.$datos_propietario->pro_tipo_propietario.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Natural">Natural </option>
            <option value="Jurídica">Jurídica </option>
            <option value="Posesionario">Posesionario </option>
                       
           </select> </td>
          </tr>
      </p>

      <br>
      <br>

      <p>
            Porcentaje(%): <input name="participacion" id="participacion" type="text" maxlength="5" value="<?php echo utf8_encode($datos_propietario->pro_participacion_porcentaje);?>" />

        </p>
        
        <p>            

        <tr>    

        <br>
           <td>Representante:</td>
            <td>
              <select id="representante" name="representante" >
                <?php                      

                  echo '<option value="'.$datos_propietario->pro_representante.'"selected>'.$datos_propietario->pro_representante.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Si">Si </option>
            <option value="No">No </option>
                       
           </select> </td>
          </tr>

        </p> 

        <p>            

          <tr>    
        <br>
           <td>Tipo de documento:</td>
            <td>
              <select id="documento" name="documento" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_propietario->pro_tipo_documento.'"selected>'.$datos_propietario->pro_tipo_documento.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="Cédula">Cédula </option>
            <option value="Pasaporte">Pasaporte </option>
                       
           </select> </td>
          </tr>

        </p>  

        <p>            

          <tr>    
        <br>
           <td>Estado civil:</td>
            <td>
              <select id="estado_civil" name="estado_civil" >
                <?php                      

                  echo '<option value="'.$datos_propietario->pro_estado_civil.'"selected>'.$datos_propietario->pro_estado_civil.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Soltero">Soltero </option>
            <option value="Casado">Casado </option>
            <option value="Divorciado">Divorciado </option>
            <option value="Viudo">Viudo </option>
            <option value="Unión de hecho">Unión de hecho </option>
                       
           </select> </td>
          </tr>

        </p>       


			</div>


			
      <div class="col-md-4">
              
         <br>
         <br>
         <br>
          <p>
                Apellido 1: <input name="apellido_1" id="apellido_1" type="text" maxlength="45" value="<?php echo utf8_encode($datos_propietario->pro_primer_apellido);?>" />
                                       
                Apellido 2: <input name="apellido_2" id="apellido_2" type="text" maxlength="45" value="<?php echo utf8_encode($datos_propietario->pro_segundo_apellido);?>" />
          </p>           

          <br>
         <p>
                Nombre 1: <input name="nombre_1" id="nombre_1" type="text" maxlength="45" value="<?php echo utf8_encode($datos_propietario->pro_primer_nombre);?>" />
                Nombre 2: <input name="nombre_2" id="nombre_2" type="text" maxlength="45" value="<?php echo utf8_encode($datos_propietario->pro_segundo_nombre);?>" />

         </p>   

          
          <p>            
          <br>  
          <tr> 
          <td><b>Fecha de Nacimiento:</b></td>
          <br>
          <br>
           <td>Dia:</td>
            <td>
              <select id="dia_nacimiento" name="dia_nacimiento" >
                <?php                      

                  echo '<option value="'.$datos_propietario->pro_dia_nacimiento.'"selected>'.$datos_propietario->pro_dia_nacimiento.'</option>';          
                  ?>

                <option value="">----------</option>                              
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                       
           </select> </td>
          </tr>

        
                <tr>
                <td>Mes:</td>
                <td>
                  <select name="mes_nacimiento">
                <?php                      

                 echo '<option value="'.$datos_propietario->pro_mes_nacimiento.'"selected>'.$datos_propietario->pro_mes_nacimiento.'</option>';          
                ?>

                <option value="">----------</option>
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
                </select> </td>
                </tr>

              <br>    
              <tr>
                <td>Año:</td>
                <td>
                  <select name="anio_nacimiento">
    <?php
                      echo '<option value="'.$datos_propietario->pro_anio_nacimiento.'"selected>'.$datos_propietario->pro_anio_nacimiento.'</option>';                                      
                ?>
                <option value="">----------</option>                
                <option value="1930">1930</option>
                <option value="1931">1931</option>
                <option value="1932">1932</option>
                <option value="1933">1933</option>
                <option value="1934">1934</option>
                <option value="1935">1935</option>
                <option value="1936">1936</option>
                <option value="1937">1937</option>
                <option value="1938">1938</option>
                <option value="1939">1939</option>
                <option value="1940">1940</option>
                <option value="1941">1941</option>
                <option value="1942">1942</option>
                <option value="1943">1943</option>
                <option value="1944">1944</option>
                <option value="1945">1945</option>
                <option value="1946">1946</option>
                <option value="1947">1947</option>
                <option value="1948">1948</option>
                <option value="1949">1949</option>
                <option value="1950">1950</option>
                <option value="1951">1951</option>
                <option value="1952">1952</option>
                <option value="1953">1953</option>
                <option value="1954">1954</option>
                <option value="1955">1955</option>
                <option value="1956">1956</option>
                <option value="1957">1957</option>
                <option value="1958">1958</option>
                <option value="1959">1959</option>
                <option value="1960">1960</option>
                <option value="1961">1961</option>
                <option value="1962">1962</option>
                <option value="1963">1963</option>
                <option value="1964">1964</option>
                <option value="1965">1965</option>
                <option value="1966">1966</option>
                <option value="1967">1967</option>
                <option value="1968">1968</option>
                <option value="1969">1969</option>
                <option value="1970">1970</option>
                <option value="1971">1971</option>
                <option value="1972">1972</option>
                <option value="1973">1973</option>
                <option value="1974">1974</option>
                <option value="1975">1975</option>
                <option value="1976">1976</option>
                <option value="1977">1977</option>
                <option value="1978">1978</option>
                <option value="1979">1979</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                </select> </td>
                </tr>

        </p>  

        <br>
         <p>
                Nacionalidad: <input name="nacionalidad" id="nacionalidad" type="text" maxlength="45" value="<?php echo utf8_encode($datos_propietario->pro_nacionalidad);?>" />

                Email: <input name="email" id="email" type="text" maxlength="45" value="<?php echo utf8_encode($datos_propietario->pro_email);?>" />
                <br>
                Teléfono: <input name="telefono" id="telefono" type="text" maxlength="20" value="<?php echo utf8_encode($datos_propietario->pro_telefono);?>" />


         </p>   

         <br>
         <p>
                Ciudad domicilio: <input name="ciudad_domicilio" id="ciudad_domicilio" type="text" maxlength="45" value="<?php echo utf8_encode($datos_propietario->pro_ciudad_domicilio);?>" />

                <br>
                Dirección domicilio: <input name="dir_domicilio" id="dir_domicilio" type="text" maxlength="80" value="<?php echo utf8_encode($datos_propietario->pro_direccion_domicilio);?>" />


         </p>  
         
         <p> 
         <tr>    

        <br>
           <td>¿Es jefe de hogar?:</td>
            <td>
              <select id="jefe_hogar" name="jefe_hogar" >
                <?php                      

                  echo '<option value="'.$datos_propietario->pro_jefe_hogar.'"selected>'.$datos_propietario->pro_jefe_hogar.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Si">Si </option>
            <option value="No">No </option>
                       
           </select> </td>
          </tr>

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