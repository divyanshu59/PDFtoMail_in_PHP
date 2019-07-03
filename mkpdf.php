<?php
require_once("vendor/autoload.php"); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mpdf = new \Mpdf\Mpdf();
$code = generateCode();

$data = "";
$data .= "<h1>Hello And Welcome To Website</h1>";
$data .="Here is Your Cupon Code $code ";

echo $code;

// Write PDF

$mpdf->WriteHTML($data);
$pdf = $mpdf->Output('','S');


$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.mailtrap.io"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 2525; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = "d0a6246e855e26";
$mail->Password = "ba948a75e3173a";
$mail->setFrom("myeamil@bilwg.com", "Test Person name");
$mail->addAddress("greatdivyanshu59@gmail.com", "Great Dynamsism");
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->msgHTML("test body"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported';
$mail->addStringAttachment($pdf, 'myfile.pdf');
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}


function generateCode(){
	$arr0 = array('$arr2','$arr1');
	$arr1 = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$arr2 = array('0','1','2','3','4','5','6','7','8','9');
	$output ="";
	for($i = 0; $i <8; $i++ ){
		$mid = rand(0,1);
	
		if($mid == '0'){
			$final = rand(0,8);
			$output .= $arr2[$final];
		}
		else
		{
			$final = rand(0,25);
			$output .= $arr1[$final];
		}
	
		
	}
	return "$output";
}
 ?>