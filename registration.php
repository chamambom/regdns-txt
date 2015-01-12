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
        
        <?php
	 function myDropdown($hosting_company_id, $strNameField, $strTableName, $strNameOrdinal, $strMaskName, $strOrderField, $strMethod="asc") {
			include('dbconnector.php');
			
			   //
			   // PHP DYNAMIC DROP-DOWN BOX - HTML SELECT
			   //
			   // 2012-10 - 2006-05 http://kimbriggs.com/computers/
			   //
			   // Function creates a drop-down box
			   // by dynamically querying ID-Name pair from a lookup table.
			   //
			   // Parameters:
			   // intIdField = Integer "ID" field of table, usually the primary key.
			   // strMaskName = What shows up first in the drop-down box.
			   // strMethod = Sort as asc=ascending (default) or desc for descending.
			   // strNameField = Name field that user picks as a value.
			   // strNameOrdinal = $_POST name handles multiple drop-downs on one page.
			   // strOrderField = Which field you want results sorted by.
			   // strTableName = Name of MySQL table containing intIDField and strNameField.
			   //
			   // Returns:
			   // HTML Drop-Down Box Mark-up Code
			   //
			   
			
			   echo "<select class=\"selectbox\" name=\"$strNameOrdinal\">\n";
			   echo "<option value=\"NULL\">".$strMaskName."</option>\n";
			
			   $strQuery = "select $hosting_company_id, $strNameField
						   from $strTableName
						   order by $strOrderField $strMethod";
			
			   $rsrcResult = mysqli_query($link,$strQuery);
			
			
			   while($arrayRow = mysqli_fetch_assoc($rsrcResult)) {
				  $strA = $arrayRow["$hosting_company_id"];
				  $strB = $arrayRow["$strNameField"];
				  echo "<option value=\"$strA\">$strB</option>\n";
			   }
			
				echo "</select>";
			  } 
			
			$hosting_company_id = 'hosting_company_id';
			$strNameField = 'company_name';
			$strTableName = 'hosting_company';
			$strNameOrdinal = 'state_id_mg';
			$strMaskName = 'Zispa Handle';
			$strOrderField = 'hosting_company_id';
			myDropdown($hosting_company_id, $strNameField, $strTableName, $strNameOrdinal, $strMaskName, $strOrderField, $strMethod="asc");
			?>
        
        
        </p>
        
         
        <p>
    	<label for="customerdomainowner">Domain Owner:</label>
        <input type="text" name="domainOwner" id="customerdomainowner">
   	   </p>
       
        <p>
    	<label for="customerorganisationdisc">Description of domain owner's organisation:</label>
        <textarea name="customerorganisationdisc" id="customerorganisationdisc"></textarea>
        </p>
        
         <p>
        <label for="city">Domain Owner Town/City:</label>
        <select name="town" class="selectbox" size="1">
        <option value="" selected>Select Below </option>
        <option value="Harare">Harare</option>
  		<option value="Gweru">Gweru</option>
  		<option value="Bulawayo">Bulawayo</option>
		</select>
   	   </p>
       
        <p>
    	<label for="Country">Domain Owner Country:</label>
        <input type="text" name="country" id="country">  	
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
        <input type="text" name="domain_usage" id="domainusage">
      	</p>
    	
       <p>
    	<label for="customerorgname">Domain Owner Organisation Name:</label>
        <input type="text" name="domain_owner_org" id="customerorgname">
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
    	<label for="customerphysicaladdr">Domain Owner Physical Address:</label>
        <input type="text" name="customerphysicaladdr" id="customerphysicaladdr">
    	</p>
        
        <p>
    	<label for="customerpostaladdr">Domain Owner Postal Address:</label>
        <input type="text" name="customerpostaladdr" id="customerpostaladdr">
    	</p>
        
        
        <p>
    	<label for="customertel">Domain Owner Telephone:</label>
        <input type="tel" name="customertel" id="customertel">
   		</p>
        <p>
    	<label for="customerfax">Domain Owner Fax Number:</label>
        <input type="tel" name="customerfax" id="customerfax">
  		</p>
        <p>
    	<label for="customeremail">Domain Owner Email Address:</label>
        <input type="email" name="customeremail" id="customeremail">
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