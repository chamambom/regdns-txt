<?php
include("dbConnector.php");
$connector = new DbConnector();

$domain_name = trim(strtolower($_POST['domain_name']));
$domain_name = mysql_escape_string($domain_name);

$query = "SELECT domain_name FROM domain_details WHERE domain_name = '$domain_name' LIMIT 1";
$result = $connector->query($query);
$num = mysql_num_rows($result);

echo $num;
mysql_close();

