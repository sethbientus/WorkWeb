<?php  
	session_start();
	if (isset($_GET['signout'])) 
	{
		session_destroy();
		header("location:index.php");
	}
	else
	{
		header("location:index.php");
	}
?> 