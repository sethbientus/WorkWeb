<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="main">
	<!-- insert ideas-->

<header class="navbar">	
  <a href="akando.php">home</a>
  <a href="registerClub.php">account</a>
  <a href="help.php">help</a>
  <a href="forum.php">forum</a>
  <a href="course.php">course</a>
  <a href="clubloginform.php">Login</a>
</header>
<main class="content">
	<div class="projects">
		<div>
	      <?php
             include("connection.php");
             $query= $pdo->prepare("SELECT * from projects");
             $query->execute();
             $id = 0;
             while($datae = $query->fetch()){
              echo "<h1>project: ".$datae['description']."</h1>";  
              $id = $id + 1;

              ?>
		</div>
		<form method="POST" action="">
		  <a href="Explanation.php?id=<?php echo $id;?>">Explanation</a>
		   <a href="funding.php?id=<?php echo $id;?>">Fund</a><br><br>
		  <textarea name="idea" placeholder="give an idea about this project"></textarea><br><br>
		  <input type="submit" name="ideas<?php echo $id;?>" value="send idea">
	    </form>
	</div>
	<?php
	$id2 = $datae['id'];
	echo "<h1>".$id."</h1>"; 
		if (isset($_POST['ideas'.$id])){
       $idea = $_POST['idea'];
       $sql= $pdo->prepare("INSERT INTO `ideas`( `project_id`, `idea`) VALUES ('$id','$idea')");
       $sql->execute();
       if($sql){
       echo '<script>alert("idea saved")</script>';
        }
       else{
 echo '<script>alert("idea not save")</script>'; 
}
	}

}

	 ?>
	<div class="opportunities">
		<?php
             $query22 = $pdo->prepare("SELECT * from opportunity");
             $query22->execute();
             while($datae22 = $query22->fetch()){
             	$id22 = $datae22['id'];
             ?>
		<ul>
		  <h2>Opportunities:</h2>
		  <li><a href="opportunities.php?id=<?php echo $id22;?>"><?php echo $datae22['title']; ?></a></li>
	</ul>
	<?php
	}
	?>
	</div>
</main>
</body>
</html>
