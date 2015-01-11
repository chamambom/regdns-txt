<?php
/**
 * feedbackScript.php
 * This file writes to .txt file the contents of an HTML form.
 */

// All the values of the HTML form are securely stored in the array $v:
$v = array_map('trim', filter_input_array(INPUT_POST));

// Format your text however you want before it's written to .txt file:
$text = ""
    . "Email:{$v["email"]}\t" 
    . "Comments:\n:{$v["feedback"]}\t\n";
	
// Following lines of code open, write, and close your connection
// to a text file:
$handle ="txtfile.txt";
$fp = fopen($handle, "w");
fwrite($fp, $text);
fclose($fp);

echo "data submitted";
?>