<?php
include("dbConnector2.php");
$connector = new DbConnector();

$domain_name = trim(strtolower($_POST['domain_name']));
$domain_name = mysqli_escape_string($domain_name);

$query = "SELECT domain_name FROM domain_details WHERE domain_name = '$domain_name' LIMIT 1";
$result = $connector->query($query);
$num = mysql_num_rows($result);

echo $num;
mysqli_close();

?>

