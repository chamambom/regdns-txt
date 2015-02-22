<?php session_start(); ?>

        <link rel="stylesheet" type="text/css" href="css/main.css">


<div class="header">Africom ZISPA Domain Registration Form!</div>

<?php
include('dbconnector.php');

// define variables and set to empty values
$domain_nameErr = $domain_usageErr = $domainOwnerErr = $domain_owner_org_nameErr = $hosting_company_idErr = $domain_owner_org_descErr = $cityErr = $domstatusErr =$physical_address_detailErr = $postal_address_detailErr = $voicephoneErr = $faxnumberErr = $mobilenumberErr = $emailaddressErr = $country_idErr = $host_name1Err= $host_name2Err = $host_name3Err = $host_name4Err = $ip_address1Err = $ip_address2Err = $ip_address3Err = $ip_address4Err= "";

$domain_name = $domain_usage = $domainOwner = $domain_owner_org_name = $hosting_company_id = $domain_owner_org_desc = $city = $domstatus =$physical_address_detail = $postal_address_detail = $voicephone = $faxnumber = $mobilenumber = $emailaddress = $country_id = $host_name1= $host_name2 = $host_name3 = $host_name4 = $ip_address1 = $ip_address2 = $ip_address3 = $ip_address4= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST['domain_name'])) {
     $domain_nameErr=  "Domain name is required" ;
  } else {
    $domain_name = test_input($_POST['domain_name']);
  }
  
  if (empty($_POST['domain_usage'])) {
    $domain_usageErr = "Domain usage is required";
  } else {
    $domain_usage = test_input($_POST['domain_usage']);
  }

  if (empty($_POST['domainOwner'])) {
    $domainOwnerErr = "Domain Owner is required";
  } else {
    $domainOwner = test_input($_POST['domainOwner']);
  }
  
    if (empty($_POST['domain_owner_org_name'])) {
    $domain_owner_org_nameErr = "Domain Owner Organisation Name is required";
  } else {
    $domain_owner_org_name = test_input($_POST['domain_owner_org_name']);
  }

    if (empty($_POST['hosting_company_id'])) {
    $hosting_company_idErr = "Hosting Company is required";
  } else {
    $hosting_company_id = test_input($_POST['hosting_company_id']);
  }

	
   if (empty($_POST['domain_owner_org_desc'])) {
    $domain_owner_org_descErr = "Description of domain owner organisation is required";
  } else {
    $domain_owner_org_desc = test_input($_POST['domain_owner_org_desc']);
  }

   if (empty($_POST['city'])) {
    $cityErr = "City is required";
  } else {
    $city = test_input($_POST['city']);
  }
  
  
   if (empty($_POST['domstatus'])) {
    $domstatusErr = "Status of domain is required";
  } else {
    $domstatus = test_input($_POST['domstatus']);
  }

      if (empty($_POST['physical_address_detail'])) {
    $physical_address_detailErr = "Physical address is required";
  } else {
    $physical_address_detail = test_input($_POST['physical_address_detail']);
  }

      if (empty($_POST['postal_address_detail'])) {
    $postal_address_detailErr = "Postal address is required";
  } else {
    $postal_address_detail = test_input($_POST['postal_address_detail']);
  }

      if (empty($_POST['contact_detail_1'])) {
    $voicephoneErr = "Work Phone is required";
  } else {
    $voicephone = test_input($_POST['contact_detail_1']);
  }
  
  
 if (empty($_POST['contact_detail_2'])) {
    $faxnumberErr = "Fax Number is required";
  } else {
    $faxnumber = test_input($_POST['contact_detail_2']);
  }
  

  if (empty($_POST['contact_detail_3'])) {
    $mobilenumberErr = "Mobile Phone number is required";
  } else {
    $mobilenumber = test_input($_POST['contact_detail_3']);
  }

  if (empty($_POST['contact_detail_4'])) {
    $emailaddressErr = "Email Address is required";
  } else {
    $emailaddress = test_input($_POST['contact_detail_4']);
  }

  if (empty($_POST['country_id'])) {
    $country_idErr = "Country is required";
  } else {
    $country_id = test_input($_POST['country_id']);
  }
  
  
  if (empty($_POST['host_name1'])) {
    $host_name1Err = "Hostname server One is required";
  } else {
    $host_name1 = test_input($_POST['host_name1']);
  }

  if (empty($_POST['sec_hostname_2'])) {
    $host_name2Err = "Hostname server Two is required";
  } else {
    $host_name2 = test_input($_POST['sec_hostname_2']);
  }

  if (empty($_POST['sec_hostname_3'])) {
    $host_name3Err = "Hostname Server Three is required";
  } else {
    $host_name3 = test_input($_POST['sec_hostname_3']);
  }
  
    if (empty($_POST['sec_hostname_4'])) {
    $host_name4Err = "Hostname Server Four is required";
  } else {
    $host_name4 = test_input($_POST['sec_hostname_4']);
  }  

    if (empty($_POST['ip_address_1'])) {
    $ip_address1Err = "IP Address for hostname One is required";
  } else {
    $ip_address1 = test_input($_POST['ip_address_1']);
  }

    if (empty($_POST['sec_ip_address_2'])) {
    $ip_address2Err = "IP Address for hostname Two is required";
  } else {
    $ip_address2 = test_input($_POST['sec_ip_address_2']);
  }

    if (empty($_POST['sec_ip_address_3'])) {
    $ip_address3Err = "IP Address for hostname Three is required";
  } else {
    $ip_address3 = test_input($_POST['sec_ip_address_3']);
  }

    if (empty($_POST['sec_ip_address_4'])) {
    $ip_address4Err = "IP Address for hostname Four is required";
  } else {
    $ip_address4 = test_input($_POST['sec_ip_address_4']);
  
  }
  
  
} //end first if 

