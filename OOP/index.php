<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="images/icon.jpeg" />
	<title>Sign in</title>
	<link rel="stylesheet" type="text/css" href="style/cssindex.css">
</head>
<body>
	<div id="main">
		<form  style="margin-top: 10px;" method="POST" action="login.php">
			<h3><center>Login Form</center></h3>
			<label style="margin-left: 15px;">Username: </label>
			<input type="text" name="username" placeholder="username" required  style="background-color: cyan;height: 25px;" ></br></br>
			<label style="margin-left: 15px;">Password: </label>
			<input type="password" name="password" placeholder="Password" required style="background-color: cyan;height: 25px;"></br></br>
			<?php 
				if (@$_GET['Empty']==true) 
				{
			?>
				<div style="text-align: center; margin-bottom: 3px; margin-top: -5px;" ><?php echo $_GET['Empty']?></div>	
			<?php 
				}
			 ?>
			 <?php 
				if (@$_GET['invalid']==true) 
				{
			?>
				<div style="text-align: center; margin-bottom: 3px; margin-top: -5px;" ><?php echo $_GET['invalid']?></div>	
			<?php 
				}
			 ?>
			  <?php 
				if (@$_GET['regis']==true) 
				{
			?>
				<div style="text-align: center; margin-bottom: 3px; margin-top: -5px;" ><?php echo $_GET['regis']?></div>	
			<?php 
				}
			 ?>
				
			<center>
				<input type="submit" name="login" value="Log in" style="background-color: cyan;height: 25px;">
				<a href="index.php"><input type="button" name="reset" value="Reset"  style="background-color: cyan;height: 25px;">
				</a>
			</center>
		</form>
	</div>
</body>
</html>