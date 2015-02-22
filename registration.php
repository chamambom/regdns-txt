<!DOCTYPE html>
<html lang="en">
<head>

        <link rel="stylesheet" type="text/css" href="css/jquery.validate.css" />
        <link rel="stylesheet" href="css/justthetip.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
       <script src="js/jquery-1.3.2.js" type="text/javascript">       </script>
       <script src="js/jquery.validate.js" type="text/javascript"></script>
       <script src="js/justthetip.js"></script>
        
       <script type="text/javascript">
            /* <![CDATA[ */
			
			
			
            jQuery(function($){				
            		jQuery("#validfax").validate({
                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                    message: "Please enter a valid fax number"
                });
					
					
				jQuery("#validmobilephone").validate({
                expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                message: "Please enter a valid mobile phone number"
                });

				
			    jQuery("#validworkphone").validate({
                expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                message: "Please enter a valid mobile phone number"
                });
				
                jQuery("#validcustomerdomainname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: " This field is Required ,"
                });
				
				jQuery("#validdomain_owner_org_desc").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: " Please note that this field is a Required"
                });
				
				jQuery("#validcustomerdomainowner").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: " Please note that this field is a Required"
                });



                jQuery("#validdomain_usage").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: " Please note that this field is a Required"
                });


                jQuery("#vlaiddomain_owner_org_name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: " Please note that this field is a Required"
                });

                jQuery("#validcustomerphysicaladdr").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: " Please note that this field is a Required"
                });

                jQuery("#validcustomerpostaladdr").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: " Please note that this field is a Required"
                });				
				
				jQuery("#city").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
				
				  jQuery("#domainstatus").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
				
      jQuery("#customeremail").validate({
	  expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email address"
                });
				
				
				/*jQuery('#regform').validated(function(){				
					});
				*/
				
				
	  
				
            });
            /* ]]> */
			
$(document).ready(function(){
$('#validcustomerdomainname').blur(username_check);
});
	
function username_check(){	
var domain_name = $('#validcustomerdomainname').val();

if(domain_name == "" || domain_name.length < 4){
$('#validcustomerdomainname').css({'border':'3px #C33 solid'});


$('#tick').hide();
$('#dlength').show();
$('#valid').hide();	


}else{

jQuery.ajax({
   type: "POST",
   url: "check.php",
   data: 'domain_name='+ domain_name,
   cache: false,
   success: function(response){
			if(response == 1){
    			$('#dlength').hide();
				$('#validcustomerdomainname').css('border', '3px #C33 solid');	
				$('#tick').hide();
				$('#cross').fadeIn();
     			$('#invalid').fadeIn();
				$('#valid').hide();	
				

				}else{
				$('#dlength').hide();
				$('#validcustomerdomainname').css('border', '3px #090 solid');
				$('#cross').hide();
				$('#tick').fadeIn();
				$('#valid').fadeIn();	
				$('#invalid').hide();				
				 }

}  //close function response


}); //close ajax 


}  //close else

}

			
			
        </script>

<meta charset="UTF-8">
<title>Add Records Form</title>
</head>
<body>



<div class="header"> Africom ZISPA Domain Registration Form!</div>


<form method="post" action="process.php" id="regform">

