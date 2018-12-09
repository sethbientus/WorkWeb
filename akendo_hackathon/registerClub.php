<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="styles&scripts/customStyle/registerform.css">
</head>
<body class="main">
<?php
	require 'dboperation.php';
	$Object  = new Operations();
	$table = "clubs";
	$row = $Object->getByParam($table);
?>
	<div class="content">
		<form method="POST" action="clubregister.php" enctype="multipart/form-data">
			<div class="Font_input">
				<center><h5>Register Club</h5></center>
				<label style="margin-left: 15px;margin-top: -8px;">Club Name</label>
				<input type="text" name ="club"  required placeholder="Enter Club Name">
				<label style="margin-left: 15px; margin-top: -8px;">Club Leader</label>
				<input type="text" name ="leader" required placeholder="Enter Leader Name">
				<label style="margin-left: 15px; margin-top: -8px;">Career</label>
				<input type="text" name ="career" required placeholder="Enter Career">
				<label style="margin-left: 15px;">Camp Name</label>
				<input type="text" name="camp" required placeholder="Enter Camp Name">
				<label style="margin-left: 15px;">Password: </label>
				<input type="password" name="pword" required placeholder="Enter Password"><br>
                <label style="margin-left: 15px;">BK Account: </label>           
				<input type="text" name="account"  required>
				<label style="margin-left: 15px;">About Club: </label><br>
                <textarea name="status" cols="30" rows="5"></textarea><br><br>	
			</div>
		    <center>
                <input type="submit" name="submit" value="Register" style="background-color: cyan;height: 25px;"><br><br>
			    <a href="logout.php"><input type="button" name="reset" value="  Exit  "  style="background-color: cyan;height: 25px;">
				</a></center>
		</form>
	</div>
</body>
</html>
