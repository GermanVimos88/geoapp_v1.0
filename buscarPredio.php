<?php

                                //Formulario Buscar predio
session_start();

//include('fpdf.php');
//include('reporteAvaluoPrd.php');

 
//include("ajax_grid.php");

//if (isset($_GET['cod'])){
    //$id_yacimiento_principal=($_GET['cod']); //talvez funcione con inv_codigo_investigacion
  //} else {
    //header("location:VistaYacimientoGeneral.php");
  //}




/*if($_POST['Salir']){ // cuando presiona el botòn salir
    unset($_SESSION['id_usuario']); //destruye la sesión
    header('Location: index.php');
    
  }*/
        /*
            if ($_POST["Enviar"]){
	
   
              }
	         */


      if (!isset($_SESSION['id_usuario']) and !isset($_POST['Salir'])) {
    header('Location: error.php?mensaje=No has iniciado sesion');
    unset($_SESSION['id_usuario']); //destruye la sesión
      }



//else {
	
	
  ?>

<?php //include ("database.php"); ?>
<?php //include ("ajax_grid.php"); ?>


  <!DOCTYPE html>
		
  <html lang="en">
  
 <head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buscar predio </title>
        <!-- css table datatables/dataTables -->
  <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
    
         <link type="text/css" href="css/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'    rel='stylesheet'>
            
            
            
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

      
<script type="text/javascript">
function alerta(id_predio)
    {
    var mensaje;
    var opcion = confirm("¿Desea eliminar este predio?");
    if (opcion == true) {
        
       
       var str1 = "borrarPredio.php?id=";
       var str2 = id_predio;
       var res = str1.concat(str2);
      
        
        location.href= res;   
        mensaje = "Registro eliminado";


  } else {
      mensaje = "Operación cancelada";
  }
   document.getElementById("ejemplo").innerHTML = mensaje;
}

</script>


</head>

    <body>                
			
      <center>
		<h1>Buscar Predio</h1>

 <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Datos Prediales</a>
                   

                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />
 
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            

                    <div class="panel panel-default">
                        <div class="panel-heading">
                          
                          <p id="ejemplo"></p>


                        <h3 class="panel-title"><i class="icon-user"></i> Resultados encontrados: </h3> 
             
                        </div>
            
                        <div class="panel-body">
              <div class="pull-right">

                <a href="nuevoPredio.php" class="btn btn-sm btn-primary">Nuevo predio</a>
              </div><br>
              <hr>
                                    <table id="lookup" class="table table-bordered table-hover">  
                                     <thead bgcolor="#eeeeee" align="center">
                                        <tr>
    



                              <th>ID</th>
                              <th>Cédula/RUC propietario</th>
                              <th>Clave Catastral</th>
                              <th>Tipo</th>                              
                              <th>Regimen tenencia</th>                              
                              <th>Info Adicional</th>                       
                              <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACCIONES</th>


                                       
    
                                       </tr>
                                      </thead>


                                                                    



                                        <tbody>
                                        
            



                                        </tbody>
                                    </table>
                            
                                </div>
                            </div>
                            
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <br>
        
        <p>                                        
                        <a href="index.php" name="Salir" id="Salir" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>                    
                       
              </p>
        <br>
        <br>      


        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"><a href=""> Sistemas Web </a> &copy; <?php echo date("Y")?> catastros </b></center>
            </div>
        </div>






<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          
         "language":  {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        },
 
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"ajax_grid.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No hay datos en el servidor</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
              
            }
          }
        } );
      } );
        </script>




		
    <br />
                
    <br />
		
		
		
	</body>
  </html>



	<?php	

  
	//  }


    ?>  