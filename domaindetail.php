<?php session_start(); ?>
<?php

if(isset($_GET['domain_id']))
$PiD=$_GET['domain_id'];

include('dbconnector.php');


$selectdetail="SELECT * FROM domain_details WHERE domain_id=$PiD";

$result=mysqli_query($link,$selectdetail);
								 
if(mysqli_num_rows($result)>0)		
{						 
	$row=mysqli_fetch_assoc($result);
	
	   echo"<div id='ReportHeader'> This is the Report for ". $row['domain_name'] ."  ". $row['domainOwner'] ." </div>";								 
	   echo"<div id='fullreport'>";
	 
	 
		
	
	
		   echo"<div class='form-row'>
		<div ><label for='Gender'>Gender</label>:</div>
		<div class='field-widget'> ". $row['Gender'] ." </div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Title'>Title</label>:</div>
		<div class='field-widget2'> ". $row['Title'] ." </div>";


	   echo"<div class='form-row'>
		<div ><label for='Nationality'>Nationality</label>:</div>
		<div class='field-widget'> ". $row['Nationality'] ." </div>";


	   echo"<div class='form-row'>
		<div class='field-label' ><label for='Position'>Position</label>:</div>
		<div class='field-widget2'> ". $row['Position'] ." </div>";


	   echo"<div class='form-row'>
		<div ><label for='Telephone Number'>Telephone Number</label>:</div>
		<div class='field-widget'> ". $row['Telephone1'] ." </div>";

	
	   echo"<div class='form-row'>
		<div class='field-label'><label for='Alternative Telephone'>Alternative Telephone</label>:</div>
		<div class='field-widget2'> ". $row['Telephone2'] ." </div>";

	   echo"<div class='form-row'>
		<div ><label for='Email Address'>Email Address</label>:</div>
		<div class='field-widget'> ". $row['EmailAddress1'] ." </div>";

	   echo"<div class='form-row'>
		<div class='field-label'><label for='Alternarnative EmailAddress'>Alternarnative EmailAddress</label>:</div>
		<div class='field-widget2'> ". $row['EmailAddress2'] ." </div>";

	   echo"<div class='form-row'>
		<div ><label for='Country Based'>Country Based</label>:</div>
		<div class='field-widget'> ". $row['CountryBased'] ." </div>";

	   
     echo("</div>");
}
else
{
echo "No results fetched ";
}


?>
</body>
</html>