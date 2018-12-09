<?php
  	require 'dboperation.php';
	  $InsertClub = new Operations();
	  if(isset($_POST['submit'])){
		$clubname = $_POST['club'];
		$leadername = $_POST['leader'];
		$career = $_POST['career'];
		$Camp = $_POST['camp'];
		$pass = $_POST['pword'];
        $status =  $_POST['status'];
        $account =  $_POST['account'];
		}
		$InsertClub->RegisterClub($clubname,$leadername,$career,$Camp,$pass,$status,$account);
?>
