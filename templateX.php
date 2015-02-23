<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>

<link rel="stylesheet" href="css/mail.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
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

$_SESSION['downloadFileName'] = $downloadFileName;

echo"<div class='header'> Please attach associated documents for domain $full_domain_name with domain Owner $domain_owner before sending to ZISPA </div>";	



?>


<body>

<?php 

echo"<div class='full_template'>";
echo"<div class='field_widget_z'>Template " . $downloadFileName . " is already attached on the form below and ready to send to Zispa ,ONLY attach a release letter if you are modifying the domain </div>";

/* "<a href='./{$downloadFileName}'>View Template</a>          

the line above was for me to see if the template is being passed from the previous page
*/
?>

	<div class="mail">
	  <form action='mail.php' method='post' id='mailForm' enctype='multipart/form-data'>
	  <fieldset>		 
      <legend>Release Letter Attachment Form</legend> 
			<div class="mail_input_labels"> Your Name : </div>
            
			    <div class="form_inputfileds">
            	<input type="text" id="name" name="name"  placeholder='User Name'  title="We only need it for records purposes" />
				  <span id="invalid-name" class="error_msg"></span>
                  
				</div>
			 
			 
			    <div class="mail_input_labels"> to - E-mail : </div>
				<div class="form_inputfileds">
                <input type="email" id="email" name="email"  placeholder='smc@afri-com.net'/>
				<span id="invalid-email" class="error_msg"></span>
				</div>
	
		
			    <div class="mail_input_labels"> Subject : </div>
				<div class="form_inputfileds">                
             <input type="text" id="subject" name="subject" placeholder='New:'  title=" Just type either New: or Modify: or Delete:"/>
                    <span id="invalid-subject" class="error_msg"></span>               	
				   
				</div>
                
         <div class="mail_input_labels"> Attached Template: </div>
			<div class="form_inputfileds"  >
         <input type="text" id="attachedtemplate" name="attachedtemplate" value='<?php  echo  $downloadFileName ; ?>'  disabled /> <span>Template Automatically Attached</span>

 
             </div>

			
			 
			
			    <div class="mail_input_labels"> Release Letter : </div>
			<div class="form_inputfileds">
           <input type="file" id="letter" name="letter"  placeholder='Release Letter' title=" You only need to attach a release letter only if you are transfering a Domain from one ISP to another : ie Modify"/> <span id="invalid-letter" class="error_msg"></span>
                            
             </div>
         			 
			
			    <div class="mail_input_labels" > Message : </div>
				<div class="form_inputfileds">
                <textarea name="message" id="message" title=" Just type either Register or Modify or Delete">
  
  </textarea><span id="invalid-message" class="error_msg"></span>
                </div>
          
				
		
			 

	   <div class="mail_input_labels"> Send Template: </div>
       <div class="form_inputfileds"><input type="submit" value="Send Mail!" id='submit_btn' name="submit_btn" class="submit_b"/></div>
        </fieldset>
		</form>
        
        </div>
        
       	<script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <link rel="stylesheet" href="css/jquery-ui.css"/>        
        <link rel="stylesheet" type="text/css" href="css/tooltip.css" />
   	   <script src="js/jquery.validate.min.js"></script>
	<script>
	
	
	/* this coe below is for the attachment form
	
        $('.title').click(function(){
            var txt = "Hide Attachment Form";
            if ($(".title").html()==txt)
            {
                txt = "Show Attachment form";
            }
			
            $(".title").html(txt);


            $(".mail").slideToggle("medium");
        });
*/ 
	
	
  (function($){
		  
		  $( document ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });
		  
		  
		  
	     jQuery.validator.setDefaults({
			errorPlacement: function(error, element) {
				error.appendTo('#invalid-' + element.attr('id'));
			}
		});
		
 	
	     $("#mailForm").validate({
		        rules: {
					name: {
					   required: true,
					   minlength : 3,
					},
					
         				subject: {
					   required: true,
					   minlength : 3,
					},

					email:{ 
					   required: true,
					   email: true,
					},
					letter: {required:false},
					message: "required",
				},
				messages: {
					name: {
					   required:"Please enter your name",
					   minlength: "Please enter a valid name",
					},
					
					email:{ 
					   required: "Please enter your email",
					   minlength: "Please enter a valid email address",
					},
				
				    letter: "Please Upload the release Letter",
					message: "Please enter your message",
					subject: { 
					   required: "Please enter your subject",
					   minlength: "Please enter a valid email address",
					}
				}
		 });
	  })($);
	</script>

<?php
echo "</div>" ;

echo "<div class='footer'>Courtesy of the Service Management Center (SMC) Africom @2015 <a href='http://www.afri-com.net'>www.afri-com.net</a></div>";




?>

</body>
</html>