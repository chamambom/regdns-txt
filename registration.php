<!DOCTYPE html>
<html lang="en">
<head>



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
<link rel="stylesheet" type="text/css" href="pbar.css">
</head>
<body onLoad="collapsePages()">



<form method="post" action="process.php" onSubmit="return" class="regform">

<fieldset>
<legend>Africom ZISPA Domain Registration Form</legend>

	<!--Page one-->
<ul id="page_1">
    <li>
    	<p>
    	<label for="customerdomainname">Full Customer Domain Name:</label>
        <input type="text" name="domain_name" id="customerdomainname">
   		</p>
        
        <p>
        <label for="state">Domain Status:</label>
        <select name="state" class="selectbox" size="1">
        <option value="" selected>Select Below </option>
        <option value="N">New</option>
  		<option value="D">Delete</option>
  		<option value="M">Modify</option>
		</select>
      	</p>
        
        <p>
             <label for="zispahandle">Hosting Company</label>        
        

			 <select class="selectbox" name ="hosting_company_id">;
			 <option value="" selected>Select Below</option>;
			   
			   <?php
			   include('dbconnector.php');
			   $strQuery = "select hosting_company_id,company_name
						   from hosting_company";
			
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
        <input type="text" name="domainOwner" id="customerdomainowner">
   	   </p>
       
        <p>
    	<label for="domain_owner_org_desc">Description of domain owner's organisation:</label>
        <textarea name="domain_owner_org_desc" id="domain_owner_org_desc"></textarea>
        </p>
        
         <p>
        <label for="city">Domain Owner Town/City:</label>
        <select name="city" class="selectbox" size="1">
        <option value="" selected>Select Below </option>
        <option value="Harare">Harare</option>
  		<option value="Gweru">Gweru</option>
  		<option value="Bulawayo">Bulawayo</option>
		</select>
   	   </p>
       
        <p>
    	<label for="Country">Domain Owner Country:</label>
        <select class="selectbox" name ="country_id">;
        <option value="" selected>Select Below</option>;
			  <?php
		
			   $country_strQuery = "select name,country_id
						            from country";
			
			   $country_rsrcResult = mysqli_query($link,$country_strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($country_rsrcResult)) {
				  $country_strA = $arrayRow["country_id"];
				  $country_strB = $arrayRow["name"];
				  echo "<option value=\"$country_strA\">$country_strB</option>\n";
			  }				  
					  
		     ?>	             
             </select>		      
        
        	
   	   </p>
        
    </li>
    <li>
<input onclick="collapseElement('page_1'); expandElement('page_2');" type="button" value="Continue"/> <!--This hides the first page and shows the second page-->
    </li>
    
    <div class="meter"><span style="width: 33%">1/3</span></div>
</ul>


<!--Page two-->
<ul id="page_2">
    <li>
    
       <p>
        <label for="domainusage">Proposed Domain Usage:</label>
        <input type="text" name="domain_usage" id="domain_usage">
      	</p>
    	
       <p>
    	<label for="customerorgname">Domain Owner Organisation Name:</label>
        <input type="text" name="domain_owner_org_name" id="domain_owner_org_name">
        </p>
        
       
  </li>
    <li>
<input onclick="collapseElement('page_2'); expandElement('page_3');" type="button" value="Continue" /> <!--This hides the first page and shows the second page-->    

<input onclick="collapseElement('page_2'); expandElement('page_1');" type="button" value="Back" /> <!--This hides the second page and shows the first page-->

</li>

<div class="meter"><span style="width: 66%">2/3</span></div>
</ul>

    
 <!--Page three-->
