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
$chapter= $_POST['chapter'];
$content= $_POST['content'];

/* import video*/
  $target = "upload/videos/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
 echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded";
 } 
 else {
 echo "Sorry, there was a problem uploading your file.";
 }
   $video = $target;
  /* end of file*/

//inserting into the database
$sql= $pdo->prepare("INSERT INTO `courses`(`name`, `chapter`, `content`, `video`) VALUES ('$name','$chapter','$content','$video')");
$sql->execute();
if($sql){
echo '<script>alert("course registered")</script>';
}
else{
 echo '<script>alert("course not registered!!!")</script>'; 
}
}
?>


<header class="navbar">	
  <a href="akando.php">home</a>
  <a href="registerClub.php">account</a>
  <a href="help.php">help</a>
  <a href="forum.php">forum</a>
  <a href="course.php">course</a>
  <a href="clubloginform.php">Login</a>
</header>
<main class="content">
	<div class="funding_form">
		<div>
			<br><form method="POST" action="" enctype="multipart/form-data">
				<input type="text" name="name" placeholder="course name" required=""><br><br>
				<input type="text" name="chapter" placeholder="chapter name" required=""><br><br>
				<input type="text" name="content" placeholder="content of the chapter" required=""><br><br>
				<input type="file" name="uploaded" placeholder="add video" required><br><br>
                <button type="submit" name="confirm">Confirm</button>
			</form>
		</div>
	</div>
</main>
</body>
</html>
