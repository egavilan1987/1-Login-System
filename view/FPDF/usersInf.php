<?php
require_once ('../../vendor/fpdf/fpdf.php');

$connect=mysqli_connect('localhost','root','');
mysqli_select_db($connect,'administrator');


class PDF extends FPDF {
	function Header(){
		$this->SetFont('Arial','B',15);
		
		$this->Cell(12);

		//put logo
		$this->Image('../../files/EGD.jpg',10,10,10);
		
		$this->Cell(100,10,'Users List',0,1);

		$this->Ln(5);
		
		$this->SetFont('Arial','B',12);
		
		$this->SetFillColor(95,166,252);
		$this->SetDrawColor(0,0,0);
		$this->Cell(20,5,'User ID',1,0,'',true);
		$this->Cell(35,5,'User Name',1,0,'',true);
		$this->Cell(55,5,'Full Name',1,0,'',true);
		$this->Cell(45,5,'Email',1,0,'',true);
		$this->Cell(17,5,'Role',1,0,'',true);
		$this->Cell(18,5,'Status',1,1,'',true);
		
	}
	function Footer(){
		//add table's bottom line
		$this->Cell(190,0,'','T',1,'',true);
		
		//Go to 1.5 cm from bottom
		$this->SetY(-15);
				
		$this->SetFont('Arial','',8);
		
		//width = 0 means the cell is extended up to the right margin
		$this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,'C');
	}
}


$pdf = new PDF('P','mm','A4'); //use new class

$pdf->SetTitle("Users Information");

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(0,0,0);

$query=mysqli_query($connect,"select * from users");
while($data=mysqli_fetch_array($query)){
	$pdf->Cell(20,5,$data['id_user'],1,0);
	$pdf->Cell(35,5,$data['user_name'],1,0);
	$pdf->Cell(55,5,$data['full_name'],1,0);
	if($pdf->GetStringWidth($data['email']) > 45){
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(45,5,$data['email'],1,0);
		$pdf->SetFont('Arial','',10);
	}else{
		$pdf->Cell(45,5,$data['email'],1,0);
	}	
	$pdf->Cell(17,5,$data['user_role'],1,0);
	$pdf->Cell(18,5,$data['status'],1,1);
}

$pdf->Output('I','Users Information.pdf');
?>
