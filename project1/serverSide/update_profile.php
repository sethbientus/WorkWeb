<?php
	session_start();
	require '../common/classes/ProfileHandler.php';
	$new_profile = new ProfileHandler();
	$id = $_SESSION['userid'];
	$new_image = $_SESSION['image'];
	if (isset($_POST["Update"])) {
		if (!empty($_POST['chechboxes_list'])) {
            foreach ($_POST['chechboxes_list'] as $check) {
                $interest =  $check;
            }
        }
		move_uploaded_file($_FILES['image_update']['tmp_name'], $new_image);
		$new_profile->update_user_profile($id,$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['phone'],$interest);
	}	
?>