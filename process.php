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

$address_detail1=$_POST["address_detail1"];  
$address_detail2=$_POST["address_detail2"];

$address_type_id1= $_POST['address_type_id1'];
$address_type_id2= $_POST['address_type_id2'];

$contact_detail_1= $_POST['contact_detail_1'];
$contact_detail_2= $_POST['contact_detail_2'];
$contact_detail_3= $_POST['contact_detail_3'];
$contact_detail_4= $_POST['contact_detail_4'];

$contact_type_id_1= $_POST['contact_type_id_1'];
$contact_type_id_2= $_POST['contact_type_id_2'];
$contact_type_id_3= $_POST['contact_type_id_3'];
$contact_type_id_4= $_POST['contact_type_id_4'];
$country_id=$_POST["country_id"];

$hostname_1=$_POST["hostname_1"];
$sec_hostname_2=$_POST["sec_hostname_2"];
$sec_hostname_3=$_POST["sec_hostname_3"];
$sec_hostname_4=$_POST["sec_hostname_4"];

$ip_address_1=$_POST["ip_address_1"];
$sec_ip_address_2=$_POST["sec_ip_address_2"];
$sec_ip_address_3=$_POST["sec_ip_address_3"];
$sec_ip_address_4=$_POST["sec_ip_address_4"];

$name_server_type_id_1=$_POST["name_server_type_id_1"];
$name_server_type_id_2=$_POST["name_server_type_id_2"];
$name_server_type_id_2=$_POST["name_server_type_id_2"];
$name_server_type_id_2=$_POST["name_server_type_id_2"];




// Attempt insert query execution
$sql1 = "INSERT INTO domain_details (domain_id,domain_name,domain_usage,domainOwner,domain_owner_org_name,hosting_company_id,domain_owner_org_desc,domstatus)
  VALUES (NULL,'$domain_name','$domain_usage','$domainOwner','$domain_owner_org_name' ,'$hosting_company_id' ,'$domain_owner_org_desc','$domstatus')";
 
 $result1= mysqli_query($link, $sql1);
 $domain_id=mysqli_insert_id($link);
 


$sql2= "INSERT INTO address (address_id,address_detail,city,domain_id,address_type_id,country_id,hosting_company_id)
  VALUES (NULL,'$address_detail1','$city','$domain_id','$address_type_id1','$country_id','$hosting_company_id') 
         ,(NULL,'$address_detail2','$city','$domain_id','$address_type_id2','$country_id','$hosting_company_id')";

$result2= mysqli_query($link, $sql2);
		
$sql3= "INSERT INTO contact (contact_id,contact_detail,contact_type_id,domain_id,hosting_company_id)
        VALUES (NULL,'$contact_detail_1','$contact_type_id_1','$domain_id','$hosting_company_id')
			  ,(NULL,'$contact_detail_2','$contact_type_id_2','$domain_id','$hosting_company_id')
		      ,(NULL,'$contact_detail_3','$contact_type_id_3','$domain_id','$hosting_company_id')
			  ,(NULL,'$contact_detail_4','$contact_type_id_4','$domain_id','$hosting_company_id')";
			  

$result3= mysqli_query($link, $sql3);

$sql4= "INSERT INTO name_server (name_server_id,host_name,ip_address,name_server_type_id,domain_id)
        VALUES (NULL,'$hostname_1','$ip_address_1','$name_server_type_id_1','$domain_id')
			  ,(NULL,'$sec_hostname_2','$sec_ip_address_2','$name_server_type_id_2','$domain_id')
		      ,(NULL,'$sec_hostname_3','$sec_ip_address_3','$name_server_type_id_2','$domain_id')
			  ,(NULL,'$sec_hostname_4','$sec_ip_address_4','$name_server_type_id_2','$domain_id')";

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