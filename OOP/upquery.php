<?php
	session_start();
	require 'dboperation.php';
	$edit = new Operations();
	$id = $_SESSION["name"];
	if (isset($_POST["saveChanges"])) {
		$firstName = $_POST["fname"];
		$lastName = $_POST["lname"];
		$userName = $_POST["uname"];
		$pword = $_POST["pword"];
		$email = $_POST["email"];
		$Age = $_POST["years"];
		$country = $_POST["homeCountry"];
		$sex = $_POST["Gender"];
		$edit->update($firstName,$lastName,$userName,$pword,$email,$Age,$country,$sex,$id);
	}
?>
<?php  
	if (isset($_SESSION['name'])){
	}
	else{
		header("location:index.php");
	}
?>