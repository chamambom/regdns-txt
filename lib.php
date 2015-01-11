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
   
   ?>
   
   <div class="dropdowns">
   
   <?php

   echo "<select name=\"$strNameOrdinal\">\n";
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
	?>
    
	</div>  
    
	<?php
  } 

$hosting_company_id = 'hosting_company_id';
$strNameField = 'company_name';
$strTableName = 'hosting_company';
$strNameOrdinal = 'state_id_mg';
$strMaskName = 'Zispa Handle';
$strOrderField = 'hosting_company_id';
myDropdown($hosting_company_id, $strNameField, $strTableName, $strNameOrdinal, $strMaskName, $strOrderField, $strMethod="asc");
?>