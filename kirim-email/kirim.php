<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";
 
	$mail = new PHPMailer;
 
	//Enable SMTP debugging. 
	$mail->SMTPDebug = 3;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "mail.sebukucoalgroup.co.id"; //host mail server
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = "eggy.winanto@sebukucoalgroup.co.id";   //nama-email smtp          
	$mail->Password = "ITc0r3stc";           //password email smtp
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = "ssl";                           
	//Set TCP port to connect to 
	$mail->Port = 465;                                   
 
	$mail->From = "eggy.winanto@sebukucoalgroup.co.id"; //email pengirim
	$mail->FromName = "Eggy Yuli Winanto"; //nama pengirim
 
	 $mail->addAddress($_POST['email'], $_POST['nama']); //email penerima
 
	$mail->isHTML(true);
 
	$mail->Subject = $_POST['subjek']; //subject
	$Body= "<table>
	<tr style='background-color:#9DA0A8'>
		<th>id</th>
		<th>Nama Pelapor</th>
		<th>Tanggal</th>
		<th>Lokasi Area / Lokasi Detail</th>
		<th>Kategori</th>
		<th>Due Date</th>
		<th>Departemen Terkait</th>
		<th>Kondisi / Tindakan Bahaya yang ditemukan</th>
		<th>Rekomendasi Tindakan Perbaikan</th>
		<th>Tindakan Perbaikan yang sudah dilakukan</th>
		<th>Status</th>
		<th width='100px'>Action</th>
	</tr>
</table>";
	$mail->Body    = $Body; //isi email
	$mail->IsHTML(true);
        $mail->AltBody = "PHP mailer"; //body email (optional)
 
	if(!$mail->send()) 
	{
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	    echo "Message has been sent successfully";
	}

?>
