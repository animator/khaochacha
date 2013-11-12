
<?php
session_start();
include('settings.php');
$cn=mysqli_connect(localhost,$DBUSER,$DBPASS,$DBNAME) ;

if(!isset($_GET['username'])) $username = $_SESSION['username'];						
else $username = mysqli_real_escape_string($cn,$_GET['username']);

if(!isset($username)){
	echo"No username selected....Redirecting to homepage";
	echo'<meta HTTP-EQUIV="REFRESH" content="3; url=index.php">';
	exit(0);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>Online Judge </title>

<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />

<meta name="description" content="Site Description Here" />
<meta name="keywords" content="keywords, here" />
<meta name="robots" content="index, follow, noarchive" />
<meta name="googlebot" content="noarchive" />

<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

</head>

<body>

<!-- wrap starts here -->
<div id="wrap">			
<?php include('header.php');
$cn=mysql_connect(localhost,$DBUSER,$DBPASS) or die(mysql_error());
mysql_select_db($DBNAME,$cn);
if(isset($_GET['username'])){
	$query = "select * from users where username='$username'";
	$logged = mysql_query($query);
	$logg = mysql_fetch_array($logged);
	//$lastname=$logg['lastname'];
	//$firstname=$logg['firstname'];
	//$college=$logg['college'];
	$newuserid=$logg['userID'];
	$name=$logg['name'];
	$address=$logg['address'];
	$contact=$logg['contact'];
}
else{
	$name=$_SESSION['name'];
	$address=$_SESSION['address'];
	$contact=$_SESSION['contact'];
	$newuserid=$_SESSION['userid'];
	
}
?>


<div id="content-outer" class="clear">
<div id="left">
<div id="featured" class="clear">
<div class="image-block" ><!--<img src='images/2.jpg' ></img>--></div>
<?php 
echo "<div class='text-block' ><p><strong>Name : </strong>".$name."</p><p>Address : ".$address."</p><p>".$contact."</p>";
echo "<p><a href=''>Edit Profile</a></p>";
?>
<!-- graph comes here -->
</div>						
</div>
</div>
<?php include("sidebar.php"); ?>
</div>
</div>

</body>
<?php include("footer.php"); ?>	
</html>
