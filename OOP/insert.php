<?php
	session_start();
  	require 'dboperation.php';
  	$InsertUser = new Operations();
	if (isset($_POST['submit'])){
		$Firstname = $_POST['firstName'];
		$Lastname = $_POST['lastName'];
		$Username = $_POST['username'];
		$Password = $_POST['password'];
		$E_mail = $_POST['email'];
		$Dod = $_POST['years'];
		$country = $_POST['country'];
		$Sex = $_POST['Gender'];
		$folder = "Files/Photos/";
		$ext = $InsertUser->findexts( basename($_FILES["img"]["name"]));
 		$newName = rand ().".".$ext;
 		$filePath = $folder. $newName;
    	$check = getimagesize($_FILES["img"]["tmp_name"]);
    	move_uploaded_file($_FILES["img"]["tmp_name"], $filePath);
    }
    $InsertUser->RegisterUser($Firstname,$Lastname,$Username,$Password,$E_mail,$Dod,$country,$Sex,$filePath,$folder,$check);
?>
<?php
	if (isset($_SESSION['name'])){
	}
	else{
		header("location:index.php");
	}
 ?>