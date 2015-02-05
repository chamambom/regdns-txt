<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);

?>
<link rel="stylesheet" type="text/css" href="css/domtables.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
 <script src="js/jquery-ui.js"></script>
 <link rel="stylesheet" href="css/jquery-ui.css"/>        


<?php
include('dbconnector.php');

$query1 = "SELECT * FROM domain_details WHERE domain_id=   '".$_SESSION['domain_id']."'";
$myresult1 = mysqli_query($link, $query1);
 
if(mysqli_num_rows($myresult1)>0)
		{	  
		   echo "<table id='full_table_template' cellspacing='0' border ='0'>
		   <tr><div class='header'>Please verify your details using the link on the right side of your domain details below before sending it to ZISPA</div></tr>
		   <tr>
		   <th scope='col'>Domain Name &nbsp;</th>
           <th scope='col'> Domain Owner</th>

           <th scope='col'> Domain Owner Organisation Name</th>
		   <th scope='col'> Domain status</th>
		   </tr>";	
			
			while($row=mysqli_fetch_array($myresult1))
			{
				
			echo"<tr>";
            echo("<td class='alt'>".$row['domain_name']."</td>");
			echo("<td class='alt'>".$row['domainOwner']."</td>");
            echo("<td class='alt'>".$row['domain_owner_org_name']."</td>");
            echo("<td class='alt'>".$row['domstatus']."</td>");


			
			echo("<td><a href='domaindetail.php?domain_id=" . $row["domain_id"] . "'>Click here to verify domain details</a></td>");
			echo"</tr>";
            }

            echo"</table>";
			}
			else
			{
			echo"<p id='thankyou' >Your Database Currently Holds No One with this domain $domain_name</p>";
			}
			
echo "<div class='footer'>Courtesy of the Service Management Center (SMC) Africom @2015 <a href='http://www.afri-com.net'>www.afri-com.net</a></div>";

			
mysqli_free_result($myresult1);


// Close database connection
mysqli_close($link); 
?> 





</body>
</html>