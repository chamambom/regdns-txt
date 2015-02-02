<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{	// Form was submitted, do some checks and if it passes send the email
	$errors = 0;		// Keep track of the number of validation errors
	$errorLog = "";		// Get some details on what didn't validate
	$message = "";		// Starter email message
	$request = array();
	$required = array("First_Name", "Middle_Initial", "Last_Name" );
	$successLog = "";		// Get some details on what went through
	
	// Sanitize the inputs
	foreach ( $_POST as $formName => $formValue )
	{	if ( is_array($formValue) )
		{	foreach ( $formValue as $formName2 => $formValue2 )	{	$request[$formName][$formName2] = htmlspecialchars(strip_tags($formValue2));	}	}
		else
		{	$request[$formName] = htmlspecialchars(strip_tags($formValue));	}
	}

	// Validate required form fields
	foreach ( $request as $name => $value )
	{	$displayName = str_replace("_", " ", $name);
		// Is this a required value, if so and it's empty track the errors
		if ( !is_array($value) )
		{	if ( in_array( $name, $required ) && strlen($value) < 1 )
			{	$errors++;
				$errorLog .= "The field <strong>".$displayName."</strong> is required.<br />";
			}
		}
		if ( $name == "Email" && !filter_var($value, FILTER_VALIDATE_EMAIL) )
		{	$errors++;
			$errorLog .= "The field <strong>".$displayName."</strong> must be a valid email address.<br />";
		}
	}
	
	if ( $errors == 0 )
	{	// Validation passed, get the email ready to send
		$toEmail = "chamambom@afri-com.net";
		$subject = "Form Submission from ".$request["First_Name"]." ".$request["Last_Name"];
		
		unset ( $request["submit"] );
		
		$message .= "Following is an application submitted<br /><br />\n\n<table>";
		foreach ( $request as $name => $value )
		{	$displayName = str_replace("_", " ", $name);
			if ( is_array($value) ) {	$value = implode(", ", $value);	}
			$message .= "\n<tr><th align='right' valign='top'><strong>".$displayName."</strong>:</th><td valign='top'>".$value."</td></tr>";
		}
		$message .= "</table><br /><br />\n\nSubmitted on ".date("F j, Y, g:i a");
		
		//Normal headers
		$num = md5(time());
		$headers  = "From: Mailer <noreply@sample.com>
";
		$headers .= "Reply-to: ".$request["First_Name"]." ".$request["Last_Name"]." <".$request["Email"].">
";
		$headers .= "MIME-Version: 1.0
";
		$headers .= "Content-Type: multipart/alternative; boundary=".$num."
";
		// These two steps to help avoid spam   
		$headers .= "Message-ID: <".gettimeofday()." TheSystem@".$_SERVER['SERVER_NAME'].">
";
		$headers .= "X-Mailer: PHP v".phpversion()."
";
		// Text version
		$headers .= "\n--".$num."\n";
		$headers .= "Content-Type: text/plain; charset=iso-8859-1
";
		$headers .= "Content-Transfer-Encoding: 8bit
";
		$headers .= "".strip_tags($message)."\n";
		// HTML message
		$headers .= "\n--".$num."\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1
";
		$headers .= "".$message."\n";

		if ( strlen($_FILES['File']['name']) > 0 )
		{	// If a file was uploaded, do some processing
			$filename = preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['File']['name']);
			$filetype = $_FILES["File"]["type"];
			$filesize = $_FILES["File"]["size"];
			$filetemp = $_FILES["File"]["tmp_name"]; 
			$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
		
			if ( !preg_match('/\.(doc|docx|odt|pdf|rtf|txt)/i', $ext) )
			{	$errors++;
				$errorLog .= "Upload filetype not supported.";
			}
			else if ( $filesize > 2000000 )
			{	$errors++;
				$errorLog .= "File size too high, up to 2MB is allowed.";
			}
			else
			{	// Looks like the file is good, send it with the email
				$fp = fopen($filetemp, "rb");
				$file = fread($fp, $filesize);
				$file = chunk_split(base64_encode($file));
				
				// Attachment headers
				$headers .= "\n--".$num."\n";
				$headers .= "Content-Type:".$filetype." ";
				$headers .= "name=\"".$filename."\"r\n";
				$headers .= "Content-Disposition: attachment; ";
				$headers .= "filename=\"".$filename."\"
\n";
				$headers .= "".$file."
";
				
			}
		}
		if ( $errors == 0 )
		{	if ( mail( $toEmail, $subject, "", $headers ))
			{	$successLog .= "<b>Thank you for your interest<br />Your form has been submitted.</b>";	}
			else
			{	$errorLog .= "Message failed to send, please refresh to try again";	}
			// Send email
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" name="frmApplication" id="frmApplication">
		<fieldset><legend>Personal Information</legend>
		<table cellpadding="0" cellspacing="6" border="0" class="appFormTable">
			<tr>
				<td valign="top" colspan="3">
					<label for="First_Name" class="required">First Name*</label>
					<input type="text" name="First_Name" id="First_Name" maxlength="40" value="<?php echo @$request['First_Name']; ?>" />
				</td>
				<td valign="top" colspan="2">
					<label for="Middle_Initial" class="required">Middle Initial*</label>
					<input type="text" name="Middle_Initial" id="Middle_Initial" maxlength="1" value="<?php echo @$request['Middle_Initial']; ?>" />
				</td>
				<td valign="top" colspan="3">
					<label for="Last_Name" class="required">Last Name*</label>
					<input type="text" name="Last_Name" id="Last_Name" maxlength="40" value="<?php echo @$request['Last_Name']; ?>" />
				</td>
			</tr>
			<tr>
				<td valign="top" colspan="8">
					<label for="Address" class="required">Address*</label>
					<input type="text" name="Address" id="Address" maxlength="100" value="<?php echo @$request['Address']; ?>" />
				</td>
			</tr>
			<tr>
				<td valign="top" colspan="3">
					<label for="City" class="required">City*</label>
					<input type="text" name="City" id="City" maxlength="50" value="<?php echo @$request['City']; ?>" />
				</td>
				<td valign="top" colspan="3">
					<label for="State" class="required">State*</label>
					<select name="State" id="State">
						<option value="" <?php if ( @$request['State'] == "") { echo "selected='selected'"; } ?>>- Select a State -</option> 
						<option value="AL" <?php if ( @$request['State'] == "AL") { echo "selected='selected'"; } ?>>Alabama</option> 
						<option value="AK" <?php if ( @$request['State'] == "AK") { echo "selected='selected'"; } ?>>Alaska</option> 
						<option value="AZ" <?php if ( @$request['State'] == "AZ") { echo "selected='selected'"; } ?>>Arizona</option> 
						<option value="AR" <?php if ( @$request['State'] == "AR") { echo "selected='selected'"; } ?>>Arkansas</option> 
						<option value="CA" <?php if ( @$request['State'] == "CA") { echo "selected='selected'"; } ?>>California</option> 
						<option value="CO" <?php if ( @$request['State'] == "CO") { echo "selected='selected'"; } ?>>Colorado</option> 
						<option value="CT" <?php if ( @$request['State'] == "CT") { echo "selected='selected'"; } ?>>Connecticut</option> 
						<option value="DE" <?php if ( @$request['State'] == "DE") { echo "selected='selected'"; } ?>>Delaware</option> 
						<option value="DC" <?php if ( @$request['State'] == "DC") { echo "selected='selected'"; } ?>>District Of Columbia</option> 
						<option value="FL" <?php if ( @$request['State'] == "FL") { echo "selected='selected'"; } ?>>Florida</option> 
						<option value="GA" <?php if ( @$request['State'] == "GA") { echo "selected='selected'"; } ?>>Georgia</option>
						 
						<option value="HI" <?php if ( @$request['State'] == "HI") { echo "selected='selected'"; } ?>>Hawaii</option> 
						<option value="ID" <?php if ( @$request['State'] == "ID") { echo "selected='selected'"; } ?>>Idaho</option> 
						<option value="IL" <?php if ( @$request['State'] == "IL") { echo "selected='selected'"; } ?>>Illinois</option> 
						<option value="IN" <?php if ( @$request['State'] == "IN") { echo "selected='selected'"; } ?>>Indiana</option> 
						<option value="IA" <?php if ( @$request['State'] == "IA") { echo "selected='selected'"; } ?>>Iowa</option> 
						<option value="KS" <?php if ( @$request['State'] == "KS") { echo "selected='selected'"; } ?>>Kansas</option> 
						<option value="KY" <?php if ( @$request['State'] == "KY") { echo "selected='selected'"; } ?>>Kentucky</option> 
						<option value="LA" <?php if ( @$request['State'] == "LA") { echo "selected='selected'"; } ?>>Louisiana</option> 
						<option value="ME" <?php if ( @$request['State'] == "ME") { echo "selected='selected'"; } ?>>Maine</option> 
						<option value="MD" <?php if ( @$request['State'] == "MD") { echo "selected='selected'"; } ?>>Maryland</option>
						 
						<option value="MA" <?php if ( @$request['State'] == "MA") { echo "selected='selected'"; } ?>>Massachusetts</option> 
						<option value="MI" <?php if ( @$request['State'] == "MI") { echo "selected='selected'"; } ?>>Michigan</option> 
						<option value="MN" <?php if ( @$request['State'] == "MN") { echo "selected='selected'"; } ?>>Minnesota</option> 
						<option value="MS" <?php if ( @$request['State'] == "MS") { echo "selected='selected'"; } ?>>Mississippi</option> 
						<option value="MO" <?php if ( @$request['State'] == "MO") { echo "selected='selected'"; } ?>>Missouri</option> 
						<option value="MT" <?php if ( @$request['State'] == "MT") { echo "selected='selected'"; } ?>>Montana</option> 
						<option value="NE" <?php if ( @$request['State'] == "NE") { echo "selected='selected'"; } ?>>Nebraska</option> 
						<option value="NV" <?php if ( @$request['State'] == "NV") { echo "selected='selected'"; } ?>>Nevada</option> 
						<option value="NH" <?php if ( @$request['State'] == "NH") { echo "selected='selected'"; } ?>>New Hampshire</option> 
						<option value="NJ" <?php if ( @$request['State'] == "NJ") { echo "selected='selected'"; } ?>>New Jersey</option> 
						
						<option value="NM" <?php if ( @$request['State'] == "NM") { echo "selected='selected'"; } ?>>New Mexico</option> 
						<option value="NY" <?php if ( @$request['State'] == "NY") { echo "selected='selected'"; } ?>>New York</option> 
						<option value="NC" <?php if ( @$request['State'] == "NC") { echo "selected='selected'"; } ?>>North Carolina</option> 
						<option value="ND" <?php if ( @$request['State'] == "ND") { echo "selected='selected'"; } ?>>North Dakota</option> 
						<option value="OH" <?php if ( @$request['State'] == "OH") { echo "selected='selected'"; } ?>>Ohio</option> 
						<option value="OK" <?php if ( @$request['State'] == "OK") { echo "selected='selected'"; } ?>>Oklahoma</option> 
						<option value="OR" <?php if ( @$request['State'] == "OR") { echo "selected='selected'"; } ?>>Oregon</option> 
						<option value="PA" <?php if ( @$request['State'] == "PA") { echo "selected='selected'"; } ?>>Pennsylvania</option> 
						<option value="RI" <?php if ( @$request['State'] == "RI") { echo "selected='selected'"; } ?>>Rhode Island</option> 
						<option value="SC" <?php if ( @$request['State'] == "SC") { echo "selected='selected'"; } ?>>South Carolina</option> 
						
						<option value="SD" <?php if ( @$request['State'] == "SD") { echo "selected='selected'"; } ?>>South Dakota</option> 
						<option value="TN" <?php if ( @$request['State'] == "TN") { echo "selected='selected'"; } ?>>Tennessee</option> 
						<option value="TX" <?php if ( @$request['State'] == "TX") { echo "selected='selected'"; } ?>>Texas</option> 
						<option value="UT" <?php if ( @$request['State'] == "UT") { echo "selected='selected'"; } ?>>Utah</option> 
						<option value="VT" <?php if ( @$request['State'] == "VT") { echo "selected='selected'"; } ?>>Vermont</option> 
						<option value="VA" <?php if ( @$request['State'] == "VA") { echo "selected='selected'"; } ?>>Virginia</option> 
						<option value="WA" <?php if ( @$request['State'] == "WA") { echo "selected='selected'"; } ?>>Washington</option> 
						<option value="WV" <?php if ( @$request['State'] == "WV") { echo "selected='selected'"; } ?>>West Virginia</option> 
						<option value="WI" <?php if ( @$request['State'] == "WI") { echo "selected='selected'"; } ?>>Wisconsin</option> 
						<option value="WY" <?php if ( @$request['State'] == "WY") { echo "selected='selected'"; } ?>>Wyoming</option>
						</select>
				</td>
				<td valign="top" colspan="2">
					<label for="Zip" class="required">Zip*</label>
					<input type="text" name="Zip" id="Zip" maxlength="10" value="<?php echo @$request['Zip']; ?>" />
				</td>
			</tr>
			<tr>
				<td valign="top" colspan="4">
					<label for="Phone_1" class="required">Phone 1*</label>
					<input type="text" name="Phone_1" id="Phone_1" maxlength="20" value="<?php echo @$request['Phone_1']; ?>" />
				</td>
				<td valign="top" colspan="4">
					<label for="Phone_2">Phone 2</label>
					<input type="text" name="Phone_2" id="Phone_2" maxlength="20" value="<?php echo @$request['Phone_2']; ?>" />
				</td>
			</tr>
			<tr>
				<td valign="top" colspan="8">
					<label for="Email" class="required">Email Address*</label>
					<input type="text" name="Email" id="Email" maxlength="100" value="<?php echo @$request['Email']; ?>" />
				</td>
			</tr>
			<tr>
				<td valign="top" colspan="8">
					<div id="Resume_Format_Attach">
						<p><small>Supported file types are doc,docx,odt,pdf,rtf,txt</small></p>
						<input type="hidden" name="max_file_size" value="2000000" />
						<input type="file" name="Resume_File" id="Resume_File" />
					</div>
				</td>
			</tr>
		</table>
		</fieldset>
		<div align="center"><input type="submit" name="submit" value="Submit Form" /></div>
	</form>
</body>
</html>