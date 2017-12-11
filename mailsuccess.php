<?php session_start(); ?>
<link rel="stylesheet" href="css/mail.css"/>
<link rel="stylesheet" type="text/css" href="css/domtables.css">
<link rel="stylesheet" type="text/css" href="css/main.css">


<?php

$full_domain_name =$_SESSION['domain_name'];

$downloadFileName=$_SESSION['downloadFileName'];

$registrant= $_SESSION['name']; 


echo"<div class='header'> Thank you very much $registrant for sending $full_domain_name template to ZISPA, Check your email  ltzadmin@liquidtelecom.com for ZISPA Confirmation  </div>";
		
	echo"<div class='full_template'>";
	echo 'Your Template has been sent to ZISPA.';
	
echo "</div>";


echo "<div class='footer'>Courtesy of the Zimbabwe IS @2017 <a href='#'>LTZ</a></div>";



?>