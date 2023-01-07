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
<title>Edición Obras</title>
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

                    <div class="col-sm-8"><h2>Edición <b>Obras complementarias</b></h2></div>

                    <div class="col-sm-4">
                      <br>
                        <a href="vistaObrasComplementarias.php?id=<?php echo $id_prd;?>&ref=<?php echo $clave;?>" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                        
                        
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

            $tipo = utf8_decode($_POST["tipo"]);              
            $dimension_a = utf8_decode($_POST["dim_a"]);  
            $dimension_b = utf8_decode($_POST["dim_b"]);   
            $dimension_c = utf8_decode($_POST["dim_c"]);
            $cantidad = utf8_decode($_POST["cantidad"]);  
            $material = utf8_decode($_POST["material"]);  
            $edad = utf8_decode($_POST["edad"]);
            $estado = utf8_decode($_POST["estado"]);
            

          $res = $predio->actualizar_obras_complementarias($tipo,$dimension_a,$dimension_b,$dimension_c,$cantidad,$material,$edad,$estado,$codigo);
          if($res){
            $message= "Datos actualizados con éxito";
            $class="alert alert-success";
            //$log = new Log("log", "/home/servipatrimonio/Documents/logs/".$_SESSION['usuario']);
            //echo $log->insert($_SESSION['usuario'].": ".'Esto es un update! en el registro INV-'.$id, false, true, true);
            $log = new actividadUsuario();
            $log->registro_actividad($_SESSION['usuario'],'Actualización Obra complementaria:',' ',$clave);


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

        $datos_predio=$predio->registro_obras_complementarias($codigo);
      ?>

      
      <div class="row">
        <form method="post">  
              
        <div class="col-md-8">
              
          <br>

          
                      <label>Clave Catastral: </label> <td><?php echo utf8_encode($datos_predio->obc_clave_predio);?> </td>

                                               
    <p>
      <tr>    
        
        <br>
        <br>
            <td>Tipo de Obra:</td>
            <td>
              <select id="tipo" name="tipo" >
                <?php                      

                  echo '<option value="'.$datos_predio->obc_tipo_obra.'"selected>'.$datos_predio->obc_tipo_obra.'</option>';          
                  ?>

                <option value="">----------</option>
                              
            <option value="No tiene">No tiene</option>
            <option value="Aceras y cercas">Aceras y cercas</option>
            <option value="Canal de riego ocasional">Canal de riego ocasional</option>
            <option value="Canal de riego permanente">Canal de riego permanente</option>
            <option value="Cerramiento">Cerramiento</option>
            <option value="Desecación de pantanos">Desecación de pantanos</option>
            <option value="Establo">Establo</option>
            <option value="Estanque/Reservorio">Estanque/Reservorio</option>
            <option value="Funiculares">Funiculares</option>
            <option value="Galpón avícola">Galpón avícola</option>
            <option value="Invernaderos">Invernaderos</option>
            <option value="Muro de contención">Muro de contención</option>
            <option value="Parques-jardines">Parques-jardines</option>
            <option value="Piscina camaronera">Piscina camaronera</option>
            <option value="Piscina piscícola">Piscina piscícola</option>
            <option value="Piscinas de natación">Piscinas de natación</option>
            <option value="Pista de aterrizaje">Pista de aterrizaje</option>
            <option value="Planta de pos cosecha">Planta de pos cosecha</option>
            <option value="Pozo de riego">Pozo de riego</option>
            <option value="Rellenos de quebradas">Rellenos de quebradas</option>
            <option value="Repavimentación urbana">Repavimentación urbana</option>
            <option value="Sala de ordeño">Sala de ordeño</option>
            <option value="Sitio/Almacenamientos">Sitio/Almacenamientos</option>
            <option value="Tendales">Tendales</option>
            <option value="Vías internas">Vías internas</option>
            <option value="Viveros">Viveros</option>
            <option value="Otros">Otros</option>
            <option value="Cancha">Cancha</option>
            <option value="Parqueaderos">Parqueaderos</option>
            <option value="Cubiertas-entechados">Cubiertas-entechados</option>
            
           </select> </td>
          </tr>
      </p>    
                
      <br> 
      <p>
                Dimensión a: <input name="dim_a" id="dim_a" type="text" maxlength="15" value="<?php echo utf8_encode($datos_predio->obc_dimension_a);?>" />(m)
                <br>                        
                Dimensión b: <input name="dim_b" id="dim_b" type="text" maxlength="15" value="<?php echo utf8_encode($datos_predio->obc_dimension_b);?>" />(m)
                <br> 
                Dimensión c: <input name="dim_c" id="dim_c" type="text" maxlength="15" value="<?php echo utf8_encode($datos_predio->obc_dimension_c);?>" />(m)
          </p>    

          <br> 
      <p>
                Cantidad m/m2/m3: <input name="cantidad" id="cantidad" type="text" maxlength="20" value="<?php echo utf8_encode($datos_predio->obc_cantidad_metros);?>" />(m)
        </p>   



      <br>  
      <p>
      <tr>
            <td>Material:</td>
            <td>
              <select id="material" name="material">
                <?php                      

                  echo '<option value="'.$datos_predio->obc_material.'"selected>'.$datos_predio->obc_material.'</option>';          
                  ?>

                <option value="">----------</option>
            <option value="Bloque">Bloque</option>
            <option value="Ladrillo">Ladrillo</option>
            <option value="Metal">Metal</option>
            <option value="Hormigón armado">Hormigón armado</option>
            <option value="Mixto">Mixto</option>
            <option value="Bloque/Ladrillo + Columna hormigón">Bloque/Ladrillo + Columna hormigón</option>
            <option value="Muro Bloque/Ladrillo + Columna hormigón + malla">Muro Bloque/Ladrillo + Columna hormigón + malla</option>
            <option value="Malla simple">Malla simple</option>
            <option value="Malla electrosoldada">Malla electrosoldada</option>
            <option value="Muro bloque/ladrillo + verjas de hierro">Muro bloque/ladrillo + verjas de hierro</option>
            <option value="Verjas de hierro">Verjas de hierro</option>            
            </select> </td>
          </tr>
      </p>

      <br>      
      
      </div>

      <div class="col-md-4">

      <br>
      <br>
      <br>
      <br>

      <p>
                Edad: <input name="edad" id="edad" type="text" maxlength="20" value="<?php echo utf8_encode($datos_predio->obc_edad);?>" />
        </p> 


        <br>  
      <p>
      <tr>
            <td>Estado:</td>
            <td>
              <select id="estado" name="estado">
                <?php                      

                  echo '<option value="'.$datos_predio->obc_estado.'"selected>'.$datos_predio->obc_estado.'</option>';          
                  ?>

                <option value="">----------</option>
            <option value="Muy bueno">Muy bueno</option>
            <option value="Bueno">Bueno</option>
            <option value="Regular">Regular</option>
            <option value="Malo">Malo</option>
                       
            </select> </td>
          </tr>
      </p>  
  

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