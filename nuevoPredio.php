<?php
	
    session_start();

  
 if($_POST['Salir']){ // cuando presiona el botón salir
    header('Location: index.php');
    
      }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nuevo predio</title>
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
                    <div class="col-sm-8"><h2>Agregar <b>Predio</b></h2></div>
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
				$predio= new Database();
				
				if(isset($_POST) && !empty($_POST)){
			

            $clave_catastral=$_POST["provincia_clave"].$_POST["canton_clave"].$_POST["parroquia_clave"].$_POST["zona_clave"].$_POST["sector_clave"].$_POST["manzana_clave"].$_POST["lote_clave"];
  					
            $clave_antigua = $_POST["provincia_clave"].$_POST["canton_clave"].$_POST["parroquia_clave"].$_POST["zona_clave"].$_POST["sector_clave"].$_POST["manzana_clave"].$_POST["lote_clave"].'000';
					              				
					  $tipo = utf8_decode($_POST["tipo"]);             
            $regimen = utf8_decode($_POST["tenencia"]);  
            $bloque = utf8_decode($_POST["bloque"]);   
            $piso = trim(utf8_decode($_POST["piso"]));
            $unidad = utf8_decode($_POST["unidad"]);  
            $numero_predio = utf8_decode($_POST["num_predio"]);

            $personeria = utf8_decode($_POST["personeria"]);  
            $doc = utf8_decode($_POST["documento"]);
            $cedula = utf8_decode($_POST["cedula"]);
            $ap1 = utf8_decode($_POST["apellido_1"]);
            $ap2 = utf8_decode($_POST["apellido_2"]);      
            $nombre1 = utf8_decode($_POST["nombre_1"]);
            $nombre2 = utf8_decode($_POST["nombre_2"]);
            $ruc = utf8_decode($_POST["ruc"]);

            $observaciones = utf8_decode($_POST["observaciones"]);
		
					
          $res1 = $predio->guardar_propietario_nuevo($personeria,$doc,$cedula,$ap1,$ap2,$nombre1,$nombre2,$ruc);         

					$res2 = $predio->guardar_predio($clave_catastral,$clave_antigua,$cedula,$tipo,$regimen,$bloque,$piso,$unidad,$numero_predio,$observaciones);
					if($res1 AND $res2){
						$message= "Datos guardados con éxito";
						$class="alert alert-success";
						$log = new actividadUsuario();
				    $log->registro_actividad($_SESSION['usuario'],'Nuevo predio '.$clave_catastral,'Propietario '.$personeria,$cedula);
						
					}else{
						$message="No se pudieron guardar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				//$datos_investigacion=$investigacion->registro_investigacion($id);
			?>
			<div class="row">
				<form method="post"> 
				
        
				<div class="col-md-6">
          
					<br>
          <br>
          <label><b>Clave Catastral:</b></label>
										
				<p>
            <tr>              
              <br>
            <td>Provincia:</td>
            <td>
              <select id="provincia_clave" name="provincia_clave">
                
            <option value="15"selected>15</option>                                      
                 
            <option value="">--------------</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
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
            </select> </td>
          </tr>
            </p>


            <p>
            <tr>
            <td>&nbsp;&nbsp;&nbsp;Cantón:</td>
            <td>
              <select id="canton_clave" name="canton_clave">
                
            <option value="07"selected>07</option>                                      
                 
            <option value="">--------------</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            
            </select> </td>
          </tr>
            </p>


            <p>
            <tr>              
            <td>Parroquia:</td>
            <td>
              <select id="parroquia_clave" name="parroquia_clave">
                
            <option value="52"selected>52</option>                                      
                 
            <option value="">--------------</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
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
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
            <option value="47">47</option>
            <option value="48">48</option>
            <option value="49">49</option>
            <option value="50">50</option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53</option>
            <option value="54">54</option>
            <option value="55">55</option>

            </select> </td>
          </tr>
            </p>


            <p>
            <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zona</td>
            <td>
              <select id="zona_clave" name="zona_clave">
                
            <option value="03"selected>03</option>                                      
                 
            <option value="">--------------</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
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
            </select> </td>
          </tr>
            </p>


            <p>
            <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sector</td>
            <td>
              <select id="sector_clave" name="sector_clave">
                
            <option value="01"selected>01</option>                                      
                 
            <option value="">--------------</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
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
            </select> </td>
          </tr>
            </p>

            <p>
            <tr>
            <td>&nbsp;&nbsp;Manzana</td>
            <td>
              <select id="manzana_clave" name="manzana_clave">
                
            <option value="001"selected>001</option>                                      
                 
            <option value="">--------------</option>
            <option value="001">001</option>
            <option value="002">002</option>
            <option value="003">003</option>
            <option value="004">004</option>
            <option value="005">005</option>
            <option value="006">006</option>
            <option value="007">007</option>
            <option value="008">008</option>
            <option value="009">009</option>
            <option value="010">010</option>
            <option value="011">011</option>
            <option value="012">012</option>
            <option value="013">013</option>
            <option value="014">014</option>
            <option value="015">015</option>
            <option value="016">016</option>
            <option value="017">017</option>
            <option value="018">018</option>
            <option value="019">019</option>
            <option value="020">020</option>
            <option value="021">021</option>
            <option value="022">022</option>
            <option value="023">023</option>
            <option value="024">024</option>
            <option value="025">025</option>
            </select> </td>
          </tr>
            </p>


                <p>
            <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lote</td>
            <td>
              <select id="lote_clave" name="lote_clave">
                
            <option value="001"selected>001</option>                                      
                 
            <option value="">--------------</option>
            <option value="001">001</option>
            <option value="002">002</option>
            <option value="003">003</option>
            <option value="004">004</option>
            <option value="005">005</option>
            <option value="006">006</option>
            <option value="007">007</option>
            <option value="008">008</option>
            <option value="009">009</option>
            <option value="010">010</option>
            <option value="011">011</option>
            <option value="012">012</option>
            <option value="013">013</option>
            <option value="014">014</option>
            <option value="015">015</option>
            <option value="016">016</option>
            <option value="017">017</option>
            <option value="018">018</option>
            <option value="019">019</option>
            <option value="020">020</option>
            <option value="021">021</option>
            <option value="022">022</option>
            <option value="023">023</option>
            <option value="024">024</option>
            <option value="025">025</option>
            </select> </td>
          </tr>
            </p>



            <p>
      <tr>    
        <br>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de Predio:</td>
            <td>
              <select id="tipo" name="tipo" >
                                   

              <option value="Urbano"selected>Urbano</option>          

              <option value="">----------</option>
                              
            <option value="Urbano">Urbano</option>
            <option value="Rural">Rural</option>
            <option value="Expansión Urbana">Expansión Urbana</option>
                       
           </select> </td>
          </tr>
      </p>    
          
      <br>  
      <p>
      <tr>
            <td>Regimen de tenencia (propiedad):</td>
            <td>
              <select id="tenencia" name="tenencia">
                

                  <option value="Unipropiedad"selected>Unipropiedad</option>          
                  

            <option value="">----------</option>
            <option value="Unipropiedad">Unipropiedad (Up)</option>
            <option value="Propiedad horizontal">Propiedad horizontal (Ph)</option>
            <option value="Derecha y Acciones">Derecha y Acciones (DA)</option>
                        
            </select> </td>
          </tr>
      </p>

      <br>  
      <label>Propiedad horizontal:</label> 
      
    <p>
      <tr>
            <td>Bloque:</td>
            <td>
              <select id="bloque" name="bloque">
                                      

                <option value="s/n"selected>s/n</option>          
                

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
                        
            </select> </td>
          </tr>
      
          <br>
      <tr>
            &nbsp;&nbsp;&nbsp;&nbsp;<td>Piso:</td>
            <td>
              <select id="piso" name="piso">
                   
                <option value="s/n"selected>s/n</option>          

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
                        
            </select> </td>
          </tr>

          <br>
          <tr>
            <td>Unidad:</td>
            <td>
              <select id="unidad" name="unidad">
                              

            <option value="s/n"selected>s/n</option>          
                

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
                        
            </select> </td>
          </tr>

      </p>                            
      <br>
      <p>
              <tr>

                 <label>Número del predio:</label>
                      <br>
                     <textarea name="num_predio" id="num_predio" type="text" maxlength="20" >s/n </textarea>

              </tr>
            </p>


				</div>
				
				
        <br>      
        <br>
								
				<div class="col-md-5">
          					
          <label>Datos del Propietario:</label> 
                                    
       <p>
        <tr>    
        <br>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personeria:</td>
            <td>
              <select id="personeria" name="personeria" >
                                     

                <option value="s/n"selected>s/n</option>';          
                

                <option value="">----------</option>
                              
            <option value="Natural">Natural </option>
            <option value="Jurídica">Jurídica </option>
            <option value="Posesionario">Posesionario </option>
                       
           </select> </td>
          </tr>
      </p>


      <p>            

          <tr>    
        <br>
           <td>&nbsp;&nbsp;Tipo de documento:</td>
            <td>
              <select id="documento" name="documento" >
                                      

                <option value="s/n"selected>s/n</option>          
                
                <option value="">----------</option>
                              
            <option value="Cédula">Cédula </option>
            <option value="Pasaporte">Pasaporte </option>
                       
           </select> </td>
          </tr>

        </p>  

        <br>
          <p>
          No. ID: <input name="cedula" id="cedula" type="text" maxlength="20" value=""/>
          </p>  

          <br>  
          <label>Propietario/Representante:</label>

          <br>
          <p>
                Apellido 1: <input name="apellido_1" id="apellido_1" type="text" maxlength="45" value="" />
                 <br>                        
                Apellido 2: <input name="apellido_2" id="apellido_2" type="text" maxlength="45" value="" />
          </p>           

          <br>
         <p>
                Nombre 1: <input name="nombre_1" id="nombre_1" type="text" maxlength="45" value="" />
                <br>  
                Nombre 2: <input name="nombre_2" id="nombre_2" type="text" maxlength="45" value="" />

         </p>   


         <br>
          <p>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RUC: <input name="ruc" id="ruc" type="text" maxlength="20" value=""/>
          </p> 

          <br>
          <br>
          <br>
          <br> 

          <label><b>Recomendación:</b> </label> Editar para agregar mas datos del nuevo predio 
     
        </div>
        
          

          <div class="col-md-12">
          <br>
          <label>Observaciones:</label>
          <textarea  name="observaciones" id="observaciones" class='form-control' maxlength="400" >Ninguna</textarea>
          </div>




				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html> 