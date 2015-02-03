<?php session_start(); ?>

<link rel="stylesheet" href="css/mail.css"/>
<link rel="stylesheet" type="text/css" href="css/domtables.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require 'class.phpmailer.php';

$full_domain_name =$_SESSION['domain_name'];

$downloadFileName=$_SESSION['downloadFileName'];


echo "<a href='./{$downloadFileName}'>View Template</a>";

try {
    $mail = new PHPMailer(true); //New instance, with exceptions enabled
     
	//$files = array("file1.pdf","file2.pdf");
	
	$registrant= $_POST['name']; 
    $to = $_POST['email'];
	$mail->AddAddress($to);
    $mail->Subject    = $_POST['subject'];
	$mail->From       = "dns-admin@africominternet.co.zw";
    $mail->FromName  = "Africom DNS Administrator";
	
	
	

	$body             = "<table>
	
	                      <tr>
							  <td>  Good day</td>
						 </tr>	  
							<tr><td></td> </tr>
						 <tr>
							  <td>Please ".$_POST['message']."</td>
						</tr>
							<tr><td></td> </tr>
							  <tr>
							  <td>Regards,</td> 							  
							</tr>
							
						  <tr><td>Africom DNS Administrator </td></tr>

							
	                     <table>";
						 
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
	
	$mail->MsgHTML($body);

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	//$mail->Host       = "mail.yourdomain.com"; // SMTP server
	//$mail->Username   = "name@domain.com";     // SMTP server username
	//$mail->Password   = "password";            // SMTP server password

	$mail->IsSendmail();  // tell the class to use Sendmail
	$mail->AddReplyTo("smc@afri-com.net");
	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	//$mail->WordWrap   = 10; // set word wrap	
	$mail->AddAttachment($_FILES['image']['tmp_name'], $_FILES['image']['name']);
    $mail->AddAttachment($downloadFileName,$downloadFileName);	
	
	$mail->IsHTML(false); // send as HTML
	$mail->Send();
	
	
	
	
	echo"<h4> Thank you very much  $registrant for sending $full_domain_name to ZISPA, Check your email  " .$mail->From  ." for feedback  </h4>";	
		
	echo"<div class='full_template'>";
	echo 'Your Message has been sent.';
	

} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
echo "</div>";

echo "<h5>Courtesy of the Service Management Center (SMC) Africom@2015</h5>";

?>