<fieldset>


    	<p>
    	<label for="customerdomainname">Full Customer Domain Name:</label>
        <input type="text" name="domain_name"  id="validcustomerdomainname"> 
        <img id="tick" src="images/tick.png" width="16" height="16"/>
        <img id="cross" src="images/cross.png" width="16" height="16"/>
        <span id="valid">Domain is available for registration</span>
        <span id="invalid">Domain name is NOT avaliable for registration</span>
        <span id="dlength">This field cannot be less than 4 characters</span>


  
        <span id='jttrigger-0' href='#'>hint!</span>    
        
        <div id="jttip-0" class="jttip" style="display:none;">
        <div class="jttipcontent"><p>e.g africom.co.zw</p></div>
        </div>
   		
        </p>
        
        <p>
        <label for="state">Domain Status:</label>
        <select name="domstatus" class="selectbox" id="domainstatus" size="1"> 
        <option value="0" selected>Select Below</option> 
        <option value="N">New</option>
  		<option value="D">Delete</option>
  		<option value="M">Modify</option>
		</select>
         <span id='jttrigger-1' href='#'>hint!</span>    
         <div id="jttip-1" class="jttip" style="display:none;">
        <div class="jttipcontent"><p>Domain status can either be New ,Modify or Delete</p></div>
        </div>
      	</p>
        
        <p hidden>
             <label for="zispahandle">Hosting Company</label>        
        

			 <select class="selectbox" name ="hosting_company_id" id="hostingcompany" >
		   <?php
			   include('dbconnector.php');
			   $strQuery = "select hosting_company_id,company_name
						   from hosting_company WHERE hosting_company_id=1";
			
			   $rsrcResult = mysqli_query($link,$strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($rsrcResult)) {
				  $strA = $arrayRow["hosting_company_id"];
				  $strB = $arrayRow["company_name"];
				  echo "<option value=\"$strA\">$strB</option>\n";
			  }				  
					  
		     ?>	             
             </select>		      
        </p>
        
         
        <p>
    	<label for="customerdomainowner">Domain Owner:</label>
        <input type="text" name="domainOwner"  id="validcustomerdomainowner">
         <span id='jttrigger-2' href='#'>hint!</span>    
         <div id="jttip-2" class="jttip" style="display:none;">
        <div class="jttipcontent"><p>e.g Africom or Martin Chamambo e.t.c</p></div>
        </div>

   	   </p>
       
        <p>
    	<label for="domain_owner_org_desc">Description of domain owner's organisation:</label>
        <textarea name="domain_owner_org_desc"  id="validdomain_owner_org_desc"></textarea> 
        <span id='jttrigger-3' href='#'>hint!</span>    
        <div id="jttip-3" class="jttip" style="display:none;">
            <div class="jttipcontent"><p>Telecoms or Bank or Finance Institution e.t.c</p></div>
        </div>
        </p>
        
        


    
        <p>
        <label for="city">Domain Owner Town/City:</label>
        <select name="city" class="selectbox" id= "city" size="1">
        <option value="0" selected>Select Below </option>
        <option value="Harare">Harare</option>
  		<option value="Gweru">Gweru</option>
  		<option value="Bulawayo">Bulawayo</option>
		</select>
   	   </p>
       
        <p hidden>
    	<label for="Country">Domain Owner Country:</label>
        <select class="selectbox" name ="country_id">
			  <?php
		
			   $country_strQuery = "select name,country_id
						            from country";
			
			   $country_rsrcResult = mysqli_query($link,$country_strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($country_rsrcResult)) {
				  $country_strA = $arrayRow["country_id"];
				  $country_strB = $arrayRow["name"];
				  echo "<option value=\"$country_strA\" selected >$country_strB</option>\n";
			  }					  
		     ?>	             
             </select>		      
        
        	
   	   </p>

    
       <p>
        <label for="domainusage">Proposed Domain Usage:</label>
        <input type="text" name="domain_usage"  id="validdomain_usage"/>
                <span id='jttrigger-4' href='#'>hint!</span>    
         <div id="jttip-4" class="jttip" style="display:none;">
        <div class="jttipcontent"><p>e.g Webhosting ,Email hosting e.t.c</p></div>
        </div>

      	</p>
    	
       <p>
    	<label for="customerorgname">Domain Owner Organisation Name:</label>
        <input type="text" name="domain_owner_org_name"  id="vlaiddomain_owner_org_name"/>
         <span id='jttrigger-5' href='#'>hint!</span>    
         <div id="jttip-5" class="jttip" style="display:none;">
        <div class="jttipcontent"><p>e.g Africom , Museyamwa & Assoc e.t.c</p></div>
        </div>

        </p>
        
       

    
    	<p>
    	<label for="customerphysicaladdr">Domain Owner Physical Address:</label>
        <textarea name="physical_address_detail"  id="validcustomerphysicaladdr"></textarea>        
    	</p>
        
        <p>
    	<label for="customerpostaladdr">Domain Owner Postal Address</label>
        <textarea name="postal_address_detail"  id="validcustomerpostaladdr"></textarea>
    	</p>
        
        
        <p>
    	<label for="customerworkphone">Domain Owner Work Phone:</label>
        <input type="tel" name="contact_detail_1" id="validworkphone">
   		</p>
        <p>
    	<label for="customerfax">Domain Owner Fax Number:</label>
        <input type="tel" name="contact_detail_2"  id="validfax">
  		</p>
        
          <p>
    	<label for="customermobilephone">Domain Owner Mobile Phone:</label>
        <input type="tel" name="contact_detail_3" id="validmobilephone">
  		</p>
        
        
        <p>
    	<label for="customeremail">Domain Owner Email Address:</label>
        <input type="text" name="contact_detail_4" id="customeremail" >
   		</p>
        
        <table border="0" hidden="0">
		<tr>
        <td><label for="primarynameserver">Primary Nameserver:</label> </td>
          <td><label for="hostname">Host Name:</label> <input type="text" name="host_name1"  value="ns1.ai.co.zw"/></td>
           <td><label for="ip address">IP Address:</label> <input type="text" name="ip_address_1"  value="41.221.144.2"/ ></td>
           </tr>
        
        
        <tr>
       <td><label for="secondarynameserver">Secondary Nameserver:</label> </td>
       <td><label for="hostname">Host Name:</label> <input type="text" name="sec_hostname_2"  value="ns2.ai.co.zw"/></td>
       <td><label for="ip address">IP Address:</label> <input type="text" name="sec_ip_address_2" id="ipaddress" value="41.221.144.3"/ ></td>
</tr>


       <tr>
        <td><label for="secondarynameserver">Secondary Nameserver:</label></td> 
       <td><label for="hostname">Host Name:</label> <input type="text" name="sec_hostname_3"  value="ns3.ai.co.zw"/></td>
       <td><label for="ip address">IP Address:</label> <input type="text" name="sec_ip_address_3"  value="41.73.47.133"/ ></td>
      </tr>
<tr>

      <td> <label for="secondarynameserver">Secondary Nameserver:</label> </td>
      <td><label for="hostname">Host Name:</label> <input type="text" name="sec_hostname_4" id="hostname" value="ns4.ai.co.zw"/></td>
       <td><label for="ip address">IP Address:</label> <input type="text" name="sec_ip_address_4"  value="41.221.159.50"/ ></td>
       
 
  </tr>
       </table>
     <p >       
    <label for="submitbutton">Submit Your Form:</label> 
    <input type="submit" value="Submit" name="register" id="register" class="submit_b">
   </p>
    
</fieldset>
</form>

<div class='footer'>Courtesy of the Service Management Center (SMC) Africom @2015 <a href='http://www.afri-com.net'>www.afri-com.net</a></div>

</body>
</html>                                		