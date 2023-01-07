<?php
  
    session_start();

   $id_prd=($_GET['id']);
   $clave=($_GET['ref']);
   $codigo=($_GET['cod']);
        

  


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
<title>Edición Construcciones</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="estilos/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>





</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">

                    <div class="col-sm-8"><h2>Edición <b>Construcciones</b></h2></div>

                    <div class="col-sm-4">
                      <br>
                        <a href="vistaConstruccionCaracteristicas.php?id=<?php echo $id_prd;?>&ref=<?php echo $clave;?>" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                        
                        
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


          


          //$clave_anterior = utf8_decode($predio->limpiar($_POST["clave_ant"]));

            $bloque = utf8_decode($_POST["bloque"]);              
            $piso = utf8_decode($_POST["piso"]);  
            $unidad = utf8_decode($_POST["unidad"]);   
            $nivel_piso = utf8_decode($_POST["nivel_piso"]);
            $condicion_fisica = utf8_decode($_POST["condicion_fisica"]);  
            $uso = utf8_decode($_POST["uso"]);  
            $valor_cultural = utf8_decode($_POST["valor_cultural"]);
            $area = utf8_decode($_POST["area"]);
            $anio_construccion = utf8_decode($_POST["anio_construccion"]);
            $anio_rest = utf8_decode($_POST["anio_rest"]);
            $conservacion = utf8_decode($_POST["conservacion"]);
            $mamposteria = utf8_decode($_POST["mamposteria"]);
            $columnas = utf8_decode($_POST["columnas"]);
            $vigas = utf8_decode($_POST["vigas"]);
            $entrepiso = utf8_decode($_POST["entrepiso"]);
            $cubierta_piso = utf8_decode($_POST["cubierta_piso"]);
            $gradas = utf8_decode($_POST["gradas"]);
            $contrapiso = utf8_decode($_POST["contrapiso"]);
            $paredes = utf8_decode($_POST["paredes"]);
            $enlucido_paredes = utf8_decode($_POST["enlucido_paredes"]);
            $enlucido_tumbados = utf8_decode($_POST["enlucido_tumbados"]);
            $rev_interior = utf8_decode($_POST["rev_interior"]);
            $rev_exterior = utf8_decode($_POST["rev_exterior"]);
            $rev_cubierta = utf8_decode($_POST["rev_cubierta"]);
            $tumbados = utf8_decode($_POST["tumbados"]);
            $ventanas = utf8_decode($_POST["ventanas"]);
            $vidrios = utf8_decode($_POST["vidrios"]);
            $puertas = utf8_decode($_POST["puertas"]);
            $closets = utf8_decode($_POST["closets"]);
            $pisos = utf8_decode($_POST["pisos"]);
            $ventanas_proteccion = utf8_decode($_POST["ventanas_proteccion"]);
            $gradas_acabados = utf8_decode($_POST["gradas_acabados"]);
            $clasificacion = utf8_decode($_POST["clasificacion"]);
            $tipo_vivienda = utf8_decode($_POST["tipo_vivienda"]);
            $ocupacion = utf8_decode($_POST["ocupacion"]);
            $piso_acabado = utf8_decode($_POST["piso_acabado"]);
            $piso_estado = utf8_decode($_POST["piso_estado"]);
            $hogares = utf8_decode($_POST["hogares"]);
            $habitantes = utf8_decode($_POST["habitantes"]);
            $habitaciones = utf8_decode($_POST["habitaciones"]);
            $dormitorios = utf8_decode($_POST["dormitorios"]);
            $duchas = utf8_decode($_POST["duchas"]);
            $tenencia_vivienda = utf8_decode($_POST["tenencia_vivienda"]);
            $telf_convencional = utf8_decode($_POST["telf_convencional"]);
            $celulares = utf8_decode($_POST["celulares"]);
            $internet = utf8_decode($_POST["internet"]);

            $total_pexclusiva = utf8_decode($_POST["total_pexclusiva"]);
            $total_pcomunal = utf8_decode($_POST["total_pcomunal"]);
            $alicuota = utf8_decode($_POST["alicuota"]);            
                    

          $res = $predio->actualizar_construccion_caracteristicas($bloque,$piso,$unidad,$nivel_piso,$condicion_fisica,$uso,$valor_cultural,$area,$anio_construccion,$anio_rest,$conservacion,$mamposteria,$columnas,$vigas,$entrepiso,$cubierta_piso,$gradas,$contrapiso,$paredes,$enlucido_paredes,$enlucido_tumbados,$rev_interior,$rev_exterior,$rev_cubierta,$tumbados,$ventanas,$vidrios,$puertas,$closets,$pisos,$ventanas_proteccion,$gradas_acabados,$clasificacion,$tipo_vivienda,$ocupacion,$piso_acabado,$piso_estado,$hogares,$habitantes,$habitaciones,$dormitorios,$duchas,$tenencia_vivienda,$telf_convencional,$celulares,$internet,$total_pexclusiva,$total_pcomunal,$alicuota,$codigo);
          if($res){
            $message= "Datos actualizados con éxito";
            $class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
            $log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización Construcciones:',$codigo,'predio: '.$clave);


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

        $datos_predio=$predio->registro_construccion_caracteristicas($codigo);
      ?>

      
      <div class="row">
        <form method="post">  
              
        <div class="col-md-12">
              
                  
                      <label>Clave Catastral: </label> <td><?php echo utf8_encode($datos_predio->cdc_clave_predio);?> </td>

    <br>
    <br>
    
    <hr>
    <h4><b>Clave Bloque:</b></h4>

    <p>
      <tr>    
        
            <td>No. Bloque:</td>
            <td>
              <select id="bloque" name="bloque" >
                <?php                      

                  echo '<option value="'.$datos_predio->cdc_numero_bloque.'"selected>'.$datos_predio->cdc_numero_bloque.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="0">0</option>
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
            
           </select> </td>
          </tr>
      </p>    
                
            
      <p>
      <tr>    
        
            <td>No. Piso:</td>
            <td>
              <select id="piso" name="piso" >
                <?php                      

                  echo '<option value="'.$datos_predio->cdc_numero_piso.'"selected>'.$datos_predio->cdc_numero_piso.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="0">0</option>
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
            
           </select> </td>
          </tr>
      </p>    

            
      <p>
      <tr>    
        
            <td>No. Unidad:</td>
            <td>
              <select id="unidad" name="unidad" >
                <?php                      

                  echo '<option value="'.$datos_predio->cdc_numero_unidad.'"selected>'.$datos_predio->cdc_numero_unidad.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="0">0</option>
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
            
           </select> </td>
          </tr>
      </p>    

<hr>


      <h4><b>Datos descriptivos del bloque:</b> </h4>
      <br>
      <p>
      <tr>      
        
            <td>Nivel del piso:</td>
            <td>
              <select id="nivel_piso" name="nivel_piso" >
                <?php                      

                  echo '<option value="'.$datos_predio->cdc_nivel_piso.'"selected>'.$datos_predio->cdc_nivel_piso.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Nivel calzada">Nivel calzada</option>
            <option value="Subsuelo">Subsuelo</option>
                      
            
           </select> </td>
          </tr>
      </p>    

           
      <p>
      <tr>      
        
            <td>Condición física:</td>
            <td>
              <select id="condicion_fisica" name="condicion_fisica" >
                <?php                      

              echo utf8_encode('<option value="'.$datos_predio->cdc_condicion_fisica.'"selected>'.$datos_predio->cdc_condicion_fisica.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Abandonado">Abandonado</option>
            <option value="En acabados">En acabados</option>
            <option value="En estructura">En estructura</option>
            <option value="Reconstruida">Reconstruida</option>
            <option value="Sin modificación">Sin modificación</option>
            <option value="Terminada">Terminada</option>
            <option value="En obra gris">En obra gris</option>
                        
           </select> </td>
          </tr>
      </p>    

           
      <p>
      <tr>      
        
            <td>Uso constructivo:</td>
            <td>
              <select id="uso" name="uso" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_uso_constructivo.'"selected>'.$datos_predio->cdc_uso_constructivo.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Balcón">Balcón</option>
            <option value="Banco">Banco</option>
            <option value="Baño/Sauna/Turco">Baño/Sauna/Turco</option>
            <option value="Bodega">Bodega</option>
            <option value="Casa">Casa</option>
            <option value="Casa comunal">Casa comunal</option>
            <option value="Cuarto de máquinas/basura">Cuarto de máquinas/basura</option>
            <option value="Departamento">Departamento</option>
            <option value="Garita/Guardianía">Garita/Guardianía</option>
            <option value="Gimnasio">Gimnasio</option> 
            <option value="Guardería">Guardería</option> 
            <option value="Hospital">Hospital</option> 
            <option value="Hostal">Hostal</option> 
            <option value="Hostería">Hostería</option> 
            <option value="Hotel">Hotel</option> 
            <option value="Iglesia">Iglesia</option> 
            <option value="Lavandería">Lavandería</option> 
            <option value="Local comercial">Local comercial</option> 
            <option value="Malecón">Malecón</option> 
            <option value="Maternidad">Maternidad</option> 
            <option value="Mercado">Mercado</option> 
            <option value="Mirador">Mirador</option> 
            <option value="Motel">Motel</option> 
            <option value="Museo">Museo</option> 
            <option value="Nave industrial">Nave industrial</option> 
            <option value="Oficina">Oficina</option> 
            <option value="Orfanato">Orfanato</option> 
            <option value="Organismos internacionales">Organismos internacionales</option> 
            <option value="Otros">Otros</option> 
            <option value="Parqueadero">Parqueadero</option> 
            <option value="Patio/Jardín">Patio/Jardín</option> 
            <option value="Pensión">Pensión</option> 
            <option value="Plantel avícola">Plantel avícola</option> 
            <option value="Plaza de toros">Plaza de toros</option> 
            <option value="Porqueriza">Porqueriza</option> 
            <option value="Recinto militar">Recinto militar</option> 
            <option value="Recinto policial">Recinto policial</option> 
            <option value="Reclusorio">Reclusorio</option> 
            <option value="Representaciones diplomáticas">Representaciones diplomáticas</option> 
            <option value="Restaurante">Restaurante</option>
            <option value="Retén policial">Retén policial</option>
            <option value="Sala comunal">Sala comunal</option>
            <option value="Sala de cine">Sala de cine</option>
            <option value="Sala de exposición">Sala de exposición</option>
            <option value="Sala de juegos">Sala de juegos</option>
            <option value="Sala de ordeño">Sala de ordeño</option>
            <option value="Sala de culto/Templo">Sala de culto/Templo</option>
            <option value="Sala de hospitalización">Sala de hospitalización</option>
            <option value="Salón de eventos">Salón de eventos</option>
            <option value="Teatro">Teatro</option>
            <option value="Terminal de transferencia">Terminal de transferencia</option>
            <option value="Terminal interprovincial">Terminal interprovincial</option>
            <option value="Terraza">Terraza</option>
            <option value="Unidad policía comunitaria">Unidad policía comunitaria</option>             
            <option value="Centro de salúd">Centro de salúd</option>             
            <option value="Galpón talleres menores">Galpón talleres menores</option>             
            <option value="Galpón pequeña industria">Galpón pequeña industria</option>             
            <option value="Galpón industrial">Galpón industrial</option>             
            <option value="Establecimiento educativo">Establecimiento educativo</option>             
            
           </select> </td>
          </tr>
      </p>    

         
      <p>
      <tr>      
        
            <td>Valor cultural:</td>
            <td>
              <select id="valor_cultural" name="valor_cultural" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_predio->cdc_valor_cultural.'"selected>'.$datos_predio->cdc_valor_cultural.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Ancestral">Ancestral</option>
            <option value="Arquitectónico">Arquitectónico</option>
            <option value="Histórico">Histórico</option>
            <option value="Reconstruida">Reconstruida</option>
                                    
           </select> </td>
          </tr>
      </p>    

           
     <p>
                Área de construcción(m2): <input name="area" id="area" type="text" maxlength="15" value="<?php echo utf8_encode($datos_predio->cdc_area_construccion);?>" />
                <br>                        
                
      </p>    
      
      <p>    
              <tr>
                <td>Año de construcción:</td>
                <td>
                  <select id="anio_construccion" name="anio_construccion">
                 <?php
                      echo '<option value="'.$datos_predio->cdc_anio_construccion.'"selected>'.$datos_predio->cdc_anio_construccion.'</option>';                                      
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

      <p>    
              <tr>
                <td>Año de restauración:</td>
                <td>
                  <select id="anio_rest" name="anio_rest">
                 <?php
                      echo '<option value="'.$datos_predio->cdc_anio_restauracion.'"selected>'.$datos_predio->cdc_anio_restauracion.'</option>';                                      
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
            
      <p>
      <tr>      
        
            <td>Estado de conservación:</td>
            <td>
              <select id="conservacion" name="conservacion" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_predio->cdc_estado_conservacion.'"selected>'.$datos_predio->cdc_estado_conservacion.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="Muy bueno">Muy bueno</option>
            <option value="Bueno">Bueno</option>
            <option value="Regular">Regular</option>
            <option value="Malo">Malo</option>
            <option value="A reparar">A reparar</option>
            <option value="Obsoleto(ruina)">Obsoleto(ruina)</option>
            <option value="En construcción">En construcción</option>
                                    
           </select> </td>
          </tr>
      </p>         
      <hr>
          
      <h4><b>Estructura: </b></h4>
      <br>
      <p>
      <tr>      
        
            <td>Mampostería soportante:</td>
            <td>
              <select id="mamposteria" name="mamposteria" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_predio->cdc_mamposteria_soportante.'"selected>'.$datos_predio->cdc_mamposteria_soportante.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Adobe">Adobe</option>
            <option value="Bloque">Bloque</option>
            <option value="Ladrillo">Ladrillo</option>
            <option value="Piedra">Piedra</option>
            <option value="Taplal">Taplal</option>
                                                
           </select> </td>
          </tr>
      </p>         

           
      <p>
      <tr>      
        
            <td>Columnas:</td>
            <td>
              <select id="columnas" name="columnas" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_predio->cdc_columnas.'"selected>'.$datos_predio->cdc_columnas.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Acero">Acero</option>
            <option value="Caña">Caña</option>
            <option value="Hierro perfil">Hierro perfil</option>
            <option value="Hormigón armado">Hormigón armado</option>
            <option value="Madera común">Madera común</option>
            <option value="Metal y hormigón">Metal y hormigón</option>
            <option value="Pilotaje de hormigón armado">Pilotaje de hormigón armado</option>
            <option value="Madera fina">Madera fina</option>
            <option value="Hierro cercha">Hierro cercha</option>
                                                
           </select> </td>
          </tr>
      </p> 

          
      <p>
      <tr>      
        
            <td>Vigas:</td>
            <td>
              <select id="vigas" name="vigas" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_predio->cdc_vigas.'"selected>'.$datos_predio->cdc_vigas.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Acero">Acero</option>
            <option value="Caña">Caña</option>
            <option value="Hierro perfil">Hierro perfil</option>
            <option value="Hormigón armado">Hormigón armado</option>
            <option value="Madera común">Madera común</option>
            <option value="Madera fina">Madera fina</option>
            <option value="Hierro cercha">Hierro cercha</option>
                                                
           </select> </td>
          </tr>
      </p>     


      
      <p>
      <tr>      
        
            <td>Entrepiso:</td>
            <td>
              <select id="entrepiso" name="entrepiso" >
                <?php                      

                  echo utf8_encode('<option value="'.$datos_predio->cdc_entrepiso.'"selected>'.$datos_predio->cdc_entrepiso.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Acero hormigón">Acero hormigón</option>
            <option value="Hierro hormigón">Hierro hormigón</option>
            <option value="Losa hormigón armado">Losa hormigón armado</option>
            <option value="Madera-hormigón">Madera-hormigón </option>
            <option value="Madera común">Madera común</option>
            <option value="Madera procesada fina">Madera procesada fina</option>
            <option value="Caña">Caña</option>
                                                
           </select> </td>
          </tr>
      </p>  

      
      <p>
      <tr>      
        
            <td>Cubierta - Entrepiso:</td>
            <td>
              <select id="cubierta_piso" name="cubierta_piso" >
                <?php                      

            echo utf8_encode('<option value="'.$datos_predio->cdc_cubierta_entrepiso.'"selected>'.$datos_predio->cdc_cubierta_entrepiso.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Acero">Acero</option>
            <option value="Caña">Caña</option>
            <option value="Hierro perfiles">Hierro perfiles</option>
            <option value="Losa hormigón armado">Losa hormigón armado</option>
            <option value="Madera común">Madera común</option>
            <option value="Madera procesada fina">Madera procesada fina</option>
            <option value="Estereoestructura">Estereoestructura</option>
                                                
           </select> </td>
          </tr>
      </p>

      
      <p>
      <tr>      
        
            <td>Gradas:</td>
            <td>
              <select id="gradas" name="gradas" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_gradas.'"selected>'.$datos_predio->cdc_gradas.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Madera común">Madera común</option>
            <option value="Metálica">Metálica</option>
            <option value="Hormigón armado">Hormigón armado</option>
            <option value="Madera fina">Madera fina</option>
            <option value="Mixta metálica">Mixta metálica</option>
                                                
           </select> </td>
          </tr>
      </p>


      <hr>
      <h4><b>Rellenos: </b></h4>
      <br>
      
      <p>
      <tr>      
        
            <td>Contrapiso:</td>
            <td>
              <select id="contrapiso" name="contrapiso" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_contrapiso.'"selected>'.$datos_predio->cdc_contrapiso.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Hormigón simple">Hormigón simple</option>
            <option value="Ladrillo visto">Ladrillo visto</option>
            <option value="Tierra">Tierra</option>
            <option value="Caña">Caña</option>
                                                
           </select> </td>
          </tr>
      </p>

     
      <p>
      <tr>      
        
            <td>Paredes:</td>
            <td>
              <select id="paredes" name="paredes" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_paredes.'"selected>'.$datos_predio->cdc_paredes.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Bahareque">Bahareque</option>
            <option value="Bloque">Bloque</option>
            <option value="Caña">Caña</option>
            <option value="Ladrillo">Ladrillo</option>
            <option value="Ferro cemento">Ferro cemento</option>
            <option value="Gypsum">Gypsum</option>
            <option value="Prefabricado">Prefabricado</option>
            <option value="Madera común">Madera común</option>
            <option value="Madera procesada fina">Madera procesada fina</option>
            <option value="Malla">Malla</option>
            <option value="Zinc">Zinc</option>
            <option value="Lona">Lona</option>                                                
            <option value="Piedra">Piedra</option>                                                
           </select> </td>
          </tr>
      </p>

      
      <p>
      <tr>      
        
            <td>Enlucido paredes:</td>
            <td>
              <select id="enlucido_paredes" name="enlucido_paredes" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_enlucido_paredes.'"selected>'.$datos_predio->cdc_enlucido_paredes.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Si tiene">Si tiene</option>
                                                                       
           </select> </td>
          </tr>
      </p>

      
      <p>
      <tr>      
        
            <td>Enlucido tumbados:</td>
            <td>
              <select id="enlucido_tumbados" name="enlucido_tumbados" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_elucido_tumbados.'"selected>'.$datos_predio->cdc_elucido_tumbados.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Si tiene">Si tiene</option>
                                                                       
           </select> </td>
          </tr>
      </p>


      <hr>
      <h4><b>Acabados: </b></h4>
      <br>
      
      <p>
      <tr>      
        
            <td>Revestimiento pared interior:</td>
            <td>
              <select id="rev_interior" name="rev_interior" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_revestimiento_pared_interior.'"selected>'.$datos_predio->cdc_revestimiento_pared_interior.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Calciminas">Calciminas</option>
            <option value="Pintura caucho">Pintura caucho</option>
            <option value="Pintura esmalte">Pintura esmalte</option>
            <option value="Graniplast">Graniplast</option>
            <option value="Alucobond aluminio">Alucobond aluminio</option>
            <option value="Cerámica">Cerámica</option>
            <option value="Fachaleta">Fachaleta</option>
            <option value="Laca">Laca</option>
            <option value="Madera">Madera</option>
            <option value="Mortero arena-cemento">Mortero arena-cemento</option>
                                                                                   
           </select> </td>
          </tr>
      </p>

      
      <p>
      <tr>      
        
            <td>Revestimiento pared exterior:</td>
            <td>
              <select id="rev_exterior" name="rev_exterior" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_revestimiento_pared_exterior.'"selected>'.$datos_predio->cdc_revestimiento_pared_exterior.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Calciminas">Calciminas</option>
            <option value="Pintura caucho">Pintura caucho</option>
            <option value="Pintura esmalte">Pintura esmalte</option>
            <option value="Graniplast">Graniplast</option>
            <option value="Alucobond aluminio">Alucobond aluminio</option>
            <option value="Cerámica">Cerámica</option>
            <option value="Fachaleta">Fachaleta</option>
            <option value="Laca">Laca</option>
            <option value="Madera">Madera</option>
            <option value="Mortero arena-cemento">Mortero arena-cemento</option>
                                                                                   
           </select> </td>
          </tr>
      </p>

      <p>
      <tr>      
        
            <td>Revestimiento cubierta:</td>
            <td>
              <select id="rev_cubierta" name="rev_cubierta" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_revestimiento_cubierta.'"selected>'.$datos_predio->cdc_revestimiento_cubierta.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Arena cemento">Arena cemento</option>
            <option value="Asbesto cemento">Asbesto cemento</option>
            <option value="Cady paja">Cady paja</option>
            <option value="Cerámica">Cerámica</option>
            <option value="Chova">Chova</option>
            <option value="Ferro cemento">Ferro cemento</option>
            <option value="Madera ladrillo">Madera ladrillo</option>
            <option value="Policarbonato">Policarbonato</option>
            <option value="Teja ordinaria">Teja ordinaria</option>
            <option value="Teja vidriada">Teja vidriada</option>
            <option value="Tejuelo">Tejuelo</option>
            <option value="Zinc">Zinc</option>
            <option value="Steel panel">Steel panel</option>
            <option value="Fibras naturales">Fibras naturales</option>
            <option value="Polietileno">Polietileno</option>
                                                                                   
           </select> </td>
          </tr>
      </p>

      
      <p>
      <tr>      
        
            <td>Tumbados:</td>
            <td>
              <select id="tumbados" name="tumbados" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_tumbados.'"selected>'.$datos_predio->cdc_tumbados.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Caña enlucida">Caña enlucida</option>
            <option value="Fibra mineral">Fibra mineral</option>
            <option value="Gypsum">Gypsum</option>
            <option value="Madera procesada fina">Madera procesada fina</option>
            <option value="Madera triplex">Madera triplex</option>
            <option value="Malla enlucida">Malla enlucida</option>
            <option value="Madera común">Madera común</option>
            <option value="Sintético">Sintético</option>
            <option value="Yeso + perfíl metálico">Yeso + perfíl metálico</option>
            <option value="Mortero arena-cemento">Mortero arena-cemento</option>
                                                                                               
           </select> </td>
          </tr>
      </p>

     
      <p>
      <tr>      
        
            <td>Ventanas:</td>
            <td>
              <select id="ventanas" name="ventanas" >
                <?php                      

              echo utf8_encode('<option value="'.$datos_predio->cdc_ventanas.'"selected>'.$datos_predio->cdc_ventanas.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Aluminio">Aluminio</option>
            <option value="Caña">Caña</option>
            <option value="Hierro">Hierro</option>
            <option value="Madera común">Madera común</option>
            <option value="Madera procesada fina">Madera procesada fina</option>
            <option value="Plástico preformado">Plástico preformado</option>
            <option value="Enrollable">Enrollable</option>
                                                                                                           
           </select> </td>
          </tr>
      </p>

     
      <p>
      <tr>      
        
            <td>Puertas:</td>
            <td>
              <select id="puertas" name="puertas" >
                <?php                      

              echo utf8_encode('<option value="'.$datos_predio->cdc_puertas.'"selected>'.$datos_predio->cdc_puertas.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Aluminio-vidrio">Aluminio-vidrio</option>
            <option value="Hierro">Hierro</option>
            <option value="Madera panelada">Madera panelada</option>
            <option value="Madera tamborada">Madera tamborada</option>
            <option value="Metálica enrollable">Metálica enrollable</option>
            <option value="Plástico preformado">Plástico preformado</option>
            <option value="Tol">Tol</option>
            <option value="Vidrio templado">Vidrio templado</option>
            <option value="Caña">Caña</option>
            <option value="Malla">Malla</option>
            <option value="Madera común">Madera común</option>
            <option value="Madera fina">Madera fina</option>
            <option value="Metálica reforzada">Metálica reforzada</option>
            <option value="Hierro-madera">Hierro-madera</option>
            <option value="Madera-malla">Madera-malla</option>
            
           </select> </td>
          </tr>
      </p>

  
      
      <p>
      <tr>      
        
            <td>Closets:</td>
            <td>
              <select id="closets" name="closets" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_closets.'"selected>'.$datos_predio->cdc_closets.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Si tiene">Si tiene</option>
                       
           </select> </td>
          </tr>
      </p>

      
      <p>
      <tr>      
        
            <td>Pisos:</td>
            <td>
              <select id="pisos" name="pisos" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_pisos.'"selected>'.$datos_predio->cdc_pisos.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Adoquín">Adoquín</option>
            <option value="Alfombra">Alfombra</option>
            <option value="Cerámica">Cerámica</option>
            <option value="Césped sintético">Césped sintético</option>
            <option value="Duela procesada">Duela procesada</option>
            <option value="En cemento">En cemento</option>
            <option value="Flotante">Flotante</option>
            <option value="Gres">Gres</option>
            <option value="Lámina de tol corrugado">Lámina de tol corrugado</option>
            <option value="Madera común">Madera común</option>
            <option value="Mármol">Mármol</option>
            <option value="Marmolina">Marmolina</option>
            <option value="Parquet">Parquet</option>
            <option value="Pintura">Pintura</option>
            <option value="Porcelanato">Porcelanato</option>
            <option value="Tablón">Tablón</option>
            <option value="Vinyl">Vinyl</option>
            
           </select> </td>
          </tr>
      </p>

      
      <p>
      <tr>      
        
            <td>Gradas:</td>
            <td>
              <select id="gradas_acabados" name="gradas_acabados" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_gradas_acabados.'"selected>'.$datos_predio->cdc_gradas_acabados.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Adoquín">Adoquín</option>
            <option value="Alfombra">Alfombra</option>
            <option value="Cerámica">Cerámica</option>
            <option value="Césped sintético">Césped sintético</option>
            <option value="Duela procesada">Duela procesada</option>
            <option value="En cemento">En cemento</option>
            <option value="Flotante">Flotante</option>
            <option value="Gres">Gres</option>
            <option value="Lámina de tol corrugado">Lámina de tol corrugado</option>
            <option value="Madera común">Madera común</option>
            <option value="Mármol">Mármol</option>
            <option value="Marmolina">Marmolina</option>
            <option value="Parquet">Parquet</option>
            <option value="Pintura">Pintura</option>
            <option value="Porcelanato">Porcelanato</option>
            <option value="Tablón">Tablón</option>
            <option value="Vinyl">Vinyl</option>
            
           </select> </td>
          </tr>
      </p>
      
      <p>
      <tr>      
        
            <td>Protección ventanas:</td>
            <td>
              <select id="ventanas_proteccion" name="ventanas_proteccion" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_proteccion_ventanas.'"selected>'.$datos_predio->cdc_proteccion_ventanas.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Si tiene">Si tiene</option>
                       
           </select> </td>
          </tr>
      </p>

      <hr>
      <h4><b>Unidad de vivienda: </b></h4>
      <br>

      <p>
      <tr>      
        
            <td>Clasificación de vivienda:</td>
            <td>
              <select id="clasificacion" name="clasificacion" >
                <?php                      

                echo utf8_encode('<option value="'.$datos_predio->cdc_clasificacion_vivienda.'"selected>'.$datos_predio->cdc_clasificacion_vivienda.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="No aplica">No aplica</option>
            <option value="Bodega">Bodega</option>
            <option value="Casa">Casa</option>
            <option value="Choza">Choza</option>
            <option value="Covacha">Covacha</option>
            <option value="Cuarto en casa de inquilinato">Cuarto en casa de inquilinato</option>
            <option value="Departamento en casa o edificio">Departamento en casa o edificio</option>
            <option value="Local comercial">Local comercial</option>
            <option value="Mediagua">Mediagua</option>
            <option value="Oficina">Oficina</option>
            <option value="Otra vivienda">Otra vivienda</option>
            <option value="Parqueadero">Parqueadero</option>
            <option value="Rancho">Rancho</option>
            <option value="Villa">Villa</option>
                        
           </select> </td>
          </tr>
      </p>

      <p>
      <tr>      
        
            <td>Tipo de vivienda:</td>
            <td>
              <select id="tipo_vivienda" name="tipo_vivienda" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_tipo_vivienda.'"selected>'.$datos_predio->cdc_tipo_vivienda.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Particular">Particular</option>
            <option value="Colectiva">Colectiva</option>
            
           </select> </td>
          </tr>
      </p>


      <p>
      <tr>      
        
            <td>Condición de ocupación:</td>
            <td>
              <select id="ocupacion" name="ocupacion" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_condicion_ocupacion.'"selected>'.$datos_predio->cdc_condicion_ocupacion.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Ocupada">Ocupada</option>
            <option value="Desocupada">Desocupada</option>
            
           </select> </td>
          </tr>
      </p>


      <p>
      <tr>      
        
            <td>Acabado piso:</td>
            <td>
              <select id="piso_acabado" name="piso_acabado" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_acabado_piso.'"selected>'.$datos_predio->cdc_acabado_piso.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Si tiene">Si tiene</option>
            
           </select> </td>
          </tr>
      </p>


      <p>
      <tr>      
        
            <td>Estado de piso:</td>
            <td>
              <select id="piso_estado" name="piso_estado" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_estado_piso.'"selected>'.$datos_predio->cdc_estado_piso.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="Bueno">Bueno</option>
            <option value="Malo">Malo</option>
            
           </select> </td>
          </tr>
      </p>


      <p>
      <tr>      
        
            <td>Número de hogares:</td>
            <td>
              <select id="hogares" name="hogares" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_numero_hogares.'"selected>'.$datos_predio->cdc_numero_hogares.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="0">0</option>
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
            
           </select> </td>
          </tr>
      </p>


      <p>
      <tr>      
        
            <td>Número de habitantes:</td>
            <td>
              <select id="habitantes" name="habitantes" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_numero_habitantes.'"selected>'.$datos_predio->cdc_numero_habitantes.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="0">0</option>
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
            
           </select> </td>
          </tr>
      </p>


      <p>
      <tr>      
        
            <td>Número de habitaciones:</td>
            <td>
              <select id="habitaciones" name="habitaciones" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_numero_habitaciones.'"selected>'.$datos_predio->cdc_numero_habitaciones.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="0">0</option>
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
            
           </select> </td>
          </tr>
      </p>

      <p>
      <tr>      
        
            <td>Número de dormitorios:</td>
            <td>
              <select id="dormitorios" name="dormitorios" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_numero_dormitorios.'"selected>'.$datos_predio->cdc_numero_dormitorios.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="0">0</option>
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
            
           </select> </td>
          </tr>
      </p>

      <p>
      <tr>      
        
            <td>Espacios para bañarse (duchas):</td>
            <td>
              <select id="duchas" name="duchas" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_espacios_aseo_duchas.'"selected>'.$datos_predio->cdc_espacios_aseo_duchas.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="0">0</option>
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
            
           </select> </td>
          </tr>
      </p>


      <p>
      <tr>      
        
            <td>Tenencia de la vivienda:</td>
            <td>
              <select id="tenencia_vivienda" name="tenencia_vivienda" >
                <?php                      

              echo utf8_encode('<option value="'.$datos_predio->cdc_tenencia_vivienda.'"selected>'.$datos_predio->cdc_tenencia_vivienda.'</option>');          
                  ?>

                <option value="">----------</option>
                              
            <option value="Anticresis">Anticresis</option>
            <option value="Arrendada">Arrendada</option>
            <option value="Por servicios">Por servicios</option>
            <option value="Prestada o cedida (no paga)">Prestada o cedida (no paga)</option>
            <option value="Propia (heredada,donada o posesión)">Propia (heredada,donada o posesión)</option>
            <option value="Propia y la está pagando">Propia y la está pagando</option>
            <option value="Propia y totalmente pagada">Propia y totalmente pagada</option>
                        
           </select> </td>
          </tr>
      </p>



      <p>
      <tr>      
        
            <td>Posee teléfono convencional:</td>
            <td>
              <select id="telf_convencional" name="telf_convencional" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_telefono_convencional.'"selected>'.$datos_predio->cdc_telefono_convencional.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Si tiene">Si tiene</option>
            
           </select> </td>
          </tr>
      </p>

     
      <p>
      <tr>      
        
            <td>No. de teléfonos celulares:</td>
            <td>
              <select id="celulares" name="celulares" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_cantidad_celulares.'"selected>'.$datos_predio->cdc_cantidad_celulares.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="0">0</option>
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
            
           </select> </td>
          </tr>
      </p>


      <p>
      <tr>      
        
            <td>Servicio de internet:</td>
            <td>
              <select id="internet" name="internet" >
                <?php                      

                echo '<option value="'.$datos_predio->cdc_servicio_internet.'"selected>'.$datos_predio->cdc_servicio_internet.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Si tiene">Si tiene</option>
            
           </select> </td>
          </tr>
      </p>
      <br>
      <hr>      
      <br>
      <br>  

      <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total propiedad exclusiva: <input name="total_pexclusiva" id="total_pexclusiva" type="text" maxlength="20" value="<?php echo utf8_encode($datos_predio->cdc_total_propiedad_exclusiva);?>" />
        </p>   

        <br>  
        <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total propiedad comunal: <input name="total_pcomunal" id="total_pcomunal" type="text" maxlength="20" value="<?php echo utf8_encode($datos_predio->cdc_total_propiedad_comunal);?>" />
        </p>   

        <br>  
        <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alícuota(%): <input name="alicuota" id="alicuota" type="text" maxlength="20" value="<?php echo utf8_encode($datos_predio->cdc_alicuota_porcentaje);?>" />
        </p>   

        <br>  
      
      <br>      
      
      </div>

      <div class="col-md-4">

           
  

        </div>

      
                   
        <br>
        <br>
        <br>
        <br>
            <div class="col-md-12 pull-right">
        <hr>
        <br>
        
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">Actualizar datos</button>
        <br>  
        <br> 
        <br>  
        <br> 
        <br> 
        
        </div>
        </form>

        <br>  

      
      </div>
        
    
</body>

</html>


<div class="footer span-6">
            <div class="container">
              <br>      
               <b class="copyright"><a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sistemas Web </a> &copy; <?php echo date("Y")?> catastros </b>
            </div>
        </div>