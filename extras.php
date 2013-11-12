
<?php
session_start();
include('settings.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Khao Chacha</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body class="blog">
<!-- wrap starts here -->
<div id="wrap">			
<?php include('header.php'); ?>
<div id="content-outer" class="clear">

<div id="left">						
<div class="entry">
<p><a href="https://computing.llnl.gov/tutorials/parallel_comp/" target="_blank">Detailed Introduction to Parallel Computing</a>
<br><a href="https://computing.llnl.gov/tutorials/mpi/#Getting_Started" target="_blank">MPI : Getting Started</a>
<br><br>
<strong>Installing MPI on your laptop/workstation:</strong>
<br>
On ubuntu :
<br>
sudo apt-get install mpich2<br><br>
To compile your code using MPICH you need to use this command:
<br>
mpicc filename.c<br><br>
To run your code using MPI you need to use this command:
<br>
mpirun -np 6 ./a.out<br>
<br>
</p>
</div>
</div>

<?php include("sidebar.php"); ?>
</div>
</div>
<?php include("footer.php"); ?>	
</body>
</html>
