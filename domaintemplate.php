<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<!--
                                 ZISPA
                       CO.ZW Registration Office

             APPLICATION TO ESTABLISH A SUB-DOMAIN WITHIN
                 THE .CO.ZW NAMESPACE OF THE INTERNET

       ======================================================== 
      |   ZISPA looks after the administration of '.CO.ZW.'    |
      |                                                        |
      |       ** TERMS AND CONDITIONS OF REGISTRATION **       |
      |                                                        |
      | .CO.ZW domain registrations are subject to the terms   |
      | and conditions as published at http://www.zispa.org.zw |
      | from time to time.                                     |
      |                                                        |
      |              ** COSTS OF REGISTRATION **               |
      |                                                        |
      | The costs of registration will vary from time to time. |
      | Details of current charges may be obtained from ZISPA. |
      |                                                        |
      | This document is intended to be scanned electronically |
      | so please do not change its format or enter data other |
      | than in the specified locations.  The file must be     |
      | sent in plain ASCII format as an attachment and not as |
      | inline text.  It must not be uuencoded or MIME encoded |
      | or sent in any proprietary word processing file format |
      |                                                        |
      | Please send only ONE APPLICATION per e-mail message    |
      | to admin@zispa.org.zw, with the full domain name in    |
      | the Subject line.                                      |
      |                                                        |
      | All data must be entered on a single line following    |
      | the colon for the field concerned to facilitate data   |
      | capture.                                               |
      |                                                        |
      |  ** All fields with an asterisk must be completed **   |
      |                                                        |
       ======================================================== 
-->       
        0.  ZW DOMAIN TEMPLATE....: 3.1.4 - 13/02/2003
        
        1.  DOMAIN NAME and ACTION
<?php

error_reporting (E_ALL ^ E_NOTICE);
include('dbconnector.php');

//show results

$query1 = "SELECT * FROM domain_details";
$result1 = mysqli_query($link, $query1);
 
if ($result1) { //If it ran ok display the records
	
	echo 
	'<table align="center" cellpadding="5" cellspacing="5" border="1">
		<tr>
			<td align="left"><b>* 1a. Full domain name:</b></td>
			<td align="left"><b>* 1b. (N)ew or (M)odify or (D)elete.(N/M/D).:</b></td>
     		<td align="left"><b>* 1a. Full domain name:</b></td>
			<td align="left"><b>* 1a. Full domain name:</b></td>
			<td align="left"><b>* 1a. Full domain name:</b></td>
			<td align="left"><b>* 1a. Full domain name:</b></td>


		</tr>';

while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
	echo 
		'<tr>
			<td align="left">' . $row['domain_name'] . '</td>
			<td align="left">' . $row['domainOwner'] . '</td>
			<td align="left">' . $row['domain_owner_org_name'] . '</td>
			<td align="left">' . $row['domain_usage'] . '</td>
			<td align="left">' . $row['hosting_company_id'] . '</td>
			<td align="left">' . $row['domain_owner_org_desc'] . '</td>
			<td align="left">' . $row['domstatus'] . '</td>



		</tr>';
	}
 
	echo '</table>';
 
mysqli_free_result($result1);
 
} else { //if it did not run ok
 
	//public message
	echo '<p class="error">The current users could not be retrieved. We apologise for any inconvienience.</p>'; 
	
	//debugging message
	echo '<p>' . mysqli_error($link) . '<br/><br/> Query: ' . $query1 . '</p>'; 
}

?>

2.  DOMAIN OWNER

<?php
 
// Close database connection
mysqli_close($link); 
?> 





</body>
</html>