<?php session_start(); ?>

<link rel="stylesheet" type="text/css" href="css/main.css">


<div class="header">Africom ZISPA Domain Registration Form!</div>

<?php
error_reporting (E_ALL ^ E_NOTICE);
include('dbconnector.php');
// define variables and set to empty values
$domain_nameErr = $domain_usageErr = $domainOwnerErr = $domain_owner_org_nameErr = $hosting_company_idErr = $domain_owner_org_descErr = $cityErr = $domstatusErr = $physical_address_detailErr = $postal_address_detailErr = $voicephoneErr = $faxnumberErr = $mobilenumberErr = $emailaddressErr = $country_idErr = $primary_ns_hostnameErr = $secondary_ns_hostnameErr = $primary_ns_ipaddressErr = $secondary_ns_ipaddressErr = "";
$domain_name = $domain_usage = $domainOwner = $domain_owner_org_name = $hosting_company_id = $domain_owner_org_desc = $city = $domstatus = $physical_address_detail = $postal_address_detail = $voicephone = $faxnumber = $mobilenumber = $emailaddress = $country_id = $primary_ns_hostname = $secondary_ns_hostname = $primary_ns_ipaddress = $secondary_ns_ipaddress = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*	$name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    */
    if (empty($_POST['domain_name'])) {
        $domain_nameErr = "Domain name is required";
    } else {
        $domain_name = test_input($_POST['domain_name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $domain_name)) {
            $domain_nameErr = "Domain name Only requires letters and white space";
        }
    }

    if (empty($_POST['domain_usage'])) {
        $domain_usageErr = "Domain usage is required";
    } else {
        $domain_usage = test_input($_POST['domain_usage']);
        if (!preg_match("/^[a-zA-Z ]*$/", $domain_usage)) {
            $domain_usageErr = "Domain Usage Only requires letters and white space";
        }
    }
    if (empty($_POST['domainOwner'])) {
        $domainOwnerErr = "Domain Owner is required";
    } else {
        $domainOwner = test_input($_POST['domainOwner']);
        if (!preg_match("/^[a-zA-Z ]*$/", $domainOwner)) {
            $domainOwnerErr = "Domain Owner Only requires letters and white space";
        }
    }

    if (empty($_POST['domain_owner_org_name'])) {
        $domain_owner_org_nameErr = "Domain Owner Organisation Name is required";
    } else {
        $domain_owner_org_name = test_input($_POST['domain_owner_org_name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $domain_owner_org_name)) {
            $domain_owner_org_nameErr = "Domain Owner Organisation Name Only requires letters and white space";
        }
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
        if (!preg_match("/^[a-zA-Z ]*$/", $domain_owner_org_desc)) {
            $domain_owner_org_descErr = "Domain Owner Organisation Description Only requires letters and white space";
        }
    }
    if (empty($_POST['city'])) {
        $cityErr = "City is required";
    } else {
        $city = test_input($_POST['city']);
        if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
            $cityErr = "Domain Owner City/Town Only requires letters and white space";
        }
    }


    if (empty($_POST['domstatus'])) {
        $domstatusErr = "Status of domain is required";
    } else {
        $domstatus = test_input($_POST['domstatus']);
        if (!preg_match("/^[a-zA-Z ]*$/", $domstatus)) {
            $domstatusErr = "Domain Status Only requires letters and white space";
        }
    }
    if (empty($_POST['physical_address_detail'])) {
        $physical_address_detailErr = "Physical address is required";
    } else {
        $physical_address_detail = test_input($_POST['physical_address_detail']);
        if (!preg_match("/^[a-zA-Z ]*$/", $physical_address_detail)) {
            $physical_address_detailErr = "Physical Address Only requires letters and white space";
        }
    }
    if (empty($_POST['postal_address_detail'])) {
        $postal_address_detailErr = "Postal address is required";
    } else {
        $postal_address_detail = test_input($_POST['postal_address_detail']);
        if (!preg_match("/^[a-zA-Z ]*$/", $postal_address_detail)) {
            $postal_address_detailErr = "Postal Address Only requires letters and white space";
        }
    }
    if (empty($_POST['contact_detail_1'])) {
        $voicephoneErr = "Work Phone is required";
    } else {
        $voicephone = test_input($_POST['contact_detail_1']);
        //if (!preg_match("/^[a-zA-Z ]*$/",$voicephone)) {
        // $voicephoneErr = "Work phone Only requires letters and white space";
        //}
    }
    if (empty($_POST['contact_detail_2'])) {
        $faxnumberErr = "Fax Number is required";
    } else {
        $faxnumber = test_input($_POST['contact_detail_2']);
        //if (!preg_match("/^[a-zA-Z ]*$/",$faxnumber)) {
        // $faxnumberErr = "Fax number Only requires letters and white space";
        //}
    }
    if (empty($_POST['contact_detail_3'])) {
        $mobilenumberErr = "Mobile Phone number is required";
    } else {
        $mobilenumber = test_input($_POST['contact_detail_3']);
        //if (!preg_match("/^[a-zA-Z ]*$/",$mobilenumber)) {
        // $mobilenumberErr = "Mobile number  Only requires letters and white space";
        //}
    }
    if (empty($_POST['contact_detail_4'])) {
        $emailaddressErr = "Email Address is required";
    } else {
        $emailaddress = test_input($_POST['contact_detail_4']);
// check if e-mail address is well-formed
        if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
            $emailaddressErr = "Invalid email format";
        }
    }
    if (empty($_POST['country_id'])) {
        $country_idErr = "Country is required";
    } else {
        $country_id = test_input($_POST['country_id']);
    }
    if (empty($_POST['primary_ns_hostname'])) {
        $primary_ns_hostnameErr = "Hostname server One is required";
    } else {
        $primary_ns_hostname = test_input($_POST['primary_ns_hostname']);
    }
    if (empty($_POST['secondary_ns_hostname'])) {
        $secondary_ns_hostnameErr = "Hostname server Two is required";
    } else {
        $secondary_ns_hostname = test_input($_POST['secondary_ns_hostname']);
    }
    if (empty($_POST['primary_ns_ipaddress'])) {
        $primary_ns_ipaddressErr = "IP Address for hostname One is required";
    } else {
        $primary_ns_ipaddress = test_input($_POST['primary_ns_ipaddress']);
    }
    if (empty($_POST['secondary_ns_ipaddress'])) {
        $secondary_ns_ipaddressErr = "IP Address for hostname Two is required";
    } else {
        $secondary_ns_ipaddress = test_input($_POST['secondary_ns_ipaddress']);
    }



} //end first if 
// Required field names
$required = array('domain_name', 'domain_usage', 'domainOwner', 'domain_owner_org_name', 'hosting_company_id', 'domain_owner_org_desc', 'city', 'domstatus', 'physical_address_detail', 'postal_address_detail', 'contact_detail_1', 'contact_detail_2', 'contact_detail_3', 'contact_detail_4', 'country_id', 'primary_ns_hostname', 'secondary_ns_hostname', 'primary_ns_ipaddress', 'secondary_ns_ipaddress');
// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach ($required as $field) {
    if (test_input($_POST[$field] == "")) {
        $error = true;
    }
}
if ($error) {

    echo "<div class='full_template'>";

    echo "<p>Please note that all fields are required</p>";
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
	  $primary_ns_hostnameErr  <br />
	  $secondary_ns_hostnameErr <br />
	  $primary_ns_ipaddressErr <br />
	  $secondary_ns_ipaddressErr   <br />
	  $hosting_company_idErr <br /> ";
    echo "</div>";

} else {

// Attempt insert query execution
    $sql1 = "INSERT INTO domain_details (domain_id,domain_name,domain_usage,domainOwner,domain_owner_org_name,hosting_company_id,domain_owner_org_desc,domstatus)
  VALUES (NULL,'$domain_name','$domain_usage','$domainOwner','$domain_owner_org_name' ,'$hosting_company_id' ,'$domain_owner_org_desc','$domstatus')";

    $result1 = mysqli_query($link, $sql1);
    $domain_id = mysqli_insert_id($link);

    $sql2 = "INSERT INTO address (address_id,address_detail,city,domain_id,address_type_id,country_id,hosting_company_id)
  VALUES (NULL,'$physical_address_detail','$city','$domain_id','1','$country_id','$hosting_company_id')
         ,(NULL,'$postal_address_detail','$city','$domain_id','2','$country_id','$hosting_company_id')";
        $result2 = mysqli_query($link, $sql2);

    $sql3 = "INSERT INTO contact (contact_id,contact_detail,contact_type_id,domain_id,hosting_company_id)
        VALUES (NULL,'$voicephone','4','$domain_id','$hosting_company_id')
			  ,(NULL,'$faxnumber','2','$domain_id','$hosting_company_id')
		      ,(NULL,'$mobilenumber','3','$domain_id','$hosting_company_id')
			  ,(NULL,'$emailaddress','1','$domain_id','$hosting_company_id')";
    $result3 = mysqli_query($link, $sql3);

    $sql4 = "INSERT INTO name_server (name_server_id,host_name,ip_address,name_server_type_id,domain_id)
        VALUES (NULL,'$primary_ns_hostname','$primary_ns_ipaddress','2','$domain_id')
			  ,(NULL,'$secondary_ns_hostname','$secondary_ns_ipaddress','1','$domain_id')";
    $result4 = mysqli_query($link, $sql4);

    $_SESSION['domain_id'] = $domain_id;
    if (!($result1 && $result2 && $result3 && $result4)) {
        echo "ERROR: Couldnt execute  </br> $sql2. </<br> $sql3. </br> $sql4. because" . mysqli_error($link);
    } else {
        header('Location:domaintemplate.php');
        exit();
        //the line below helps me during development
        //echo "Records added successfully. ";
    }
    // commit transaction
    mysqli_commit($link);
    // Close connection
    mysqli_close($link);
//session_destroy();
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} //end sanitisation function
?>


<div class='footer'>Courtesy of the Service Management Center (SMC) Africom @2015 <a href='http://www.afri-com.net'>www.afri-com.net</a>
</div>