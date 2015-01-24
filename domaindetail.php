<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="css/domtables.css">
<link rel="stylesheet" type="text/css" href="main.css">
<?php
if(isset($_GET['domain_id']))
$domain_id=$_GET['domain_id'];

include('dbconnector.php');


$selectdetail="SELECT * FROM domain_details WHERE domain_id=$domain_id";

$result=mysqli_query($link,$selectdetail);
								 
if(mysqli_num_rows($result)>0)		
{						 
	$row=mysqli_fetch_assoc($result);
	
	   echo"<h4> Below are the details you entered for domain ". $row['domain_name'] ." with domain Owner ". $row['domainOwner'] ." </h4>";								 
	   echo"<div id='full_table_template'>";
	   echo "1.  DOMAIN NAME and ACTION";	
	
	   echo"<div class='form-row'>
		<div><label for='Gender'>* 1a. Full domain name......................:</label><span class='field-widget'> ". $row['domain_name'] ." </span></div>";
		
	   echo"<div class='form-row'>
		<div class='field-label'><label for='Title'>* 1b. (N)ew or (M)odify or (D)elete.(N/M/D).:</label><span class='field-widget2'> ". $row['domstatus'] ." </span></div>";

       echo "2.  DOMAIN OWNER";

	   echo"<div class='form-row'>
		<div ><label for='Nationality'>* 2a. Domain Owner..........:</label><span class='field-widget'> ". $row['domainOwner'] ." </span></div>";


	   echo"<div class='form-row'>
		<div class='field-label' ><label for='Position'>* 2b. Organisation Name.....:</label><span class='field-widget2'> ". $row['domain_owner_org_name'] ." </span></div>";


	   echo"<div class='form-row'>
		<div ><label for='Telephone Number'>* 2c. Physical Address......:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";
			  
	   echo"<div class='form-row'>
		<div ><label for='Telephone Number'>* 2d. Postal Address .......:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";


	
	   echo"<div class='form-row'>
		<div class='field-label'><label for='Alternative Telephone'>* 2e. Town/City.............:</label><span class='field-widget2'> ". $row['Telephone2'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 2f. Country...............:</label><span class='field-widget'> ". $row['name'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Alternarnative '>* 2g. Voice Phone...........:</label><span class='field-widget2'> ". $row['EmailAddress2'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Country Based'>2h. Fax Number............:</label><span class='field-widget'> ". $row['CountryBased'] ." </span></div>";
		
			   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 2i. E-mail Address........:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";


echo "3.  ADMIN/BILLING CONTACT";
	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 3a. ZISPA Handle..........:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 3b. Contact Name..........:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 3d. Physical Address .....:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 3e. Postal Address .......:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 3f. Town/City.............:</label>:</div>
		<span class='field-widget'> ". $row['EmailAddress1'] ." </span>";

	   echo"<div class='form-row'>
		<div ><label for='Email Address'>* 3g. Country...............:</label><span class='field-widget'> ". $row['name'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 3h. Voice Phone...........:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	 echo"<div class='form-row'>
	<div class='field-label'><label for='Email Address'>3i. Fax Number............:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	 echo"<div class='form-row'>
	<div class='field-label'><label for='Email Address'>* 3j. E-mail Address........:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";
		
		echo "4.DESCRIPTION OF ORGANISATION/DOMAIN";
		
	echo"<div class='form-row'>
	<div class='field-label'><label for='Email Address'>* 4a. Description of domain owner's organisation..:</label><span class='field-widget'> ". $row['domain_owner_org_desc'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 4b. Proposed domain usage.:</label><span class='field-widget'> ". $row['domain_usage'] ." </span></div>";
		
      echo "5.  TECHNICAL CONTACT";
	  
	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5a. ZISPA Handle..........:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5b. Contact Name..........:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	   echo"<div class='form-row'>
		<div ><label for='Email Address'>* 5c. Organisation Name.....:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5d. Physical Address .....:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5e. Postal Address .......:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5f. Town/City.............:</label><span class='field-widget'> ". $row['name'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5g. Country...............:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5h. Voice Phone...........:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>5i. Fax Number............:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>
		";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5j. E-mail Address........:</label><span class='field-widget'> ". $row['EmailAddress1'] ." </span></div>";
		
echo "6.  PRIMARY NAMESERVER " ;

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 6a. Hostname..............:</label><span class='field-widget'> ". $row['host_name'] ." </span></div>";
		
	 echo"<div class='form-row'>
     <div class='field-label'><label for='Email Address'>* 6b. IP Address............:</label><span class='field-widget'> ". $row['ip_address'] ." </span></div>";
		
		echo "SECONDARY NAMESERVER";

	echo"<div class='form-row'>
	<div class='field-label'><label for='Email Address'>* 6c. Hostname..............:</label><span class='field-widget'> ". $row['host_name'] ." </span></div>";

	echo"<div class='form-row'>
	<div class='field-label'><label for='Email Address'>* 6d. IP Address............:</label><span class='field-widget'> ". $row['ip_address'] ." </span></div>";
		
	echo "SECONDARY NAMESERVER";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>6e. Hostname..............:</label><span class='field-widget'> ". $row['host_name'] ." </span></div>";
		
			   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 6f. IP Address............:</label><span class='field-widget'> ". $row['ip_address'] ." </span></div>";
		
	echo "SECONDARY NAMESERVER";
		
				   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>6g. Hostname..............:</label><span class='field-widget'> ". $row['host_name'] ." </span></div>";

		   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>6h. IP Address............:</label><span class='field-widget'> ". $row['ip_address'] ." </span></div>";
		
		   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'> * 7.  DOMICILIUM CITANDI ET EXECUTANDI 
      The organisation specified
      in 2 above chooses as its
      address for the giving and
      serving of notices the 
      following street address
      (Note: Post Office box or
      Post Office bag addresses
      are not acceptable).......:</label> <span class='field-widget'> ". $row['address_detail'] ." </span></div>";






	   
     echo("</div>");
}
else
{
echo "No results fetched ";
}

//session_destroy();

?>
</body>
</html>