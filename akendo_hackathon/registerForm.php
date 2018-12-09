<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="../styles&scripts/customStyle/registerform.css">
</head>
<body class="main">
<?php
	require 'dboperation.php';
	$Object  = new Operations();
	$table = "clubs";
	$row = $Object->getByParam($table);
?>
	<div class="content">
		<form method="POST" action="register.php" enctype="multipart/form-data">
			<div class="Font_input">
				<center><h5>Register Form</h5></center>
				<?php 
					if (@$_GET['data']==true) 
					{
				?>
					<div style="text-align: center; margin-bottom: 3px; margin-top: -5px;" ><?php echo $_GET['data']?></div>	
				<?php 
					}
			 ?>
                <label for="">Select Group: </label><br>
                <select name="group" required>
					<?php
						foreach ($row as $data) {
							echo "<option>";
							echo $data['clubName'];
							echo"</option>";
						}
					?>
                </select>
				<label style="margin-left: 15px;margin-top: -8px;">First Name</label>
				<input type="text" name ="firstName"  required placeholder="Enter First Name">
				<label style="margin-left: 15px; margin-top: -8px;">Last Name</label>
				<input type="text" name ="lastName" required placeholder="Enter Last Name">
				<label style="margin-left: 15px; margin-top: -8px;">User name</label>
				<input type="text" name ="username" required placeholder="Enter username">
				<label style="margin-left: 15px;">Password</label>
				<input type="password" name="password" required placeholder="Enter password">
				<label style="margin-left: 15px;">BK Account</label>
				<input type="text" name="account" required placeholder="Enter BK Account">
                <label style="margin-left: 15px;">Portfolio: </label>           
				<input type="file" name="cv" style="background-color: white" required>
				<label style="margin-left: 15px;">About Me: </label><br>
                <textarea name="status" cols="30" rows="5"></textarea><br><br>	
			</div>
		    <center>
                <input type="submit" name="submit" value="Register" style="background-color: cyan;height: 25px;"><br><br>
			    <a href="main.php"><input type="button" name="reset" value="  Exit  "  style="background-color: cyan;height: 25px;">
				</a></center>
		</form>
	</div>
</body>
</html>
<?php
	session_start();
	if (!(isset($_SESSION['name']))){
        header("location: loginForm.php");
	}
 ?>