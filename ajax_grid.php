<?php

 //include ("database.php");
//require('fpdf.php');
//require('reporteAvaluoPrd.php');

$db_host = "localhost";
$db_user = "root";
$db_pass = "kleopatra2013";
$db_name = "mydb1";

//$conn=new mysqli($db_host, $db_user, $db_pass, $db_name); 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_error()){
				die("Conexión a la base de datos fallida" . mysqli_connect_error() . mysqli_connect_errno());
			}


/* Database connection end */




// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'prd_idpredio',
    1 => 'prd_identificacion', 
	2 => 'prd_clave_catastral',
	3 => 'prd_tipo',
    4 => 'prd_regimen_tenencia',
    5 => 'prd_observaciones'    
);

// getting total number records without any search

$sql = "SELECT prd_idpredio, prd_identificacion, prd_clave_catastral, prd_tipo, prd_regimen_tenencia, prd_observaciones FROM predio";
//$sql.=" FROM predio";
$query=mysqli_query($conn, $sql) or die("ajax_grid.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT prd_idpredio, prd_identificacion, prd_clave_catastral, prd_tipo, prd_regimen_tenencia, prd_observaciones ";
	$sql.=" FROM predio";
	$sql.=" WHERE prd_idpredio LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR prd_identificacion LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR prd_clave_catastral LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR prd_tipo LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR prd_regimen_tenencia LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax_grid.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax_grid.php: get PO"); // again run query with limit
	

} else {	

	$sql = "SELECT prd_idpredio, prd_identificacion, prd_clave_catastral, prd_tipo, prd_regimen_tenencia, prd_observaciones ";
	$sql.=" FROM predio";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax_grid.php: get PO");
	
}

$contador=0;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	
	$contador=$contador+1;
	$nestedData=array(); 

	$nestedData[] = $contador;//$row["prd_idpredio"];
    $nestedData[] = $row["prd_identificacion"];
	$nestedData[] = $row["prd_clave_catastral"];
	$nestedData[] = $row["prd_tipo"];
    $nestedData[] = $row["prd_regimen_tenencia"];
    $nestedData[] = $row["prd_observaciones"];//date("d/m/Y", strtotime($row["prd_bloque"]));
    $nestedData[] = '<td><center>
                     <a href="edicionPredio.php?id='.$row['prd_idpredio'].'&ref='.$row['prd_clave_catastral'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="reporteAvaluoPrd.php?id='.$row['prd_idpredio'].'&ref='.$row['prd_clave_catastral'].'"  data-toggle="tooltip" title="Reporte Avalúo" class="btn btn-sm btn-success"> <i class="menu-icon icon-file"></i> </a>
                     <a href="buscarPredio.php" data-toggle="tooltip" title="Eliminar registro" class="btn btn-sm btn-danger" onclick="alerta('.$row['prd_idpredio'].')"> <i class="menu-icon icon-trash"></i> </a> 				     
				     
				      </center></td>';		
	
	$data[] = $nestedData;   
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>


