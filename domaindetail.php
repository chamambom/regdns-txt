<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="css/domtables.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/jquery-ui.js"></script>
        <link rel="stylesheet" href="css/jquery-ui.css"/>        

<?php

if(isset($_GET['domain_id']))
$domain_id=$_GET['domain_id'];

include('dbconnector.php');

//$selectdetail="SELECT * FROM domain_details WHERE domain_id=$domain_id";

$selectdetail ="SELECT domain_details.*, address.* ,contact.* ,hosting_company.* ,name_server.*,country.*
               FROM domain_details
                  INNER JOIN 
                         address ON domain_details.domain_id=address.domain_id 
				  INNER JOIN 
                         country ON country.country_id=address.country_id 
				  INNER JOIN
				  		 hosting_company ON domain_details.hosting_company_id=hosting_company.hosting_company_id
				  INNER JOIN
				  		 name_server ON domain_details.domain_id=name_server.domain_id
                  INNER JOIN
                         contact ON contact.domain_id = domain_details.domain_id WHERE domain_details.domain_id=$domain_id";
						 

$result=mysqli_query($link,$selectdetail);
								 
if((mysqli_num_rows($result)) >0){
							 
    while ($row=mysqli_fetch_array($result)){
		

	   echo"<div class='header'> Below are the details you entered for domain ". $row['domain_name'] ." with domain Owner ". $row['domainOwner'] ." </div>";	
	   
	   echo"<div class='full_template'>";
	   echo "<div class='field_widget_x'><a href='templateX.php'> Generate template and attach associated documents</a></div>";
	   
 
	   echo "<div class='headings'> 0.  ZW DOMAIN TEMPLATE....: 3.1.4 - 13/02/2003 </div>";
   
	   echo "<div class='headings'>1.  DOMAIN NAME and ACTION</div>";	
	
	   echo"<div class='field-label'><label for='DomainName'>* 1a. Full domain name......................:</label><span class='field-widget'> ". $row['domain_name'] ." </span></div>";
		
	   echo"<div class='field-label'><label for='DomainStatus'>* 1b. (N)ew or (M)odify or (D)elete.(N/M/D).:</label><span class='field-widget'> ". $row['domstatus'] ." </span></div>";

       echo "<div class='headings'>2.  DOMAIN OWNER</div>";

	   echo"<div ><label for='DomainOwner'>* 2a. Domain Owner..........:</label><span class='field-widget'> ". $row['domainOwner'] ." </span></div>";


	   echo"<div class='field-label' ><label for='OrganisationNmae'>* 2b. Organisation Name.....:</label><span class='field-widget'> ". $row['domain_owner_org_name'] ." </span></div>";


	   echo"<div class='field-label' ><label for='PhysicalAddress'>* 2c. Physical Address......:</label><span class='field-widget'> ". $row['physical_address_detail']." </span></div>";
			  
	   echo"<div class='field-label'><label for='PostalAddress'>* 2d. Postal Address .......:</label><span class='field-widget'> ". $row['postal_address_detail'] ." </span></div>";


	
	   echo"<div class='field-label'><label for='TownCity'>* 2e. Town/City.............:</label><span class='field-widget'> ". $row['city'] ." </span></div>";

	   echo"<div class='field-label'><label for='Country'>* 2f. Country...............:</label><span class='field-widget'> ". $row['name'] ." </span></div>";

	   echo"<div class='field-label'><label for='Mobile_Work_Phone '>* 2g. Voice Phone...........:</label><span class='field-widget'> ". $row['voicephone'] ." </span></div>";

	   echo"<div class='field-label'><label for='FaxNumber'>&nbsp;&nbsp; 2h. Fax Number............:</label><span class='field-widget'> ". $row['faxnumber'] ." </span></div>";
		
	  echo"<div class='field-label'><label for='EmailAddress'>* 2i. E-mail Address........:</label><span class='field-widget'> ". $row['emailaddress'] ." </span></div>";




echo "<div class='headings'>3.  ADMIN/BILLING CONTACT</div>";

	   echo"<div class='field-label'><label for='BillingZispaHandle'>* 3a. ZISPA Handle..........:</label><span class='field-widget'> ". $row['company_name'] ." </span></div>";

	   echo"<div class='field-label'><label for='BillingContactName'>* 3b. Contact Name..........:</label><span class='field-widget'> ". $row['company_contact_name'] ." </span></div>";

	   echo"<div class='field-label'><label for='BillingPhysicalAddress'>* 3d. Physical Address .....:</label><span class='field-widget'> ". $row['company_physical_address'] ." </span></div>";

	   echo"<div class='field-label'><label for='BillingPostalAddress'>* 3e. Postal Address .......:</label><span class='field-widget'> ". $row['company_postal_address'] ." </span></div>";

	   echo"<div class='field-label'><label for='BillingTownCity'>* 3f. Town/City.............:</label><span class='field-widget'> ". $row['company_city'] ." </span></div>";

	   echo"<div class='field-label'><label for='BillingCountry'>* 3g. Country...............:</label><span class='field-widget'> ". $row['name'] ." </span></div>";

	   echo"<div class='field-label'><label for='BillingMobileWorkPhone'>* 3h. Voice Phone...........:</label><span class='field-widget'> ". $row['company_voice_phone'] ." </span></div>";

	 echo"<div class='field-label'><label for='BillingFaxNumber'>&nbsp;&nbsp; 3i. Fax Number............:</label><span class='field-widget'> ". $row['company_fax_number'] ." </span></div>";

	 echo"<div class='field-label'><label for='BillingEmailAddress'>* 3j. E-mail Address........:</label><span class='field-widget'> ". $row['company_email_address'] ." </span></div>";
		
		echo "<div class='headings'>4.DESCRIPTION OF ORGANISATION/DOMAIN</div>";
		
	echo"<div class='field-label'><label for='OrganisationDescription'>* 4a. Description of domain owner's organisation..:</label><span class='field-widget'> ". $row['domain_owner_org_desc'] ." </span></div>";

	   echo"<div class='field-label'><label for='DomainUsage'>* 4b. Proposed domain usage.:</label><span class='field-widget'> ". $row['domain_usage'] ." </span></div>";
		
      echo "<div class='headings'> 5.  TECHNICAL CONTACT</div>";
	  
	   echo"<div class='field-label'><label for='TechZispaHandle'>* 5a. ZISPA Handle..........:</label><span class='field-widget'> ". $row['company_name'] ." </span></div>";

	   echo"<div class='field-label'><label for='TechContactName'>* 5b. Contact Name..........:</label><span class='field-widget'> ". $row['company_contact_name'] ." </span></div>";

	   echo"<div class='field-label'><label for='TechOrganisationName'>* 5c. Organisation Name.....:</label><span class='field-widget'> ". $row['company_name'] ." </span></div>";

	   echo"
		<div class='field-label'><label for='TechPhysicalAddress'>* 5d. Physical Address .....:</label><span class='field-widget'> ". $row['company_physical_address'] ." </span></div>";

	   echo"<div class='field-label'><label for='TechPostalAddress'>* 5e. Postal Address .......:</label><span class='field-widget'> ". $row['company_postal_address'] ." </span></div>";

	   echo"<div class='field-label'><label for='TechTownCity'>* 5f. Town/City.............:</label><span class='field-widget'> ". $row['company_city'] ." </span></div>";

	   echo"
		<div class='field-label'><label for='TechCountry'>* 5g. Country...............:</label><span class='field-widget'> ". $row['name'] ." </span></div>";

	   echo"<div class='field-label'><label for='VoicePhone'>* 5h. Voice Phone...........:</label><span class='field-widget'> ". $row['company_voice_phone'] ." </span></div>";

	   echo"<div class='field-label'><label for='FaxNumber'>&nbsp;&nbsp; 5i. Fax Number............:</label><span class='field-widget'> ". $row['company_fax_number'] ." </span></div>
		";

	   echo"<div class='field-label'><label for='EmailAddress'>* 5j. E-mail Address........:</label><span class='field-widget'> ". $row['company_email_address'] ." </span></div>";
		
echo "<div class='headings'>6.  PRIMARY NAMESERVER</div> " ;

	   echo"<div class='field-label'><label for='Email Address'>* 6a. Hostname..............:</label><span class='field-widget'> ". $row['host_name1'] ." </span></div>";
		
	 echo" <div class='field-label'><label for='Email Address'>* 6b. IP Address............:</label><span class='field-widget'> ". $row['ip_address1'] ." </span></div>";
		
		echo "<div class='headings'>SECONDARY NAMESERVER</div>";

	echo"<div class='field-label'><label for='Email Address'>* 6c. Hostname..............:</label><span class='field-widget'> ". $row['host_name2'] ." </span></div>";

	echo"<div class='field-label'><label for='Email Address'>* 6d. IP Address............:</label><span class='field-widget'> ". $row['ip_address2'] ." </span></div>";
		
		echo "<div class='headings'>SECONDARY NAMESERVER</div>";

	   echo"<div class='field-label'><label for='Email Address'>&nbsp;&nbsp;6e. Hostname..............:</label><span class='field-widget'> ". $row['host_name3'] ." </span></div>";
		
			   echo"<div class='field-label'><label for='Email Address'>&nbsp;&nbsp;6f. IP Address............:</label><span class='field-widget'> ". $row['ip_address3'] ." </span></div>";
		
		echo "<div class='headings'>SECONDARY NAMESERVER</div>";
		
	echo"<div class='field-label'><label for='Email Address'>&nbsp;&nbsp;6g. Hostname..............:</label><span class='field-widget'> ". $row['host_name4'] ." </span></div>";

		   echo"<div class='field-label'><label for='Email Address'>&nbsp;&nbsp;6h. IP Address............:</label><span class='field-widget'> ". $row['ip_address4'] ." </span></div>";
		
		   echo"<div id='poboxaddress'>
	 <span class='headings'>* 7.  DOMICILIUM CITANDI ET EXECUTANDI</span>
      The organisation specified
      in 2 above chooses as its
      address for the giving and
      serving of notices the 
      following street address
      (Note: Post Office box or
      Post Office bag addresses
      are not acceptable)..................................................................:</div> <span id='last_field-widget'> ". $row['physical_address_detail'] ." </span> </div>";

	   
     echo("</div>");
	 
	 
	
		
		
echo "<div class='footer'>Courtesy of the Service Management Center (SMC) Africom @2015 <a href='http://www.afri-com.net'>www.afri-com.net</a></div>";
	 

$full_domain_name=$row['domain_name'];
$_SESSION['domain_name'] = $full_domain_name;

$domain_status=$row['domstatus'];
$_SESSION['domstatus'] = $domain_status;

$domain_owner=$row['domainOwner'];
$_SESSION['domainOwner'] = $domain_owner;

$domain_owner_org_name=$row['domain_owner_org_name'];
$_SESSION['domain_owner_org_name'] = $domain_owner_org_name;

$physical_address_detail=$row['physical_address_detail'];
$_SESSION['physical_address_detail'] = $physical_address_detail;

$postal_address_detail=$row['postal_address_detail'];
$_SESSION['postal_address_detail'] = $postal_address_detail;

$domain_owner_city=$row['city'];
$_SESSION['city'] = $domain_owner_city;

$domain_owner_country_name=$row['name'];
$_SESSION['name'] = $domain_owner_country_name;

$domain_owner_voice_phone=$row['voicephone'];
$_SESSION['voicephone'] = $domain_owner_voice_phone;

$domain_owner_faxnumber=$row['faxnumber'];
$_SESSION['faxnumber'] = $domain_owner_faxnumber;

$domain_owner_emailaddress=$row['emailaddress'];
$_SESSION['emailaddress'] = $domain_owner_emailaddress;

$domain_owner_org_desc=$row['domain_owner_org_desc'];
$_SESSION['domain_owner_org_desc'] = $domain_owner_org_desc;

$domain_usage=$row['domain_usage'];
$_SESSION['domain_usage'] = $domain_usage;

}  //end while

} //end if

else
{
echo "No results fetched ";
}

?>


</body>
</html>