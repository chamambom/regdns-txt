<?php
include('dbconnector.php');
$domain_name = $_POST['domain_name'];
$domainusage = $_POST['domain_usage'];
$domainOwner = $_POST['domainOwner'];
$domain_owner_org = $_POST['domain_owner_org'];
$hosting_company_id = $_POST['hosting_company_id'];


// Attempt insert query execution
$sql = "INSERT INTO domain_details (domain_id,domain_name,domain_usage,domainOwner,domain_owner_org,hosting_company_id)

 VALUES (NULL,'$domain_name', '$domain_usage','$domainOwner','$domain_owner_org','$hosting_company_id')";
$result1= mysqli_query($link, $sql);
 

$current_id=mysqli_insert_id($link);

echo $current_id;


$sql1="INSERT INTO location (domain_id, town , country)
        VALUES    ('$current_id','$town','$country')";
		

       
$result2=mysqli_query($link, $sql1);

		

if(!($result1)){
	
	 echo "ERROR: Couldnt execute $sql. because" . mysqli_error($link);
  
} else{
   
	  echo "Records added successfully.";
}
 
// Close connection
mysqli_close($link);

?>