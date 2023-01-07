<?php




	session_start();

    include ("actividadUsuario.php");

	if($_POST['Salir']){ // cuando presiona el botón salir
    //$log = new actividadUsuario();
    //$log->registro_actividad($_SESSION['usuario'],'Cerró sesión',' ',' ');
    header('Location: login.php');    
    unset($_SESSION['id_usuario']); //destruye la sesión
      }


	 if (!isset($_SESSION['id_usuario']) and !isset($_POST['Salir'])) {
  		  	header('Location: error.php?mensaje=No has iniciado sesion');
    		unset($_SESSION['id_usuario']); //destruye la sesión
 			}

		else  {
	
 	?>


<!DOCTYPE html>

<html >
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menú Principal</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-latest.js"></script>
<script src="miscript.js"></script> 
</head>
<body>
    <center>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    
                    <br>
                    <br>
                    <br>
                    <div class="col-lg-10"><h1> <b>Menú Principal</b></h1></div>
                    <br>
                    <hr>                    
                    <br>
                    <br>
                    <br>
                    
                    
                    <center>
						<div class="col-sm-8"><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Escoja una  <b>Opción:</b></h4></div>
                    	
                    					           			
                	</div>
                				
            	</div>           
            					<tbody>    
  								<br>
  								  								                        
                				

                                <div class="col-sm-7">

                                <h3><b>CATASTRO </b> </h3>

                                <a href="buscarPredio.php" class="btn btn-info add-new"><i ></i>Gestión de Fichas</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                <br>
                                <br>
                				
                                <br>
                                <br>
                                
                                     					
    							
                            </div>


                            <div class="col-sm-2">

                             <h3><b>SIG</b> </h3>

                             <a href="visor/index.html" class="btn btn-info add-new"><i ></i>Visor Geográfico</a> &nbsp;&nbsp;&nbsp;&nbsp;


                             </div>

                        
                        
                        


                            

                				</tbody> 

                					<form name = "formularioIndex" action="index.php" method="post">
                						<br/>
                				<br/>
                				<br/>
                				<br/>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                				
      								<input name="Salir" value="Cerrar sesión" class="btn btn-danger"  type="submit"/>
      								</form>
                				    	
           				           		
        </div>
    </div>     





</body>
</html>

<?php	

  }
