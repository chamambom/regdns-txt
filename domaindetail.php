<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="css/domtables.css">
<link rel="stylesheet" type="text/css" href="main.css">
<?php
if(isset($_GET['domain_id']))
$domain_id=$_GET['domain_id'];

include('dbconnector.php');


//$selectdetail="SELECT * FROM domain_details WHERE domain_id=$domain_id";

$selectdetail ="SELECT domain_details.*, address.* ,contact.* ,hosting_company.*
               FROM domain_details
                  INNER JOIN 
                         address ON domain_details.domain_id=address.domain_id 
				  INNER JOIN
				  		 hosting_company ON domain_details.hosting_company_id=hosting_company.hosting_company_id
                  INNER JOIN
                         contact ON contact.domain_id = domain_details.domain_id WHERE domain_details.domain_id=$domain_id";
						 
$selectdetail2 = "SELECT * FROM name_server";

$result=mysqli_query($link,$selectdetail);

								 
if((mysqli_num_rows($result)) >0)		
{						 
	$row=mysqli_fetch_assoc($result) ;
	
	   echo"<h4> Below are the details you entered for domain ". $row['domain_name'] ." with domain Owner ". $row['domainOwner'] ." </h4>";								 
	   echo"<div id='full_template'>";
	   
	   echo "<hr>1.  DOMAIN NAME and ACTION</hr>";	
	
	   echo"<div class='form-row'>
		<div><label for='DomainName'>* 1a. Full domain name......................:</label><span class='field-widget'> ". $row['domain_name'] ." </span></div>";
		
	   echo"<div class='form-row'>
		<div class='field-label'><label for='DomainStatus'>* 1b. (N)ew or (M)odify or (D)elete.(N/M/D).:</label><span class='field-widget'> ". $row['domstatus'] ." </span></div>";

       echo "<hr>2.  DOMAIN OWNER</hr>";

	   echo"<div class='form-row'>
		<div ><label for='DomainOwner'>* 2a. Domain Owner..........:</label><span class='field-widget'> ". $row['domainOwner'] ." </span></div>";


	   echo"<div class='form-row'>
		<div class='field-label' ><label for='OrganisationNmae'>* 2b. Organisation Name.....:</label><span class='field-widget'> ". $row['domain_owner_org_name'] ." </span></div>";


	   echo"<div class='form-row'>
		<div class='field-label' ><label for='PhysicalAddress'>* 2c. Physical Address......:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";
			  
	   echo"<div class='form-row'>
		<div class='field-label'><label for='PostalAddress'>* 2d. Postal Address .......:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";


	
	   echo"<div class='form-row'>
		<div class='field-label'><label for='TownCity'>* 2e. Town/City.............:</label><span class='field-widget'> ". $row['city'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Country'>* 2f. Country...............:</label><span class='field-widget'> ". $row['country_id'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Mobile_Work_Phone '>* 2g. Voice Phone...........:</label><span class='field-widget'> ". $row['contact_detail'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='FaxNumber'>2h. Fax Number............:</label><span class='field-widget'> ". $row['contact_detail'] ." </span></div>";
		
			   echo"<div class='form-row'>
		<div class='field-label'><label for='EmailAddress'>* 2i. E-mail Address........:</label><span class='field-widget'> ". $row['contact_detail'] ." </span></div>";




echo "<hr>3.  ADMIN/BILLING CONTACT</hr>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='BillingZispaHandle'>* 3a. ZISPA Handle..........:</label><span class='field-widget'> ". $row['company_name'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='BillingContactName'>* 3b. Contact Name..........:</label><span class='field-widget'> ". $row['company_contact_name'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='BillingPhysicalAddress'>* 3d. Physical Address .....:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='BillingPostalAddress'>* 3e. Postal Address .......:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='BillingTownCity'>* 3f. Town/City.............:</label><span class='field-widget'> ". $row['company_city'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='BillingCountry'>* 3g. Country...............:</label><span class='field-widget'> ". $row['country_id'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='BillingMobileWorkPhone'>* 3h. Voice Phone...........:</label><span class='field-widget'> ". $row['contact_detail'] ." </span></div>";

	 echo"<div class='form-row'>
	<div class='field-label'><label for='BillingFaxNumber'>3i. Fax Number............:</label><span class='field-widget'> ". $row['contact_detail'] ." </span></div>";

	 echo"<div class='form-row'>
	<div class='field-label'><label for='BillingEmailAddress'>* 3j. E-mail Address........:</label><span class='field-widget'> ". $row['contact_detail'] ." </span></div>";
		
		echo "<hr>4.DESCRIPTION OF ORGANISATION/DOMAIN</hr>";
		
	echo"<div class='form-row'>
	<div class='field-label'><label for='OrganisationDescription'>* 4a. Description of domain owner's organisation..:</label><span class='field-widget'> ". $row['domain_owner_org_desc'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='DomainUsage'>* 4b. Proposed domain usage.:</label><span class='field-widget'> ". $row['domain_usage'] ." </span></div>";
		
      echo "<hr> 5.  TECHNICAL CONTACT</hr>";
	  
	   echo"<div class='form-row'>
		<div class='field-label'><label for='TechZispaHandle'>* 5a. ZISPA Handle..........:</label><span class='field-widget'> ". $row['company_name'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='TechContactName'>* 5b. Contact Name..........:</label><span class='field-widget'> ". $row['company_contact_name'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='TechOrganisationName'>* 5c. Organisation Name.....:</label><span class='field-widget'> ". $row['company_name'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='TechPhysicalAddress'>* 5d. Physical Address .....:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='TechPostalAddress'>* 5e. Postal Address .......:</label><span class='field-widget'> ". $row['address_detail'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='TechTownCity'>* 5f. Town/City.............:</label><span class='field-widget'> ". $row['company_city'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5g. Country...............:</label><span class='field-widget'> ". $row['country_id'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5h. Voice Phone...........:</label><span class='field-widget'> ". $row['contact_detail'] ." </span></div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>5i. Fax Number............:</label><span class='field-widget'> ". $row['contact_detail'] ." </span></div>
		";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 5j. E-mail Address........:</label><span class='field-widget'> ". $row['contact_detail'] ." </span></div>";
		
echo "<hr>6.  PRIMARY NAMESERVER</hr> " ;

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 6a. Hostname..............:</label><span class='field-widget'> ". $row2['host_name'] ." </span></div>";
		
	 echo"<div class='form-row'>
     <div class='field-label'><label for='Email Address'>* 6b. IP Address............:</label><span class='field-widget'> ". $row2['ip_address'] ." </span></div>";
		
		echo "<hr>SECONDARY NAMESERVER</hr>";

	echo"<div class='form-row'>
	<div class='field-label'><label for='Email Address'>* 6c. Hostname..............:</label><span class='field-widget'> ". $row2['host_name'] ." </span></div>";

	echo"<div class='form-row'>
	<div class='field-label'><label for='Email Address'>* 6d. IP Address............:</label><span class='field-widget'> ". $row2['ip_address'] ." </span></div>";
		
	echo "<hr>SECONDARY NAMESERVER</hr>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>6e. Hostname..............:</label><span class='field-widget'> ". $row2['host_name'] ." </span></div>";
		
			   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>* 6f. IP Address............:</label><span class='field-widget'> ". $row2['ip_address'] ." </span></div>";
		
	echo "<hr>SECONDARY NAMESERVER</hr>";
		
				   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>6g. Hostname..............:</label><span class='field-widget'> ". $row2['host_name'] ." </span></div>";

		   echo"<div class='form-row'>
		<div class='field-label'><label for='Email Address'>6h. IP Address............:</label><span class='field-widget'> ". $row2['ip_address'] ." </span></div>";
		
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