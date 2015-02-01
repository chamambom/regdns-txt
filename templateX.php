<html>
  <head>
  	<title></title>
<link rel="stylesheet" type="text/css" href="css/domtables.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<?php
session_start();

function ZwDomainTemplate($full_domain_name, $domain_status, $domain_owner, $domain_owner_org_name, $physical_address_detail, $postal_address_detail, $domain_owner_city, $domain_owner_country_name, $domain_owner_voice_phone, $domain_owner_faxnumber, $domain_owner_emailaddress ,$domain_owner_org_desc,$domain_usage) {
    
    $File = str_replace(".", " ", $full_domain_name) . ".txt"; 
 	$Handle = fopen($File, 'w');
 	$Data = "                              ZISPA
                       CO.ZW Registration Office

             APPLICATION TO ESTABLISH A SUB-DOMAIN WITHIN
                 THE .CO.ZW NAMESPACE OF THE INTERNET

       ======================================================== 
      |   ZISPA looks after the administration of '.CO.ZW.'    |
      |                                                        |
      |       ** TERMS AND CONDITIONS OF REGISTRATION **       |
      |                                                        |
      | .CO.ZW domain registrations are subject to the terms   |
      | and conditions as published at http://www.zispa.org.zw |
      | from time to time.                                     |
      |                                                        |
      |              ** COSTS OF REGISTRATION **               |
      |                                                        |
      | The costs of registration will vary from time to time. |
      | Details of current charges may be obtained from ZISPA. |
      |                                                        |
      | This document is intended to be scanned electronically |
      | so please do not change its format or enter data other |
      | than in the specified locations.  The file must be     |
      | sent in plain ASCII format as an attachment and not as |
      | inline text.  It must not be uuencoded or MIME encoded |
      | or sent in any proprietary word processing file format |
      |                                                        |
      | Please send only ONE APPLICATION per e-mail message    |
      | to admin@zispa.org.zw, with the full domain name in    |
      | the Subject line.                                      |
      |                                                        |
      | All data must be entered on a single line following    |
      | the colon for the field concerned to facilitate data   |
      | capture.                                               |
      |                                                        |
      |  ** All fields with an asterisk must be completed **   |
      |                                                        |
       ======================================================== 

      0.  ZW DOMAIN TEMPLATE....: 3.1.4 - 13/02/2003

      1.  DOMAIN NAME and ACTION
      1a. Full domain name......................: {$full_domain_name}
      1b. (N)ew or (M)odify or (D)elete.(N/M/D).: {$domain_status}

      2.  DOMAIN OWNER
      2a. Domain Owner..........: {$domain_owner}
      2b. Organisation Name.....: {$domain_owner_org_name}
      2c. Physical Address......: {$physical_address_detail}
	  2d. Postal Address .......: {$postal_address_detail}
      2e. Town/City.............: {$domain_owner_city}
      2f. Country...............: {$domain_owner_country_name}
      2g. Voice Phone...........: {$domain_owner_voice_phone}
      2h. Fax Number............: {$domain_owner_faxnumber}
      2i. E-mail Address........: {$domain_owner_emailaddress}
	  
      3.  ADMIN/BILLING CONTACT
      3a. ZISPA Handle..........: Africom
      3b. Contact Name..........: SMC
      3c. Organisation Name.....: Africom
      3d. Physical Address .....: Block 3 Tendeseka Park Samora Machel Eastlea
      3e. Postal Address .......: Box 4556 Harare
      3f. Town/City.............: Harare
      3g. Country...............: Zimbabwe
      3h. Voice Phone...........: +263 8644 400
      3i. Fax Number............: +263 4 252118	
      3j. E-mail Address........: smc@afri-com.net
   
      4.  DESCRIPTION OF ORGANISATION/DOMAIN
      4a. Description of domain owner's organisation..: {$domain_owner_org_desc}
      4b. Proposed domain usage.: {$domain_usage}

      5.  TECHNICAL CONTACT
      5a. ZISPA Handle..........: Africom
      5b. Contact Name..........: SMC
      5c. Organisation Name.....: Africom
      5d. Physical Address .....: Block 3 Tendeseka Park Samora Machel Eastlea
      5e. Postal Address .......: Box 4556 Harare
      5f. Town/City.............: Harare
      5g. Country...............: Zimbabwe
      5h. Voice Phone...........: +263 8644 400
      5i. Fax Number............: +263 4 252119
      5j. E-mail Address........: smc@afri-com.net

      6.  PRIMARY NAMESERVER
      6a. Hostname..............: ns1.ai.co.zw
      6b. IP Address............: 41.221.144.2

          SECONDARY NAMESERVER
      6c. Hostname..............: ns2.ai.co.zw
      6d. IP Address............: 41.221.144.3
 
          SECONDARY NAMESERVER
      6e. Hostname..............: ns3.ai.co.zw
      6f. IP Address............: 41.73.47.133
 
          SECONDARY NAMESERVER
      6g. Hostname..............: ns4.ai.co.zw
      6h. IP Address............: 41.221.159.50

      7.  DOMICILIUM CITANDI ET EXECUTANDI
      The organisation specified
      in 2 above chooses as its
      address for the giving and
      serving of notices the 
      following street address
      (Note: Post Office box or
      Post Office bag addresses
      are not acceptable).......: {$physical_address_detail}";

	fwrite($Handle, $Data);
	fclose($Handle);

	return $File;
}   //end function 



$full_domain_name = $_SESSION['domain_name'];
$domain_status=$_SESSION['domstatus'];
$domain_owner=$_SESSION['domainOwner'];
$domain_owner_org_name=$_SESSION['domain_owner_org_name'];
$physical_address_detail=$_SESSION['physical_address_detail'];
$postal_address_detail=$_SESSION['postal_address_detail'];
$domain_owner_city=$_SESSION['city'];
$domain_owner_country_name=$_SESSION['name'];
$domain_owner_voice_phone=$_SESSION['voicephone'];
$domain_owner_faxnumber=$_SESSION['faxnumber'];
$domain_owner_emailaddress=$_SESSION['emailaddress'];
$domain_owner_org_desc=$_SESSION['domain_owner_org_desc'];
$domain_usage=$_SESSION['domain_usage'];


$downloadFileName = ZwDomainTemplate($full_domain_name, $domain_status, $domain_owner, $domain_owner_org_name,$physical_address_detail, $postal_address_detail, $domain_owner_city, $domain_owner_country_name, $domain_owner_voice_phone, $domain_owner_faxnumber, $domain_owner_emailaddress,$domain_owner_org_desc,$domain_usage);

echo"<h4> Please attach associated documents for domain $full_domain_name with domain Owner $domain_owner before sending to ZISPA </h4>";	

 echo"<div class='full_template'>";


echo $downloadFileName;
echo "<a href='./{$downloadFileName}'>Download</a>";

echo "</div>" ;

echo "<h5>Courtesy of the Service Management Center (SMC) Africom@2015</h5>";




?>

</body>
</html>