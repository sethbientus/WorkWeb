<?php
  session_start();
  require 'dboperation.php';
  $login = new Operations();
	if (isset($_POST['login'])){
		$uname = $_POST['username'];
        $pword =$_POST['password'];
        $rows = $login->getByParam($uname,$pword);
        if ($rows > 0) {
            $_SESSION['name']= $uname;
            $_SESSION['start_time'] = microtime(true);
            header("location: registerClub.php");
        }
        else{
            header("location: loginForm.php? invalid= Incorrect User Or Password");
        }
    }
?>