// Required field names
$required = array('domain_name', 'domain_usage' ,'domainOwner','domain_owner_org_name','hosting_company_id','domain_owner_org_desc','city','domstatus','physical_address_detail','postal_address_detail','contact_detail_1','contact_detail_2','contact_detail_3','contact_detail_4','country_id','host_name1','sec_hostname_2','sec_hostname_3','sec_hostname_4','ip_address_1','sec_ip_address_2','sec_ip_address_3','sec_ip_address_4');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
	
  if (test_input($_POST[$field]=="")) {
    $error = true;
	
  } 
}

if ($error) {
	
echo     "<div class='full_template'>";
	
echo	 "<p>Please note that all fields are required</p>";

echo "$domain_nameErr <br/> 
      $domain_usageErr <br /> 
	  $domainOwnerErr <br /> 
	  $domain_owner_org_nameErr <br /> 
	  $domain_owner_org_descErr <br /> 
	  $cityErr <br /> 
	  $domstatusErr <br /> 
	  $physical_address_detailErr <br />  
	  $postal_address_detailErr  <br /> 
	  $voicephoneErr <br />  
	  $faxnumberErr <br /> 
	  $mobilenumberErr <br /> 
	  $emailaddressErr   <br />
	  $country_idErr <br /> 
	  $host_name1Err  <br /> 
	  $host_name2Err <br /> 
	  $host_name3Err  <br /> 
	  $host_name4Err <br /> 
	  $ip_address1Err <br /> 
	  $ip_address2Err   <br /> 
	  $ip_address3Err <br /> 
	  $ip_address4Err 
  	  $hosting_company_idErr <br /> ";
echo     "</div>" ;
  

} else {
	
// Attempt insert query execution
$sql1 = "INSERT INTO domain_details (domain_id,domain_name,domain_usage,domainOwner,domain_owner_org_name,hosting_company_id,domain_owner_org_desc,domstatus)
  VALUES (NULL,'$domain_name','$domain_usage','$domainOwner','$domain_owner_org_name' ,'$hosting_company_id' ,'$domain_owner_org_desc','$domstatus')";
 
 $result1= mysqli_query($link, $sql1);
 $domain_id=mysqli_insert_id($link);
 


$sql2= "INSERT INTO address (address_id,physical_address_detail,postal_address_detail,city,domain_id,country_id,hosting_company_id)
  VALUES (NULL,'$physical_address_detail','$postal_address_detail','$city','$domain_id','$country_id','$hosting_company_id') ";

$result2= mysqli_query($link, $sql2);
		
$sql3= "INSERT INTO contact (contact_id,voicephone,faxnumber,mobilenumber,emailaddress,domain_id,hosting_company_id)
        VALUES (NULL,'$voicephone','$faxnumber','$mobilenumber','$emailaddress','$domain_id','$hosting_company_id')";
			  

$result3= mysqli_query($link, $sql3);

$sql4= "INSERT INTO name_server (name_server_id,host_name1,ip_address1,host_name2,ip_address2,host_name3,ip_address3,host_name4,ip_address4,domain_id)
        VALUES (NULL,'$host_name1','$ip_address1','$host_name2','$ip_address2','$host_name3','$ip_address3','$host_name4','$ip_address4','$domain_id')";

$result4= mysqli_query($link, $sql4);


$_SESSION['domain_id']=$domain_id;


if (!($result1 && $result2 && $result3 && $result4  ) ){

			 echo "ERROR: Couldnt execute $sql1. $sql2. $sql3. $sql4. because" . mysqli_error($link);
		  
		} else{
			

			header('Location:domaintemplate.php');
			exit();
				
			//the line below helps me during development  		   
			//echo "Records added successfully. ";
		}	
		
		
		
		// commit transaction
        mysqli_commit($link);
		
		
		
     	// Close connection
		mysqli_close($link);
		
	
	
		
//Code sources to be tried

//$address_type_id2= $_POST['address_type_id2'];
//foreach ( $address_type_id as $key => $value )
//{
//  echo 'Textbox #'.htmlentities($key).' has value: ';
//  echo htmlentities($value);
//}
//unset($value);

//session_destroy();

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} //end sanitisation function



?>


<div class='footer'>Courtesy of the Service Management Center (SMC) Africom @2015 <a href='http://www.afri-com.net'>www.afri-com.net</a></div>
