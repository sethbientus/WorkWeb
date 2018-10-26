
<?php
  session_start();
  require 'dboperation.php';
  $login = new Operations();
	if (isset($_POST['login'])){
		$uname = $_POST['username'];
		$pword = $_POST['password'];
		$rows = $login->getByParam($uname,$pword);
    if ($rows > 0) {
			$_SESSION['name']= $_POST['username'];
    	$_SESSION['lastLogin']=time();
    	header("location: igihe.php");
    }
  	else{
    	header("location: index.php? invalid= Incorrect User Or Password");
    }
	}
	if (isset($_POST['reset'])){
		header("location: index.php");
 	}
?>
<?php 
  if (isset($_SESSION['name'])){
  }
  else{
    header("location:index.php");
  }
?>