<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" type="text/css" href="css/jquery.validate.css" />
       <script src="js/jquery-1.3.2.js" type="text/javascript">       </script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        
       <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){
				
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
                    message: " Please note that this field is a Required"
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
				
				
				jQuery('.regform').validated(function(){
					
					
					});
				
	  
				
            });
            /* ]]> */
        </script>




<!--Pages function-->
	    <script type=text/javascript>
		function collapseElement(obj)
		{
			var el = document.getElementById(obj);
			el.style.display = 'none';
		}
		function expandElement(obj)
		{
			var el = document.getElementById(obj);
			el.style.display = '';
		}
		function collapsePages()
		{
			var numFormPages = 3;
			for(i=2; i <= numFormPages; i++)
			{
				currPageId = ('page_' + i);
				collapseElement(currPageId);
			}
		}
		</script>


<meta charset="UTF-8">
<title>Add Records Form</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body onLoad="collapsePages()">

<form method="post" action="process.php" onSubmit="return" id="regform">

<fieldset>
<h4>Please Fill All The required Information in order to complete your domain registration !</h4>

<legend>Africom ZISPA Domain Registration Form</legend>

	<!--Page one-->
<ul id="page_1">
    <li>
    	<p>
    	<label for="customerdomainname">Full Customer Domain Name:</label>
        <input type="text" name="domain_name"  id="validcustomerdomainname"> e.g africom.co.zw
   		</p>
        
        <p>
        <label for="state">Domain Status:</label>
        <select name="domstatus" class="selectbox" id="domainstatus" size="1"> 
        <option value="0" selected>Select Below </option> 
        <option value="N">New</option>
  		<option value="D">Delete</option>
  		<option value="M">Modify</option>
		</select>
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
        <input type="text" name="domainOwner"  id="validcustomerdomainowner"> e.g africom Pvt Ltd
   	   </p>
       
        <p>
    	<label for="domain_owner_org_desc">Description of domain owner's organisation:</label>
        <textarea name="domain_owner_org_desc"  id="validdomain_owner_org_desc"></textarea> e.g Telecommunications
        </p>
        
        
    </li>
    <li>
<input onclick="collapseElement('page_1'); expandElement('page_2');" type="button" value="Continue" class="bclicks"/> <!--This hides the first page and shows the second page-->
    </li>
    
    <div class="meter"><span style="width:33%">1/3</span></div>
</ul>


<!--Page two-->
<ul id="page_2">
    <li>
    
             <p>
        <label for="city">Domain Owner Town/City:</label>
        <select name="city" class="selectbox" id= "city" size="1">
        <option value="0" selected>Select Below </option>
        <option value="Harare">Harare</option>
  		<option value="Gweru">Gweru</option>
  		<option value="Bulawayo">Bulawayo</option>
		</select>
   	   </p>
       
        <p>
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
      	</p>
    	
       <p>
    	<label for="customerorgname">Domain Owner Organisation Name:</label>
        <input type="text" name="domain_owner_org_name"  id="vlaiddomain_owner_org_name"/>
        </p>
        
       
  </li>
    <li>
<input onclick="collapseElement('page_2'); expandElement('page_3');" type="button" value="Continue" class="bclicks" /> <!--This hides the first page and shows the second page-->    

<input onclick="collapseElement('page_2'); expandElement('page_1');" type="button" value="Back" class="bclicks" /> <!--This hides the second page and shows the first page-->

</li>

<div class="meter"><span style="width: 66%">2/3</span></div>
</ul>

    
 <!--Page three-->
<ul id="page_3">
    <li>
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
            
     </li>   	
   <li>
   <input onclick="collapseElement('page_3'); expandElement('page_2');" type="button" value="Back"  class="bclicks"/> <!--This hides the second page and shows the first page-->
    <input type="submit" value="Submit" name="register" id="register" class="bclicks">
    </li>
    
    <div class="meter"><span style="width: 99.5%">3/3</span></div>
</ul>
</fieldset>
</form>
</body>
</html>                                		