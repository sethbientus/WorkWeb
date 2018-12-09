<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="main">
<!-- php registration of fundings-->
<?php
if(isset($_POST['confirm'])){
include('connection.php');
$name= $_POST['name'];
$description= $_POST['description'];
$explanation= $_POST['explanation'];

/* import video*/
  $target = "upload/docs/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
 echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded";
 } 
 else {
 echo "Sorry, there was a problem uploading your file.";
 }
   $file = $target;
  /* end of file*/

//inserting into the database
$sql= $pdo->prepare("INSERT INTO `projects`(`name`, `description`, `explanation`, `file`) VALUES ('$name','$description','$explanation','$file')");
$sql->execute();
if($sql){
echo '<script>alert("project registered")</script>';
}
else{
 echo '<script>alert("course not registered!!!")</script>'; 
}
}
?>


<header class="navbar">	
  <a href="akando.php">home</a>
  <a href="account.php">account</a>
  <a href="help.php">help</a>
  <a href="forum.php">forum</a>
  <a href="course.php">course</a>
</header>
<main class="content">
	<div class="project_form">
		<div>
			<br><form method="POST" action="" enctype="multipart/form-data">
				<input type="text" name="name" placeholder="project name" required=""><br><br>
				<input type="text" name="description" placeholder="description" required=""><br><br>
				<input type="text" name="explanation" placeholder="explanation" required=""><br><br>
				<input type="file" name="uploaded" placeholder="add file" required><br><br>
                <button type="submit" name="confirm">Confirm</button>
			</form>
		</div>
	</div>
</main>
</body>
</html>
