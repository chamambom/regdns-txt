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
session_start();
error_reporting (E_ALL ^ E_NOTICE);

include('dbconnector.php');

$query1 = "SELECT * FROM domain_details WHERE domain_id=101";
$myresult1 = mysqli_query($link, $query1);
 
if(mysqli_num_rows($myresult1)>0)
		{	  
		    echo "<table border ='1'>
           <tr>
           <th>domain_name &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</th> 
           <th>domainOwner</th>
		   </tr>";	
			
			while($row=mysqli_fetch_array($myresult1))
			{
			echo"<tr>";
            echo("<td>".$row['domain_name']."</td>");
			echo("<td>".$row['domainOwner']."</td>");
			
			echo("<td><a href='domaindetail.php?domain_id=" . $row["domain_id"] . "'>Generate Full Report For The Specific domain</a></td>");
			echo"</tr>";
            }
            echo"</table>";
			}
			else
			{
			echo"<p id='thankyou' >Your Database Currently Holds No One Who Has Worked In $Country</p>";
			}
			
mysqli_free_result($myresult1);
			
// Close database connection
mysqli_close($link); 
?> 





</body>
</html>