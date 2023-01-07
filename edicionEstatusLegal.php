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
<title>Estatus Legal Predio</title>
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

                    <div class="col-sm-8"><h2><b>Estatus legal del Predio</b></h2></div>

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
					
					$codigo=$predio->codigo_estatus_legal($clave);
                    $id_estatus=$codigo->elg_idestatus_legal;
					  					
  					$titulo = utf8_decode($_POST["titulo"]);	 
  					$escritura = utf8_decode($_POST["escritura"]);	 
                    $autoridad = utf8_decode($_POST["autoridad"]);  
  					$notaria = utf8_decode($_POST["notaria"]);
  					$provincia_titulo = utf8_decode($_POST["titulacion"]);
                    $canton_inscripcion = utf8_decode($_POST["canton_inscripcion"]);
                    $dia_protocolo = utf8_decode($_POST["dia_protocolo"]);
                    $mes_protocolo = utf8_decode($_POST["mes_protocolo"]);
                    $anio_protocolo = utf8_decode($_POST["anio_protocolo"]);
                    $registro_propiedad = utf8_decode($_POST["registro_propiedad"]);
                    $tomo = utf8_decode($_POST["tomo"]);
                    $partida = utf8_decode($_POST["partida"]);
                    $dia_inscripcion_reg = utf8_decode($_POST["dia_inscripcion_reg"]);
                    $mes_inscripcion_reg = utf8_decode($_POST["mes_inscripcion_reg"]);
                    $anio_inscripcion_reg = utf8_decode($_POST["anio_inscripcion_reg"]);
                    $area_titulo = utf8_decode($_POST["area_titulo"]);
                    $unidad_medida = utf8_decode($_POST["unidad_medida"]);
                    $tenencia = utf8_decode($_POST["tenencia"]);
                    $forma_adquisicion = utf8_decode($_POST["forma_adquisicion"]);
                    $perfeccionamiento = utf8_decode($_POST["perfeccionamiento"]);
                    $anios_sin_perfeccion = intval($_POST["anios_sin_perfeccion"]);
                    $anios_posesion = utf8_decode($_POST["anios_posesion"]);
                    $pueblo_etnia = utf8_decode($_POST["pueblo_etnia"]);
                    $adquisicion_no_titulo = utf8_decode($_POST["adquisicion_no_titulo"]);
                    $doc_presentado = utf8_decode($_POST["doc_presentado"]);
                    $primer_nom_pos = utf8_decode($_POST["primer_nom_pos"]);
                    $segundo_nom_pos = utf8_decode($_POST["segundo_nom_pos"]);
                    $primer_ap_pos = utf8_decode($_POST["primer_ap_pos"]);
                    $segundo_ap_pos = utf8_decode($_POST["segundo_ap_pos"]);
                    $doc_posesionario = utf8_decode($_POST["doc_posesionario"]);
                    $id_posesionario = intval($_POST["id_posesionario"]);
                    $email_pos = utf8_decode($_POST["email_pos"]);
                    $telefono_pos = utf8_decode($_POST["telefono_pos"]);            
            			

					$res = $predio->actualizar_estatus_legal($titulo,$escritura,$autoridad,$notaria,$provincia_titulo,$canton_inscripcion,$dia_protocolo,$mes_protocolo,$anio_protocolo,$registro_propiedad,$tomo,$partida,$dia_inscripcion_reg,$mes_inscripcion_reg,$anio_inscripcion_reg,$area_titulo,$unidad_medida,$tenencia,$forma_adquisicion,$perfeccionamiento,$anios_sin_perfeccion,$anios_posesion,$pueblo_etnia,$adquisicion_no_titulo,$doc_presentado,$primer_nom_pos,$segundo_nom_pos,$primer_ap_pos,$segundo_ap_pos,$doc_posesionario,$id_posesionario,$email_pos,$telefono_pos,$id_estatus);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
						$log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización Estatus legal:',' ',$clave);


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

				
                $datos_estatus=$predio->registro_estatus_legal($clave);
                
			?>

      
			<div class="row">
				<form method="post">  			
        
        <div class="col-md-4">
          		               

                <br>                                   
                    <p>
                      Clave predial: <input name="clave" id="clave" type="text" maxlength="20" value="<?php echo utf8_encode($datos_estatus->elg_clave_predio);?>" disabled/>
                    </p>     
                    
              
			            
    <p>
      <tr>    
        <br>
           <td>Predio con título:</td>
            <td>
              <select id="titulo" name="titulo" >
                <?php                      

                  echo '<option value="'.$datos_estatus->elg_titulo.'"selected>'.$datos_estatus->elg_titulo.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Si">Si </option>
            <option value="No">No </option>
                       
           </select> </td>
          </tr>
      </p>    
	 

      <p>
      <tr>    
        
           <td>Escritura:</td>
            <td>
              <select id="escritura" name="escritura" >
                <?php                      

                  echo '<option value="'.$datos_estatus->elg_escritura.'"selected>'.$datos_estatus->elg_escritura.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Si">Si </option>
            <option value="No">No </option>
                       
           </select> </td>
          </tr>
      </p>

      <p>
      <tr>    
        
           <td>Celebrado ante:</td>
            <td>
              <select id="autoridad" name="autoridad" >
                <?php                      

                  echo '<option value="'.$datos_estatus->elg_celebrado_ante.'"selected>'.$datos_estatus->elg_celebrado_ante.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Notario">Notario </option>
            <option value="Juez">Juez </option>
                       
           </select> </td>
          </tr>
      </p>


         <br>
          <p>
                Nro.Nombre Notaria: <input name="notaria" id="notaria" type="text" maxlength="45" value="<?php echo utf8_encode($datos_estatus->elg_nombre_numero_notaria);?>" />
                 <br>                      
                Provincia Incsripción Título: <input name="titulacion" id="titulacion" type="text" maxlength="45" value="<?php echo utf8_encode($datos_estatus->elg_provincia_titulacion);?>" />
                <br>
                Cantón Incsripción Título: <input name="canton_inscripcion" id="canton_inscripcion" type="text" maxlength="45" value="<?php echo utf8_encode($datos_estatus->elg_canton_inscripcion);?>" />
          </p>           

          <br>


          <p>            

          <tr> 
          <td><b>Fecha de Protocolización:</b></td>
          <br>
          <br>
           &nbsp;<td>Dia:</td>
            <td>
              <select id="dia_protocolo" name="dia_protocolo" >
                <?php                      

                  echo '<option value="'.$datos_estatus->elg_dia_protocolizacion.'"selected>'.$datos_estatus->elg_dia_protocolizacion.'</option>';          
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

                <br>
                <tr>
                <td>Mes:</td>
                <td>
                  <select name="mes_protocolo">
                <?php                      

                 echo '<option value="'.$datos_estatus->elg_mes_protocolizacion.'"selected>'.$datos_estatus->elg_mes_protocolizacion.'</option>';          
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
                  <select name="anio_protocolo">
    <?php
                      echo '<option value="'.$datos_estatus->elg_anio_protocolizacion.'"selected>'.$datos_estatus->elg_anio_protocolizacion.'</option>';                                      
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
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registro de la propiedad: &nbsp;&nbsp;&nbsp;&nbsp;<input name="registro_propiedad" id="registro_propiedad" type="text" maxlength="45" value="<?php echo utf8_encode($datos_estatus->elg_registro_propiedad);?>" />
                <br>
                <br>
                &nbsp;&nbsp;&nbsp;Tomo: <input name="tomo" id="tomo" type="text" maxlength="4" value="<?php echo utf8_encode($datos_estatus->elg_tomo);?>" />
                <br>
                Partida: <input name="partida" id="partida" type="text" maxlength="4" value="<?php echo utf8_encode($datos_estatus->elg_partida);?>" />


         </p>   
    
         <br>
         <br>

         <p>            

          <tr> 
          <td><b>Fecha Inscripción Registro propiedad:</b></td>
          <br>
          <br>
           &nbsp;<td>Dia:</td>
            <td>
              <select id="dia_inscripcion_reg" name="dia_inscripcion_reg" >
                <?php                      

                  echo '<option value="'.$datos_estatus->elg_dia_inscripcion_registro_propiedad.'"selected>'.$datos_estatus->elg_dia_inscripcion_registro_propiedad.'</option>';          
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

                <br>
                <tr>
                <td>Mes:</td>
                <td>
                  <select name="mes_inscripcion_reg">
                <?php                      

                 echo '<option value="'.$datos_estatus->elg_mes_inscripcion_registro_propiedad.'"selected>'.$datos_estatus->elg_mes_inscripcion_registro_propiedad.'</option>';          
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
                  <select name="anio_inscripcion_reg">
    <?php
                      echo '<option value="'.$datos_estatus->elg_anio_inscripcion_registro_propiedad.'"selected>'.$datos_estatus->elg_anio_inscripcion_registro_propiedad.'</option>';                                      
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Área según título: <input name="area_titulo" id="area_titulo" type="text" maxlength="10" value="<?php echo utf8_encode($datos_estatus->elg_area_segun_titulo);?>" />

        <br>        
        <tr> 
        <br>       
           &nbsp;<td>Unidad de medida:</td>
            <td>
              <select id="unidad_medida" name="unidad_medida" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_estatus->elg_unidad_medida.'"selected>'.$datos_estatus->elg_unidad_medida.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene </option>
            <option value="m²">m² </option>
            <option value="Hectáreas">Hectáreas </option>
            <option value="Cuadra">Cuadra </option>
            <option value="Solar">Solar </option>
            <option value="Leguas">Leguas </option>
            <option value="Acre">Acre </option>
            <option value="Otro">Otro </option>
                       
           </select> </td>
          </tr>

          <br>
          <tr>        
           <td>Forma de tenencia:</td>
            <td>
              <select id="tenencia" name="tenencia" >
                <?php                      

                  echo '<option value="'.$datos_estatus->elg_forma_tenencia.'"selected>'.$datos_estatus->elg_forma_tenencia.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Propietario">Propietario</option>
            <option value="Arrendatario">Arrendatario</option>
            <option value="Posesionario">Posesionario</option>
            <option value="Usufructuario">Usufructuario </option>
            <option value="Posesión efectiva">Posesión efectiva </option>
                                   
           </select> </td>
          </tr>


         </p>  

         
         <p> 
         <tr>    

        
           <td>Forma de Adquisición:</td>
            <td>
              <select id="forma_adquisicion" name="forma_adquisicion" >
                <?php                      

                  echo '<option value="'.$datos_estatus->elg_forma_adquisicion.'"selected>'.$datos_estatus->elg_forma_adquisicion.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Adjudicación">Adjudicación </option>
            <option value="Compra/Venta">Compra/Venta </option>
            <option value="Donación">Donación </option>
            <option value="Herencia">Herencia </option>
            <option value="Partición">Partición </option>
            <option value="Permuta">Permuta </option>
            <option value="Posesión">Posesión </option>
            <option value="Remate">Remate </option>
            <option value="Prescripción">Prescripción </option>
            <option value="Expropiación">Expropiación </option>
            <option value="Otros">Otros </option>
                       
           </select> </td>
          </tr>

        </p> 



     </div>  				
			
           
      <div class="col-md-4"> 
     
  
            <br>
            <p>
                <label><b>Identificación del Posesionario </b></label>>
                <br>    
                1er Apellido: <input name="primer_ap_pos" id="primer_ap_pos" type="text" maxlength="60" value="<?php echo utf8_encode($datos_estatus->elg_primer_apellido_posesionario);?>" />
                2do Apellido: <input name="segundo_ap_pos" id="segundo_ap_pos" type="text" maxlength="60" value="<?php echo utf8_encode($datos_estatus->elg_segundo_apellido_posesionario);?>" />
                <br>                
                1er Nombre: <input name="primer_nom_pos" id="primer_nom_pos" type="text" maxlength="60" value="<?php echo utf8_encode($datos_estatus->elg_primer_nombre_posesionario);?>" />
                2do Nombre: <input name="segundo_nom_pos" id="segundo_nom_pos" type="text" maxlength="60" value="<?php echo utf8_encode($datos_estatus->elg_segundo_nombre_posesionario);?>" />

            </p>  

            

            <p>            

          <tr>    
        <br>
           <td>Tipo de documento:</td>
            <td>
              <select id="doc_posesionario" name="doc_posesionario" >
                <?php                      

                  echo '<option value="'.$datos_estatus->elg_tipo_documento_posesionario.'"selected>'.$datos_estatus->elg_tipo_documento_posesionario.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Cédula">Cédula </option>
            <option value="Pasaporte">Pasaporte </option>
                       
           </select> </td>
          </tr>

        <br>
        <br>

        Identificación: <input name="id_posesionario" id="id_posesionario" type="text" maxlength="16" value="<?php echo utf8_encode($datos_estatus->elg_identificacion_posesionario);?>" />

        
        <br>
        <p>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email: <input name="email_pos" id="email_pos" type="text" maxlength="50" value="<?php echo utf8_encode($datos_estatus->elg_email_posesionario);?>" />
        </p>  

                
        <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefono: <input name="telefono_pos" id="telefono_pos" type="text" maxlength="25" value="<?php echo utf8_encode($datos_estatus->elg_telefono_posesionario);?>" />
        </p>  


        </p>  


        <p>            

        <tr>    

        <br>
           <td>Requiere perfeccionamiento:</td>
            <td>
              <select id="perfeccionamiento" name="perfeccionamiento" >
                <?php                      

                  echo '<option value="'.$datos_estatus->elg_requiere_perfeccionamiento.'"selected>'.$datos_estatus->elg_requiere_perfeccionamiento.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Si">Si </option>
            <option value="No">No </option>
                       
           </select> </td>
          </tr>
            <br>
            <br>
           Años sin perfeccionamiento: <input name="anios_sin_perfeccion" id="anios_sin_perfeccion" type="text" maxlength="5" value="<?php echo utf8_encode($datos_estatus->elg_anios_sin_perfeccionamiento);?>" />
           <br>
           Años en posesión: <input name="anios_posesion" id="anios_posesion" type="text" maxlength="5" value="<?php echo utf8_encode($datos_estatus->elg_anios_posesion);?>" />
           <br>
           Pueblo o Etnia:<br> <input name="pueblo_etnia" id="pueblo_etnia" type="text" maxlength="50" value="<?php echo utf8_encode($datos_estatus->elg_pueblo_etnia);?>" />
           

        </p> 

        
        <p>
            <tr>    

        <br>
           <td>Forma de Adquisición:</td>
            <td>
              <select id="adquisicion_no_titulo" name="adquisicion_no_titulo" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_estatus->elg_adquisicion_sin_titulo.'"selected>'.$datos_estatus->elg_adquisicion_sin_titulo.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="Sucesión de posesión">Sucesión de posesión </option>
            <option value="Cesión de posesión">Cesión de posesión </option>
            <option value="Posesión individual">Posesión individual </option>
            <option value="Otros">Otros </option>
                       
           </select> </td>
          </tr>

        </p>

        <br>

        <p>
        
        Documento presentado: <input name="doc_presentado" id="doc_presentado" type="text" maxlength="60" value="<?php echo utf8_encode($datos_estatus->elg_documento_presentado);?>" />

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
				<br>
                <br>
                <br>
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