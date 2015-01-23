<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);

?>
<?php

echo $_SESSION['domain_id'];

//echo "Our size value is ".$_SESSION['size']; 

include('dbconnector.php');

$query1 = "SELECT * FROM domain_details WHERE domain_id=   '".$_SESSION['domain_id']."'";
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