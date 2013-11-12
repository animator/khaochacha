<?php 
session_start();
include('settings.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title>Khao Chacha</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="techkriti, IIT, Kanpur, IITK,  software,ihpc, highperformance, supercomputer,supercomputing, cdac, india" />
<meta name="description" content="IHPC - International High Performance Computing Contest." />

        <meta name="author" content="Techkriti, Vijay Keswani, Ankit Mahato">
        <meta http-equiv="cache-control" content="public">
        <meta property="og:title" content="IHPC" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://ihpc.cdac.in" />
<meta property="og:image" content="http://ihpc.cdac.in/images/logo.png"/>
<meta property="og:image" content="http://ihpc.cdac.in/images/techkriti_logo.png" />

<meta property="og:site_name" content="IHPC" />
        <link rel="shortcut icon" href="favicon.ico" />


<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
<script type="text/javascript" src="js/jquery.js"></script>
</head>

<body class="index">

<!-- wrap starts here -->
<div id="wrap">
<?php 
	include('header.php'); 
	$cn = mysql_connect('localhost', $DBUSER, $DBPASS);
	mysql_select_db($DBNAME, $cn);
?>

<!-- featured starts -->	
<!-- content -->
<div id="content-outer" class="clear"><div id="content-wrap">
<div id="content">
<div id="left">
<h3>Special Deals</h3>
<div align="center"><img src="images/deals.png" width="550"></div>

</div>
<?php include("sidebar.php"); ?>
<!-- footer starts here -->	

<!-- wrap ends here -->
</div>
</div>
</body>
<?php include("footer.php"); ?>
</html>
