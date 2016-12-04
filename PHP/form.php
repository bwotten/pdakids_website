<?php
	
	$invis_input=$_POST['invisibull_field']

	//only execute if invisible field isn't filled out
	if (strlen($invis_input) == 0 ){
	$patientName=substr($_POST['patientName'],0,75);           //HTML element references
	$parentName=substr($_POST['parentName'],0,75);
	$relationship=substr($_POST['relationship'],0,75);
	$insurance=substr($_POST['patientInsurance'],0,75);
	$dayPhone=substr($_POST['dayPhone'],0,75);
	$eveningPhone=substr($_POST['eveningPhone'],0,75);
	$email=substr($_POST['email'],0,75);
	$discovery=substr($_POST['discovery'],0,75);
	$description=substr($_POST['description'],0,75);

	require('libs/FPDF/fpdf.php');              //where lib file is stored

	$pdf=new FPDF();                            //constructs pdf based on user inputs
	$pdf->AddPage();
	$pdf->SetFont("Arial", "B", 16);

	$pdf->Cell(0,30,"New Patient Information",0,1,"C");

	$pdf->Cell(60,10,"Patient Name:",1,0);
	$pdf->Cell(130,10,$patientName,1,1);

	$pdf->Cell(60,10,"Parent Name:",1,0);
	$pdf->Cell(130,10,$parentName,1,1);

	$pdf->Cell(60,10,"Relationship:",1,0);
	$pdf->Cell(130,10,$relationship,1,1);

	$pdf->Cell(60,10,"Patient Insurance:",1,0);
	$pdf->Cell(130,10,$insurance,1,1);

	$pdf->Cell(60,10,"Day Phone:",1,0);
	$pdf->Cell(130,10,$dayPhone,1,1);

	$pdf->Cell(60,10,"Evening Phone:",1,0);
	$pdf->Cell(130,10,$eveningPhone,1,1);
	
	$pdf->Cell(60,10,"Email:",1,0);
	$pdf->Cell(130,10,$email,1,1);
	
	$pdf->Cell(60,10,"Discovery:",1,0);
	$pdf->Cell(130,10,$discovery,1,1);

	$pdf->Cell(60,20,"Description:",1);
	$pdf->MultiCell(130,10,$description,1);
	
	$filename='/var/www/html/pdakids/patientInfo/NewPatient.pdf';  //where pdf is stored on the web server
	$pdf->Output($filename, 'F');   //saves pdf

                               

	require 'libs/PHPMailer/PHPMailerAutoload.php';

	$m = new PHPMailer;

	$m->isSMTP();
	$m->SMTPAuth = true;
	//$m->SMTPDebug = 2;      //spits out connection info for debugging

	$m->Host = 'smtp.sendgrid.net';               //sendgrid 
	$m->Username = 'ajarana';    //sendgrid username
	$m->Password = 'testpassword1';		   //sendgrid password
	$m->SMTPSecure = 'tls';
	$m->Port = 587;

	//$m->From = 'smtp.sendgrid.net';
	$m->FromName = 'PDA Kids';
	$m->addAddress('testajarana@outlook.com', 'Andres Arana');
	$m->addAddress('testajarana@gmail.com', 'Andres Arana');
	   //can also add bcc and more addresses

	$m->addCC('ajarana@email.wm.edu', 'Andres');
	


	$m->Subject = 'New patient information';
	$m->Body = 'Attached is the patient information pdf.';
	$m->addAttachment('/var/www/html/pdakids/patientInfo/NewPatient.pdf', 'NewPatient.pdf');

	$m->send();
	unlink('/var/www/html/pdakids/patientInfo/NewPatient.pdf');
	}
	//prevents script from opening on the browser

?>
