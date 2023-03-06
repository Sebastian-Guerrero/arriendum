<?php

require_once ('../fpdf/fpdf.php');
require_once ('conectar.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->image('../assets/icons/logo.png', 150, 1, 60); // X, Y, Tamaño
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
  
    // Movernos a la derecha
    $this->Cell(60);

    // Título
    $this->Cell(70,10,'Tabla de usuarios ',0,0,'C');
    // Salto de línea
   
    $this->Ln(30);
    $this->SetFont('Arial','B',10);
    $this->SetX(4);
    $this->Cell(35,10,'Numero Documento',1,0,'C',0);
    $this->Cell(40,10,'Rol',1,0,'C',0,);
    $this->Cell(29,10,'Tipo Documento',1,0,'C',0);
    $this->Cell(27,10,'Nombre',1,0,'C',0);
    $this->Cell(40,10,'Apellido',1,0,'C',0);
    $this->Cell(30,10,'Celular',1,1,'C',0);
	

  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    
    // Arial italic 8
    $this->SetFont('Arial','I',4);
    // Número de página
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   //$this->SetFillColor(223, 229,235);
    //$this->SetDrawColor(181, 14,246);
    //$this->Ln(0.5);
}
}

$conet = new Conexion();
$c = $conet->conectando();
$query2="select * from user ";
$resultado2=mysqli_query($c,$query2);
$arreglo2 = mysqli_fetch_array($resultado2);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row=$resultado2->fetch_assoc()) {

    $pdf->SetX(4);

    $pdf->Cell(35,10,$row['id_user'],1,0,'C',0);
    $pdf->Cell(40,10,$row['rol_user'],1,0,'C',0);
	$pdf->Cell(29,10,$row['type_document'],1,0,'C',0);
    $pdf->Cell(27,10,$row['name_user'],1,0,'C',0);
    $pdf->Cell(40,10,$row['lastname_user'],1,0,'C',0);
    $pdf->Cell(30,10,$row['phone_user'],1,1,'C',0);
	


} 


	$pdf->Output();
?>