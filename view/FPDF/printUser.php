<?php
require_once ('../../vendor/fpdf/fpdf.php');

$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,'administrator');


$query = mysqli_query($connection,"SELECT 
					user_name,
					email,
					full_name,
					user_role,
					status,
					image FROM users WHERE id_user = '".$_GET['idPrintUser']."'");

$data=mysqli_fetch_array($query);

class PDF extends FPDF {
	function Header(){
		$this->SetFont('Arial','B',20);		
		//put logo
		$this->Image('../../files/EGD.jpg',15,15,15);
		$this->SetY(20);
		$this->Cell(0,5,'User Information',0,0,'C');


	}
}

$pdf = new PDF('P','mm','A4'); 


$pdf->SetTitle("User Information");

$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(0,0,0);

$pdf->Ln(60);


$pdf->SetFont('Arial','B',12);
		
$pdf->SetFillColor(255,255,255);



$pdf->Image($data['image'],88,35,35);

$pdf->Cell(190,5,'User ID',0,1,'C',true);

$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$_GET['idPrintUser'],0,1,'C',true);
		
$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'User Name',0,1,'C',true);
		
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$data['user_name'],0,1,'C',true);

$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'Full Name',0,1,'C',true);
		
$pdf->SetFont('Arial','',12);
		$pdf->Cell(190,5,$data['full_name'],0,1,'C',true);
		
$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'Email',0,1,'C',true);
		
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$data['email'],0,1,'C',true);

$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'Role',0,1,'C',true);

$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$data['user_role'],0,1,'C',true);
		
$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'Status',0,1,'C',true);

$pdf->SetFont('Arial','',12);
$pdf->Cell(190,5,$data['status'],0,1,'C',true);


$pdf->Output('I','User Information.pdf');
?>
