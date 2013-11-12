
<?php
session_start();
include('settings.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Online Judge</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/whenReady.js"></script>
<script src="js/inputFilter.js">   
</script>
<script type="text/javascript">
<!--
$(document).ready(function(){
		$('.clear').click(function(){
			$('#error').hide();
			$('#error').css('text-color','rgb(255,100,100)');

			});

		$('.button1').click(function(){
			var username = $("input[name='rusername']").attr('value');
			var password = $("input[name='password']").attr('value');
			var cpassword = $("input[name='cpassword']").attr('value');
			var name = $("input[name='name']").attr('value');
			var address = $("input[name='address']").attr('value');
			var contact = $("input[name='contact']").attr('value');
			//var contact2 = $("input[name='contact2']").attr('value');
			//var contact3 = $("input[name='contact3']").attr('value');
			var email = $("input[name='email']").attr('value');
			//var email2 = $("input[name='email2']").attr('value');
			//var email3 = $("input[name='email3']").attr('value');			
			$('#error').hide();
			$('#error').css('text-color','rgb(255,100,100)');
			if(username.length==0){
			$('#error').text('Username field cannot be left blank');
			$('#error').attr('class','error');
			$('#error').css('visibility','visible');
			$('#error').fadeIn('slow');
			return false;
			};
			if(password.length<6){
			$('#error').text('Password should be atleast 6 characters');
			$('#error').attr('class','error');
			$('#error').css('visibility','visible');
			$('#error').fadeIn('slow');
			return false;
			};
			if(password!=cpassword){
				$('#error').text('Passwords do not match');
				$('#error').attr('class','error');
				$('#error').css('visibility','visible');
				$('#error').fadeIn('slow');
				return false;
			};
			if(email.length==0){
				$('#error').text('Email field cannot be left blank');
				$('#error').attr('class','error');
				$('#error').css('visibility','visible');
				$('#error').fadeIn('slow');
				return false;
			};
			if((email.search(".")==-1) || (email1.search('@')==-1)){
				$('#error').text('Invalid Email address');
				$('#error').attr('class','error');
				$('#error').fadeIn('slow');
				$('#error').css('visibility','visible');
				return false;
			};
			if(contact.length==0){
                                $('#error').text('Contact field cannot be left blank');
                                $('#error').attr('class','error');
                                $('#error').css('visibility','visible');
                                $('#error').fadeIn('slow');
                                return false;
                        };
                        if(name.length==0){
                                $('#error').text('First Member Name field cannot be left blank');
                                $('#error').attr('class','error');
                                $('#error').css('visibility','visible');
                                $('#error').fadeIn('slow');
                                return false;
                        };
			/*if(email2.length==0){
				$('#error').text('Email field cannot be left blank');
				$('#error').attr('class','error');
				$('#error').css('visibility','visible');
				$('#error').fadeIn('slow');
				return false;
			};
			if((email2.search(".")==-1) || (email2.search('@')==-1)){
				$('#error').text('Invalid Email address');
				$('#error').attr('class','error');
				$('#error').fadeIn('slow');
				$('#error').css('visibility','visible');
				return false;
			};
			if(email3.length==0){
				$('#error').text('Email field cannot be left blank');
				$('#error').attr('class','error');
				$('#error').css('visibility','visible');
				$('#error').fadeIn('slow');
				return false;
			};
			if((email3.search(".")==-1) || (email3.search('@')==-1)){
				$('#error').text('Invalid Email address');
				$('#error').attr('class','error');
				$('#error').fadeIn('slow');
				$('#error').css('visibility','visible');
				return false;
			};*/
			return true;
		});

});

-->
</script>

</head>

<body class="register">
<!-- wrap starts here -->
<div id="wrap">			
<?php include('header.php'); ?>

<div id="content-outer" class="clear">

<div id="left">						
<div class="entry">
<h3>Register</h3>
<?php
if(isset($_POST['rusername'])){

	$cn = mysql_connect('localhost', $DBUSER, $DBPASS);
	mysql_select_db($DBNAME, $cn);
	

	$username = $_POST['rusername'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	//$contact2 = $_POST['contact2'];
	//$contact3 = $_POST['contact3'];
	$email = $_POST['email'];
	//$email2 = $_POST['email2'];
	//$email3 = $_POST['email3'];

	$username = htmlentities($username);
	$password = htmlentities($password);
	$name = htmlentities($name);
	$address = htmlentities($address);
	$contact = htmlentities($contact);
	//$contact2 = htmlentities($contact2);
	//$contact3 = htmlentities($contact3);
	
	$email = htmlentities($email);
	//$email2 = htmlentities($email2);
	//$email3 = htmlentities($email3);
	if(strlen($username) > 1){
		//$query = "INSERT INTO users(userID,username,password,member1,member2,member3,contact1,contact2,	contact3,email1,email2,email3,country)  VALUES (NULL, '$username', '$password', '$member1', '$member2', '$member3', '$contact1', '$contact2', '$contact3', '$email1', '$email2', '$email3', '$country')";

		$query = "INSERT INTO users(userID,username,password,name,address,contact,email)  VALUES ('1',$username', '$password', '$name', '$address', '$contact', '$email')";
		//print '<div id="error" class="error" style="display: one"> creating account</div>';
	}
	if(!mysql_query($query)){
		if(mysql_errno() == 1062)
		{
			print '<div id="error" class="error" style="display: one">Username already taken</div>';
			$printedError = true;
		}
		else
		{
			print '<div id="error" class="error" style="display: one">Error creating account</div>';
			echo $query;
			$printedError = true;
		}
	}
	else
	{
		print '<div id="error" class="success" style="display: one">Account created</div>';
		$printedError = true;
	}
	mysql_close($cn);
}
else{

}

echo <<<EOHTML
<form  method="post" action="register.php" style="background: #FFFFFF; border:None;">
<div id="cform">
<div class="error" id ="error" style="visibility:hidden;"></div>
<table width= 100%>

<tr class="altrow">
<td><label for="txtName">Login ID* </label></td>
<td><input id="txtName" name="rusername" size="40%" type="text" data-allowed-chars=
"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
data-messageid="input-error1"/></td>
<span id="input-error1" fadeIn="slow" style="color:red;visibility:hidden">Alphanumeric
characters only</span>
</tr>

<tr class="altrow">
<td><label for="txtName">Name*</label></td>
<td><input id="txtName" name="name" size=40% type="text" data-allowed-chars=
" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
data-messageid="input-error1"/></td>
</tr>

<tr class="altrow">
<td><label for="txtName">Contact No.*</label></td>
<td><input id="txtName" name="contact" size=40% type="text" data-allowed-chars=
"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
data-messageid="input-error1"/></td>
</tr>

<tr class="altrow">
<td><label for="txtName">Email Id*</label></td>
<td><input id="txtName" name="email" size=40% type="text" data-allowed-chars=
"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@."
data-messageid="input-error1"/></td>
</tr>

<tr class="altrow">
<td><label for="txtName">Address*</label></td>
<td><input id="txtName" name="address" size=40% type="text" data-allowed-chars=
" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
data-messageid="input-error1"/></td>
</tr>

<tr class="altrow">
<td><label for="txtName">Password*</label></td>
<td><input id="txtName" name="password" type="password" size="40%" data-allowed-chars=
"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
data-messageid="input-error1"/></td>
</tr>
<tr class="altrow">
<td><label for="txtName">Confirm Password*</label></td>
<td><input id="txtName" name="cpassword" type="password" size="40%" data-allowed-chars=
"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
data-messageid="input-error1"/></td>
</tr>

EOHTML;
?>
</table>
<div style="text-align : center;">
<input class="button1" name="submit" type="submit" value="Submit" size="26%" style=" font-size:14px;" />
</div>
</div>
</form>

</div>
</div>
<?php include("sidebar.php"); ?>



</div>
</div>
<?php include("footer.php"); ?>	
</body>
