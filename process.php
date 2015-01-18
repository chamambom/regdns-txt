<?php
error_reporting (E_ALL ^ E_NOTICE);



include('dbconnector.php');
$domain_name = $_POST['domain_name'];
$domain_usage = $_POST['domain_usage'];
$domainOwner = $_POST['domainOwner'];
$domain_owner_org_name = $_POST['domain_owner_org_name'];
$hosting_company_id = $_POST['hosting_company_id'];
$domain_owner_org_desc= $_POST["domain_owner_org_desc"];

$address_detail=$_POST["address_detail"];
$city=$_POST["city"];

$country_id=$_POST["country_id"];

// Attempt insert query execution
$sql = "INSERT INTO domain_details (domain_id,domain_name,domain_usage,domainOwner,domain_owner_org_name,hosting_company_id,domain_owner_org_desc)
 VALUES (NULL,'$domain_name','$domain_usage','$domainOwner','$domain_owner_org_name' ,'$hosting_company_id' ,'$domain_owner_org_desc')";
 $result= mysqli_query($link, $sql);
 
 if(!($result)){
							  
							   echo "ERROR: Couldnt execute $sql. because" . mysqli_error($link);
							
						  } else{
							 
								echo "Records added successfully.";
						  }

$current_id=mysqli_insert_id($link);
echo $current_id ;


$address_type_id= $_POST['address_type_id'];
	
foreach ( $address_type_id as $key => $value )
{
  echo 'Textbox #'.htmlentities($key).' has this value: ';
  echo htmlentities($value);
}


$sql2= "INSERT INTO address (address_id,address_detail,city,domain_id,address_type_id,country_id,hosting_company_id)
VALUES (NULL,'$address_detail','$city','$current_id','$value','$country_id','$hosting_company_id')";  


$result1= mysqli_query($link, $sql2);


		if(!($result1)){
			
			 echo "ERROR: Couldnt execute $sql2. because" . mysqli_error($link);
		  
		} else{
		   
			  echo "Second Records added successfully.";
		}
		
//$sql3= "INSERT INTO address (address_id,address_detail,city,domain_id,address_type_id,country_id,hosting_company_id)
//VALUES (NULL,'$address_detail','$city','$current_id','$value','$country_id','$hosting_company_id')"; 



//$current_id=mysqli_insert_id($link);

//echo $current_id;


//$sql1="INSERT INTO location (domain_id, town , country)
 //       VALUES    ('$current_id','$town','$country')";
		

       
//$result2=mysqli_query($link, $sql1);



		 
		// Close connection
		mysqli_close($link);




?>