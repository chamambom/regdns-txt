<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Papermashup.com | jQuery PHP Username Checker</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script src="jquery-1.3.2.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
$('#validcustomerdomainname').blur(username_check);
});
	
function username_check(){	
var domain_name = $('#validcustomerdomainname').val();
if(domain_name == "" || domain_name.length < 4){
$('#validcustomerdomainname').css('border', '3px #CCC solid');
$('#tick').hide();
}else{

jQuery.ajax({
   type: "POST",
   url: "check.php",
   data: 'domain_name='+ domain_name,
   cache: false,
   success: function(response){
if(response == 1){
	$('#validcustomerdomainname').css('border', '3px #C33 solid');	
	$('#tick').hide();
	$('#cross').fadeIn();
	}else{
	$('#validcustomerdomainname').css('border', '3px #090 solid');
	$('#cross').hide();
	$('#tick').fadeIn();
	     }

}
});
}



}

</script>

<style>
#validcustomerdomainname{
	padding:3px;
	font-size:18px;
	border:3px #CCC solid;
}

#tick{display:none}
#cross{display:none}
	

</style>
</head>

<body>



Here are some usernames that have been put in the database:<br/><br />

Ashley, John, Mark, Paul, Rich, Luke, Simon, Adam<br/><br/>


      user:<input type="text" name="domain_name"  id="validcustomerdomainname">    
<img id="tick" src="tick.png" width="16" height="16"/>
<img id="cross" src="cross.png" width="16" height="16"/>




</body>
</html>