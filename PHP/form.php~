<?php

	//if(!empty($_POST['submit']))
	//{
		$patientName=$_POST['patientName'];           //HTML element references
		$parentName=$_POST['parentName'];
		$relationship=$_POST['relationship'];
		$insurance=$_POST['patientInsurance'];
		$dayPhone=$_POST['dayPhone'];
		$eveningPhone=$_POST['eveningPhone'];
		$email=$_POST['email'];
		$discovery=$_POST['discovery'];
		$description=$_POST['description'];

		require('libs/FPDF/fpdf.php');              //where lib file is stored

		$pdf=new FPDF();                            //constructs pdf based on user inputs
		$pdf->AddPage();
		$pdf->SetFont("Arial", "B", 16);
		$pdf->Cell(50,10,"Patient Name:",1,0);
		$pdf->Cell(140,10,$patientName,1,1);

		$pdf->Cell(50,10,"Parent Name:",1,0);
		$pdf->Cell(140,10,$parentName,1,1);

		$pdf->Cell(50,10,"Relationship:",1,0);
		$pdf->Cell(140,10,$relationship,1,1);

		$pdf->Cell(50,10,"Patient Insurance:",1,0);
		$pdf->Cell(140,10,$insurance,1,1);

		$pdf->Cell(50,10,"Day Phone:",1,0);
		$pdf->Cell(140,10,$dayPhone,1,1);

		$pdf->Cell(50,10,"Evening Phone:",1,0);
		$pdf->Cell(140,10,$eveningPhone,1,1);
	
		$pdf->Cell(50,10,"Email:",1,0);
		$pdf->Cell(140,10,$email,1,1);
	
		$pdf->Cell(50,10,"Discovery:",1,0);
		$pdf->Cell(140,10,$discovery,1,1);

		$pdf->Cell(50,10,"Description:",1,0);
		$pdf->Cell(140,10,$description,1,1);
	
		$filename='/var/www/html/pdakids/patientInfo/NewPatient.pdf';  //where pdf is stored on the web server
		$pdf->Output($filename, 'F');                                  //saves pdf

	//}

	require 'libs/PHPMailer/PHPMailerAutoload.php';

	$m = new PHPMailer;

	$m->isSMTP();
	$m->SMTPAuth = true;
	//$m->SMTPDebug = 2;      //spits out connection info for debugging

	$m->Host = 'smtp.live.com';               //to send email from pda server
	$m->Username = 'testajarana@outlook.com';    //actual gmail username
	$m->Password = 'testpassword1234';		   //actual gmail password
	$m->SMTPSecure = 'tls';
	$m->Port = 587;

	$m->From = 'testajarana@outlook.com';
	$m->FromName = 'Andres Arana';
	$m->addAddress('testajarana@outlook.com', 'Andres Arana');
	$m->addAddress('testajarana@gmail.com', 'Andres Arana');
	   //can also add bcc and more addresses
	$m->addCC('motten@pdakids.com', 'Maureen');
	$m->addCC('ajarana@email.wm.edu', 'Andres');
	


	$m->Subject = 'New patient information';
	$m->Body = 'Attached is the patient information pdf.';
	$m->addAttachment('/var/www/html/pdakids/patientInfo/NewPatient.pdf', 'NewPatient.pdf');

	$m->send();

	http_response_code(204);    //prevents script from opening on the browser

?>
