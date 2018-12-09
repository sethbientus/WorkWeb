<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="main">
<header class="navbar">	
  <a href="akando.php">home</a>
  <a href="registerClub.php">account</a>
  <a href="help.php">help</a>
  <a href="forum.php">forum</a>
  <a href="course.php">course</a>
  <a href="clubloginform.php">Login</a>
</header>
<main class="content">
	<div class="post">
		<div>
			<form method="post" action="">
				<textarea name="content" placeholder="post here"></textarea><BR>
				<button name="post">POST</button>
			</form>
					<?php
		include("connection.php");			
	   if (isset($_POST['post'])){
	   $user_id = "1";
       $content = $_POST['content'];
       $sql= $pdo->prepare("INSERT INTO `post`( `user_id`, `content`) VALUES ('$user_id','$content')");
       $sql->execute();
       if($sql){
       header("location:forum.php");
        }
       else{
 echo '<script>alert("post not save")</script>'; 
}
	}

	 ?>
		 

		     <?php
                $query= $pdo->prepare("SELECT * from post");
                $query->execute();
                $id = 0;
                while($datae = $query->fetch()){
                echo "<h3>post: ".$datae['content']."</h3>";  
                $id = $id + 1;

              ?>
		</div>
		<div class="comment">
			<?php
                $query2= $pdo->prepare("SELECT * from comment where post_id = $id");
                $query2->execute();
                while($datae2 = $query2->fetch()){
                echo "<h3>comment:</h3>
			<h5>".$datae2['username']."</h5>
			<p>".$datae2['content']."</p>
                ";  
            }
              ?>
         <form method="post" action="">
				<input type="text" name="names" placeholder="full names here"><BR><br>
				<input type="text" name="content" placeholder="comment here"><BR><br>
				<button name="comment<?php echo $id;?>">Comment</button>
			</form>
		</div>
		<?php 
	   if (isset($_POST['comment'.$id])){
	   $names = $_POST['names'];
       $content = $_POST['content'];
       $sql= $pdo->prepare("INSERT INTO `comment`( `post_id`, `content`,`username`) VALUES ('$id','$content','$names')");
       $sql->execute();
       if($sql){
       header("location:forum.php");
        }
       else{
 echo '<script>alert("comment not save")</script>'; 
}
	}

}

	 ?>
	</div>
</main>
</body>
</html>
<?php

?>