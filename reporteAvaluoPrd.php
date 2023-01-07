<?php
require('fpdf182/fpdf.php');
include ("database.php");

   $id_prd=($_GET['id']);
   $clave=($_GET['ref']);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/logo.jpg',25,5,-600);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'GAD Parroquial de Cuyuja',0,0,'C');
    // Salto de línea
    $this->Ln(10);
    $this->Cell(80);
    $this->Cell(30,10,utf8_decode('Avalúo Predial'),0,0,'C');
    $this->Ln(20);
    $this->Cell(80);
    $this->Ln(20);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Fecha actual
    		date_default_timezone_set('America/Guayaquil'); 
			$fecha = date('Y-m-d H:i:s');
    $this->Cell(0,10,utf8_decode('Fecha de impresión: ').$fecha,0,0);
    // Número de página
    $this->Cell(0,10,'Pag.: '.$this->PageNo().'/{nb}',0,0,'R');

}
}

$predio= new Database();
$datos_predio=$predio->registro_predio($id_prd);
$datos_propietario=$predio->registro_propietario($id_prd);
$datos_ubicacion=$predio->registro_ubicacion($clave);
$datos_lote=$predio->registro_infraestructura($clave);
$datos_grafico=$predio->registro_grafico_predio($clave);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();

	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
    $pdf->Cell(4,2,'Titular: '.$datos_propietario->pro_primer_apellido." ".$datos_propietario->pro_segundo_apellido." ".$datos_propietario->pro_primer_nombre." ".$datos_propietario->pro_segundo_nombre);
	//$pdf->SetX(80);
	//$pdf->Cell(4,2,utf8_decode('Cédula: ').$datos_predio->prd_identificacion);
	$pdf->SetX(120); //(80)
	$pdf->Cell(4,2,'Clave catastral: '.$datos_predio->prd_clave_catastral,0,1);
	$pdf->Ln(7);
	$pdf->Cell(0,2,utf8_decode('C.I.: ').$datos_predio->prd_identificacion,0,0);
	$pdf->Ln(9);
	$pdf->Cell(0,2,utf8_decode('Personería: ').$datos_propietario->pro_tipo_propietario,0,0);
	$pdf->Ln(13);
	$pdf->Line(12,47,200,47);
	$pdf->SetFont('Times','B',14);
	$pdf->Cell(0,2,utf8_decode('Ubicación:'),0,0);
	$pdf->Ln(15);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,2,utf8_decode('Eje principal: ').$datos_ubicacion->ubc_eje_principal,0,0);

	$pdf->SetX(120); //(80)
	$pdf->Cell(4,2,'Nombre predio: '.$datos_ubicacion->ubc_nombre_predio,0,1);
	$pdf->Ln(5);	
	$pdf->SetX(120);
	$pdf->Cell(4,2,'Placa: '.$datos_ubicacion->ubc_codigo_placa_predial,0,1);
	$pdf->Ln(0);
	$pdf->Cell(0,2,utf8_decode('Calle secundaria: ').$datos_ubicacion->ubc_eje_secundario,0,0);
	$pdf->Ln(10);
	$pdf->Cell(0,2,utf8_decode('Sector: ').$datos_ubicacion->ubc_sector,0,0);

	$pdf->SetFont('Times','B',14);
	$pdf->Ln(13);
	$pdf->Cell(0,2,utf8_decode('Información:'),0,0);

	$pdf->Ln(13);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,4,utf8_decode('Vía de acceso: ').$datos_lote->inf_tipo_via_acceso,0,0);
	$pdf->Ln(9);	
	$pdf->Cell(0,4,utf8_decode('Rodadura: ').$datos_lote->inf_rodadura,0,0);
	$pdf->Ln(9);	
	$pdf->Cell(0,4,utf8_decode('Servicio de agua: ').$datos_lote->inf_agua_procedencia,0,0);
	$pdf->Ln(8);	
	
	if($datos_lote->inf_medidor_agua=='1'){
		$medidor_agua='Si';
	}else{
		$medidor_agua='No';
	}
	$pdf->Cell(0,4,utf8_decode('Medidor de agua: ').$medidor_agua,0,0);
	$pdf->Ln(8);
	$pdf->Cell(0,4,utf8_decode('Fuente energía eléctrica: ').$datos_lote->inf_energia_electrica_procedencia,0,0);


	$pdf->Ln(-24);

	$pdf->SetX(100);
	$pdf->Cell(4,2,utf8_decode('Eliminación excretas: ').$datos_lote->inf_eliminacion_excretas,0,1);
	
	$pdf->Ln(16);
	$pdf->SetX(100);
	$pdf->Cell(4,2,utf8_decode('Eliminación basura: ').$datos_lote->inf_eliminacion_basura,0,1);
	$pdf->Ln(-11);
	$pdf->SetX(100);
	$pdf->Cell(4,2,'Alcantarillado: '.$datos_lote->inf_alcantarillado,0,1);

	$pdf->Ln(26);

	$pdf->SetFont('Times','B',14);
	//$pdf->Ln(13);
	$pdf->Cell(0,2,utf8_decode('Gráfico predio:'),0,0);
	$pdf->Ln(8);
	$pdf->Image(''.$datos_grafico->grp_link_grafico.'',50,202,115);  //'img/foto1.jpg'


$pdf->Output($clave.'.pdf','d');
?>