<ul id="page_3">
    <li>
    	<p>
    	<label for="customerphysicaladdr">Domain Owner:</label>
            <select class="selectbox" name ="address_type_id1">
			  <?php
		
			   $address_strQuery = "select address_type_id,address_type
						            from address_type";
			
			   $address_rsrcResult = mysqli_query($link,$address_strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($address_rsrcResult)) {
				  $address_strA = $arrayRow["address_type_id"];
				  $address_strB = $arrayRow["address_type"];
				  echo "<option value=\"$address_strA\">$address_strB</option>\n";
			  }				  
					  
		     ?>	             
             </select>		   
        
        <textarea name="address_detail1" id="customerphysicaladdr"></textarea>
        
    	</p>
        
        <p>
    	<label for="customerpostaladdr">Domain Owner</label>
         <select class="selectbox" name ="address_type_id2">
			  <?php
		
			   $address_strQuery = "select address_type_id,address_type
						            from address_type";
			
			   $address_rsrcResult = mysqli_query($link,$address_strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($address_rsrcResult)) {
				  $address_strA = $arrayRow["address_type_id"];
				  $address_strB = $arrayRow["address_type"];
				  echo "<option value=\"$address_strA\">$address_strB</option>\n";
			  }				  
					  
		     ?>	             
             </select>		   
        
        <textarea name="address_detail2" id="customerpostaladdr"></textarea>
       
    	</p>
        
        
        <p>
    	<label for="customertel">Domain Owner Telephone:</label>
         <select class="selectbox" name ="contact_type_id_1">
			  <?php
		
			   $contact_strQuery = "select contact_type_id,contact_type
						            from contact_type";
			
			   $contact_rsrcResult = mysqli_query($link,$contact_strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($contact_rsrcResult)) {
				  $contact_strA = $arrayRow["contact_type_id"];
				  $contact_strB = $arrayRow["contact_type"];
				  echo "<option value=\"$contact_strA\">$contact_strB</option>\n";
			  }				  
					  
		     ?>	             
           </select>		   
        <input type="tel" name="contact_detail_1" id="customertel">
   		</p>
        <p>
    	<label for="customerfax">Domain Owner Fax Number:</label>
        <select class="selectbox" name ="contact_type_id_2">
			  <?php
		
			   $contact_strQuery = "select contact_type_id,contact_type
						            from contact_type";
			
			   $contact_rsrcResult = mysqli_query($link,$contact_strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($contact_rsrcResult)) {
				  $contact_strA = $arrayRow["contact_type_id"];
				  $contact_strB = $arrayRow["contact_type"];
				  echo "<option value=\"$contact_strA\">$contact_strB</option>\n";
			  }				  
					  
		     ?>	             
           </select>		   
        <input type="tel" name="contact_detail_2" id="customerfax">
  		</p>
        
          <p>
    	<label for="customerfax">Domain Owner Mobile number:</label>
        <select class="selectbox" name ="contact_type_id_3">
			  <?php
		
			   $contact_strQuery = "select contact_type_id,contact_type
						            from contact_type";
			
			   $contact_rsrcResult = mysqli_query($link,$contact_strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($contact_rsrcResult)) {
				  $contact_strA = $arrayRow["contact_type_id"];
				  $contact_strB = $arrayRow["contact_type"];
				  echo "<option value=\"$contact_strA\">$contact_strB</option>\n";
			  }				  
					  
		     ?>	             
           </select>		   
        <input type="tel" name="contact_detail_3" id="customermobile">
  		</p>
        
        
        <p>
    	<label for="customeremail">Domain Owner Email Address:</label>
        <select class="selectbox" name ="contact_type_id_4">
			  <?php
		
			   $contact_strQuery = "select contact_type_id,contact_type
						            from contact_type";
			
			   $contact_rsrcResult = mysqli_query($link,$contact_strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($contact_rsrcResult)) {
				  $contact_strA = $arrayRow["contact_type_id"];
				  $contact_strB = $arrayRow["contact_type"];
				  echo "<option value=\"$contact_strA\">$contact_strB</option>\n";
			  }				  
					  
		     ?>	             
           </select>		   
        <input type="email" name="contact_detail_4" id="customeremail">
   		</p>
       
            
     </li>   	
   <li>
   <input onclick="collapseElement('page_3'); expandElement('page_2');" type="button" value="Back" /> <!--This hides the second page and shows the first page-->
    <input type="submit" value="Submit" name="register" id="register">
    </li>
    
    <div class="meter"><span style="width: 98%">3/3</span></div>
</ul>
</fieldset>
</form>
</body>
</html>                                		