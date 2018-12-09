<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
	<link rel="stylesheet" href="styles&scripts/customStyle/login.css">
</head>
<body >
	<div id="main">
		<form  style="margin-top: 10px;" method="POST" action="clubLOgin.php">
			<h3><center>Login Group</center></h3>
			<label style="margin-left: 15px;">Username: </label>
			<input type="text" name="username" placeholder="username" required  style="background-color: cyan;height: 25px;" ></br></br>
			<label style="margin-left: 15px;">Password: </label>
			<input type="password" name="password" placeholder="Password" required style="background-color: cyan;height: 25px;"></br></br>
			<center>
                <input type="submit" name="login" value="Log in" style="background-color: cyan;height: 25px;"><br>
			</center>
            
			<?php 
				if (@$_GET['invalid']==true) 
				{
			?>
				<div style="text-align: center; margin-bottom: 3px; margin-top: -5px;" ><?php echo $_GET['invalid']?></div>	
			<?php 
				}
			 ?>
		</form>
	</div>
</body>
</html>
