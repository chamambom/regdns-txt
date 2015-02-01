<?php session_start(); ?>
<?php
error_reporting (E_ALL ^ E_NOTICE);


include('dbconnector.php');
$domain_name = $_POST['domain_name'];
$domain_usage = $_POST['domain_usage'];
$domainOwner = $_POST['domainOwner'];
$domain_owner_org_name = $_POST['domain_owner_org_name'];
$hosting_company_id = $_POST['hosting_company_id'];
$domain_owner_org_desc= $_POST["domain_owner_org_desc"];
$city=$_POST["city"];
$domstatus=$_POST["domstatus"];

$physical_address_detail=$_POST["physical_address_detail"];  
$postal_address_detail=$_POST["postal_address_detail"];

$voicephone= $_POST['contact_detail_1'];
$faxnumber= $_POST['contact_detail_2'];
$mobilenumber= $_POST['contact_detail_3'];
$emailaddress= $_POST['contact_detail_4'];

$country_id=$_POST["country_id"];

$host_name1=$_POST["host_name1"];
$host_name2=$_POST["sec_hostname_2"];
$host_name3=$_POST["sec_hostname_3"];
$host_name4=$_POST["sec_hostname_4"];

$ip_address1=$_POST["ip_address_1"];
$ip_address2=$_POST["sec_ip_address_2"];
$ip_address3=$_POST["sec_ip_address_3"];
$ip_address4=$_POST["sec_ip_address_4"];




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
					   
			echo "Records added successfully. ";
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
?>