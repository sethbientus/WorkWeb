<?php
	session_start();
	require '../common/classes/ProfileHandler.php';
	$new_profile = new ProfileHandler();
	$id = $_SESSION['userid'];
	if (isset($_POST["Update"])) {
		$new_profile->update_user_profile($id,$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['phone'],$_POST['country'],$_POST['city']);
	}	
?>