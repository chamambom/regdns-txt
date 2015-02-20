<?php session_start(); ?>

<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require 'class.phpmailer.php';

$full_domain_name =$_SESSION['domain_name'];

$downloadFileName=$_SESSION['downloadFileName'];


//echo "<a href='./{$downloadFileName}'>View Template</a>";

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
							 <td>Please ".$_POST['message']. "</td>
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
	//$mail->WordWrap   = 0; // set word wrap	
	//$mail->AddAttachment($_FILES['letter']['tmp_name'], $_FILES['letter']['name']);
   $mail->AddAttachment($downloadFileName,$downloadFileName);	
   $mail->AddAttachment($_FILES['letter']['tmp_name'],
                           $_FILES['letter']['name']);

	
	$mail->IsHTML(true); // send as HTML
	$mail->Send();
	
	
	
	
	
	

} catch (phpmailerException $e) {
	echo $e->errorMessage();
}

$_SESSION['name'] = $registrant;


header('Location: mailsuccess.php');

?>