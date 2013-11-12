<?if(session_start())
//	echo "true";
//else
//	echo "false";
//print_r($_SESSION);
?>
<div id="right">

<div class="sidemenu">
<?php
if($_POST['signup']){
	echo "<meta http-equiv='Refresh' content='0; URL=register.php'/>";
	exit(0);
}
if($_POST['order']){
	echo "<meta http-equiv='Refresh' content='0; URL=order.php'/>";
	exit(0);
}
//if(session_start())

 
if(isset($_POST['username'])and $_SESSION['isloggedin']!=1){
	$cn = mysql_connect('localhost', $DBUSER, $DBPASS);
	mysql_select_db($DBNAME, $cn);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$query = "select * from `users` where `username` = '".$username."' and `password` = '".$password."'";
	$logged = mysql_query($query);
	$logged = mysql_fetch_array($logged);
	mysql_close($cn);
	if($logged['userID']){

		$_SESSION['isloggedin'] = 1;
		$_SESSION['username'] = $username;		
		//$_SESSION['password'] = $password;
		$_SESSION['name']=$logged['name'];
		$_SESSION['address']=$logged['address'];
		$_SESSION['contact']=$logged['contact'];
		$_SESSION['userid'] = $logged['userID'];
		echo "<meta http-equiv='Refresh' content='0;'/>";
		exit(0);
		//print_r($logged);
	}
	else
		echo"Invalid Username or Password";								
}

echo'
	<form style="position: relative; margin-left: 0px; margin-right: 0px;  background-color: #FFFFFF;" value="refresh page" method="post">						
	<input name="keyword" size="30%" type="text" /><input id="searchbutton" class="button" type="submit" name="search" value="Search" />
	</form>							
	';

if($_SESSION['isloggedin']){
	//echo "<div class='entry'><p align='center'><b>Learning phase begins. Check out the <a href='problem.php'>problems</a></b></p>";
	echo "<div class='entry'><p align='center'><b>Welcome, ".$_SESSION['username']."</b></p>";
	echo "<p align='center' ><a href='profile.php'>My profile</a></p>";
	//echo "<p align='center' ><a href='account.php'>Account Settings</a></p>";
	echo "<p align='center' ><a href='logout.php'>Sign Out</a></p></div>";
	echo '<div id="list">
		 <form style="position: relative; margin-left: 0px; margin-right: 0px;  background-color: #FFFFFF;" value="refresh page" method="post">						
		 <label>Khane ki List<br/></label>
		 ';
	if($_SESSION['list']!="")
	{
    	$li = explode(";", $_SESSION['list']);
    	//print_r($li);
		foreach($li as $value){
    		echo $value.'<span class="li"><input size="10" type="number" value="1"/></span><br/><br/>';
    	}
	}
	echo '<div align="center">
		 <input id="loginbutton" class="button" type="submit" name="order" value="Order Now" />
		 <a href ="index.php?itemID=0"> Clear </a>
		 </div>
		 </form>
		 </div>							
		 ';	
	
}
else{
	echo'
		<form style="position: relative; margin-left: 0px; margin-right: 0px;  background-color: #FFFFFF;" value="refresh page" method="post">						
		<label>Login<br/></label>
		<input name="username" size="30%" type="text" /><br/>
		<label>Password<br/></label>
		<input name="password" size="30%" type="password" /></br>
		<div align="center"><input id="loginbutton" class="button" type="submit" name="login" value="Login" />
		<input id="loginbutton" class="button" type="submit" name="signup" value="Sign Up" /></div>
		</form>							
		';	


};

?>	
<!-- Leader Board -->
<!--
</div>
<h3>Overall Rankings</h3>
<table border="1" width="100%" >
<tr>
<th>Score</th><th>Username</th>
</tr>
-->
<?php
/*			
$cn = mysql_connect('localhost', $DBUSER, $DBPASS);
mysql_select_db($DBNAME, $cn);
$query = "select username,score from `users` order by score DESC limit 5 ";
$logged = mysql_query($query);

for($i=0;$logg = mysql_fetch_array($logged);$i++){

	echo "	
		<tr ".($i%2==0?"class= 'altrow'":"").">
		<td > ".$logg['score']."</td>	<td ><a href='profile.php?username=".$logg['username']."'>".$logg['username']."</a></td>
		</tr>";
}
mysql_close($cn);
*/
?>
<!--
</table>

<div align="center">
<img src="images/logo.png" height=100px width=150px/><br>
<img src="images/techkriti_logo.png" height=42px width=170px/><br/>
<br><br><br><br><b>Contest Organizers:<br></b>Ankit Mahato, 4th Year ME<br>Pankaj Jindal, 4th Year CSE<br>Pankaj Prateek, 3rd Year CSE<br>Rishabh Nigam, 3rd Year CSE<br>Rahul Arora, 3rd Year CSE<br>
<a href="https://plus.google.com/105183351397774464774" rel="publisher"></a>
</div>		
</div>
-->
<!-- content end -->	

