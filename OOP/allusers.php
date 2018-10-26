<?php 
	session_start();
	if (isset($_SESSION['name'])){
	}
	else{
		header("location:index.php");
	}
	require 'dboperation.php'; 
	$User = new Operations();
	$data = $User->getByParam();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="images/icon.jpeg" />
	<title>All Users</title>
	<link rel="stylesheet" type="text/css" href="style/cssallusers.css">
</head>
<body>
	<div class="data">
		<h1 style="color: green"><center><u>All User Registered</u></center></h1>
		<table border="2" style="border-collapse: collapse;">
		<tr>
			<th>User ID</th>
			<th>Fist Name</th>
			<th>Last Name</th>
			<th>UserName</th>
			<th>Password</th>
			<th>email</th>
			<th>Years</th>
			<th>Gender</th>
			<th>Home Country</th>
			<th>Photo</th>
		</tr>
		<tr>
			<?php
				foreach ($data as $row) {
    				echo '
    					<tr>
    					<td>' . $row["userID"] . '</td>
    					<td>' . $row["firstName"] . '</td>
    					<td>' . $row["lastName"] . '</td>
    					<td>' . $row["userName"] . '</td>
    					<td>' . $row["password"] . '</td>
    					<td>' . $row["email"] . '</td>
    					<td>' . $row["age"] . '</td>
    					<td>' . $row["gender"] . '</td>
    					<td>'.$row["HomeCountry"].'</td>
    					<td><img src='.$row["pictures"].' width=50; height=50></td>
    				</tr>';
    			}
			?>
		</tr>
	</table>
	</div>
</body>
</html>