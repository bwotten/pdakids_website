<?php

if(!empty($_POST['submit']))
{
	$clientName=$_POST['clientName'];
	$parentName=$_POST['parentName'];
	$relationship=$_POST['relationship'];
	$dayPhone=$_POST['dayPhone'];
	$eveningPhone=$_POST['eveningPhone'];
	$email=$_POST['email'];
	$discovery=$_POST['discovery'];

	require('fpdf.php');

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont("Arial", "B", 16);
	$pdf->Cell(50,10,"Client Name:",1,0);
	$pdf->Cell(50,10,$clientName,1,1);

	$pdf->Cell(50,10,"Parent Name:",1,0);
	$pdf->Cell(50,10,$parentName,1,1);

	$pdf->Cell(50,10,"Relationship:",1,0);
	$pdf->Cell(50,10,$relationship,1,1);

	$pdf->Cell(50,10,"Day Phone:",1,0);
	$pdf->Cell(50,10,$dayPhone,1,1);

	$pdf->Cell(50,10,"Evening Phone:",1,0);
	$pdf->Cell(50,10,$eveningPhone,1,1);
	
	$pdf->Cell(50,10,"Email:",1,0);
	$pdf->Cell(50,10,$email,1,1);
	
	$pdf->Cell(50,10,"Discovery:",1,0);
	$pdf->Cell(50,10,$discovery,1,1);
	
	$pdf->output();
}
?>
