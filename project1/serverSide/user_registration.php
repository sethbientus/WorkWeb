<?php
    require"../common/classes/ProfileHandler.php";
    require"../common/classes/PasswordHasher.php";
    $wp_hash = new PasswordHash(8,true);
    $InsertUser = new ProfileHandler();
    $interest;
    if(isset($_POST['submit'])){
        if (!empty($_POST['chechboxes_list'])) {
            foreach ($_POST['chechboxes_list'] as $check) {
                $interest =  $check;
            }
        }
    	$target_path = "../images/userImages/";
        $pass = $wp_hash->HashPassword($_POST['password']);
    	$extens = pathinfo($_FILES['image_upload']['name'],PATHINFO_EXTENSION);
    	$new_name = rand().".".$extens;
    	$target_path = $target_path . $new_name;
    	if (move_uploaded_file($_FILES['image_upload']['tmp_name'], $target_path)) {
    		$InsertUser->register($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['phone'],$_POST['gender'],$pass,$_POST['country'],$_POST['city'],$target_path,$interest);	
    	}
      }
?>
