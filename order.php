
<?php
session_start();
include('settings.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Khao ChaCha</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/whenReady.js"></script>
<script src="js/inputFilter.js">   
</script>
</head>

<body class="order">
<!-- wrap starts here -->
<div id="wrap">			
<?php include('header.php'); ?>

<div id="content-outer" class="clear">

<div id="left">						
<div class="entry">
<h3>Confirm Order</h3>
<?php
	$cn = mysql_connect('localhost', $DBUSER, $DBPASS);
	mysql_select_db($DBNAME, $cn);
	echo'<table border="1" width="100%" >
		<tr>
		<th>Item</th>
		<th>Quantity</th>
		<th>Price</th>
		</tr>';   
	$s = 0;
	$li = explode(";", $_SESSION['list']);
	array_pop($li);
	$_SESSION['list'] = implode(";",$li);
   	//print_r($li);
	foreach($li as $value){
		$query = "SELECT * from menu where name='".$value."';";
		$logged = mysql_query($query);
		$i=0.0;
		while($r= mysql_fetch_array($logged))
		{
			echo "<tr ".($i%2==0?"class= 'altrow'":"").">
				<td>".$r['name']."</td>
				<td>1</td>
				<td>".$r['price']."</td>
				</tr>";
				$i+=1;
				$s = $s+$r['price'];
		}   
    }
    $del = 50.0;
    echo "<tr ".($i%2==0?"class= 'altrow'":"").">
		<td>Delivery Charges</td>
		<td></td>
		<td>".$del."</td>
		</tr>";
    $s = $s + $del;
    echo "<tr ".($i%2==0?"class= 'altrow'":"").">
		<td><b>Total</b></td>
		<td></td>
		<td>".$s."</td>
		</tr>";
	//print_r($logged);
	echo "</table>";
?>
<div style="text-align : center;">
<input class="button1" name="submit" type="submit" value="Make Payment" size="26%" style=" font-size:14px;" />
</div>
</div>
</form>

</div>
</div>

</div>
</div>
<?php include("footer.php"); ?>	
</body>
