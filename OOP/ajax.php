<?php 
	session_start();
	if (isset($_SESSION['name'])){
	}
	else{
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="images/icon.jpeg" />
	<title>Ajax</title>
</head>
<body style="background-color: #008B8B">
	<div id="Profile">
		
	</div>
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			setInterval( function() 
			{
				$('#Profile').load('data.php')
			},0.1);
		});
	</script>
</body>
</html>