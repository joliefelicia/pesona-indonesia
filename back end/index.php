<!DOCTYPE html>
<?php
include "includes/config.php";
ob_start();
session_start();
if(!isset($_SESSION['emailuser']))
	header("location:login.php");
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Admin</title>
</head>
<body>
	<?php include "header.php";?>
 
 <div class="jumbotron jumbotron-fluid">
 	<div class="container">
 		<h1 class="display">Dashboard admin</h1>

 	</div>
 </div>
 


 
  

 

	<?php include "footer.php";?>
</body>
<?php
mysqli_close($connection);
ob_end_flush();
?>
</html>