<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="images/icon.jpeg" />
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="style/cssdata.css">
</head>
<body style="background-color: #008B8B;">
	<?php
		session_start();
		require 'dboperation.php';
		$aname = $_SESSION["name"];
		$Object  = new Operations();
		$row = $Object->getByParam($aname);
		
	?>
	<div id="profile">
		<span id="form">
			<form>
				<h2><center>Your Profile</center></h2>
				<label>User ID:</label>
				<input type="text" name="fname" readonly value="<?php echo $row['userID']?>" style="margin-left: 43px;"><br><br>
				<label>First Name:</label>
				<input type="text" name="fname" readonly value="<?php echo $row['firstName']?>" style="margin-left: 17px;"><br><br>
				<label>Last Name:</label>
				<input type="text" name="lname" readonly value="<?php echo $row['lastName']?>" style="margin-left: 17px;"><br><br>
				<label>Username:</label>
				<input type="text" name="uname" readonly value="<?php echo $row['userName']?>" style="margin-left: 22px;"><br><br>
				<label>Password:</label>
				<input type="text" name="pword" readonly value="<?php echo $row['password']?>" style="margin-left: 27px;"><br><br>
				<label>Email:</label>
				<input type="text" name="email" readonly value="<?php echo $row['email']?>" style="margin-left: 57px;"><br><br>
				<label>Years:</label>
				<input type="text" name="email" readonly value="<?php echo $row['age']?>" style="margin-left: 60px;"><br><br>
				<label>Gender:</label>
				<input type="text" name="email" readonly value="<?php echo $row['gender']?>" style="margin-left: 47px;"><br><br>
				<label>Home Country: </label>
				<input type="text" name="country" readonly="" value="<?php echo $row['HomeCountry']?>" size="15" style ="margin-left: 7px;">
			</form>
		</span>
		<span id="image">
			<center><p><u>Photo..</u></p></center>
			<img src="<?php echo $row['pictures'] ?>" width="200" height="200">
		</span>
	</div>
</body>
</html>
<?php 
	if (isset($_SESSION['name'])){
	}
	else{
		header("location:index.php");
	}
?>