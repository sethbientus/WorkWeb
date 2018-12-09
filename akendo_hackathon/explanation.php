<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="main">
	<!-- insert ideas-->

<header class="navbar">	
  <a href="akando.php">home</a>
  <a href="account.php">account</a>
  <a href="help.php">help</a>
  <a href="forum.php">forum</a>
  <a href="course.php">course</a>
</header>
<main class="content">
	<div class="projects">
		<div>
	      <?php
	         $id =intval($_GET["id"]);
             include("connection.php");
             $query= $pdo->prepare("SELECT * from projects where id = $id");
             $query->execute();
             while($datae = $query->fetch()){
             echo "<h1>project explanation:</h1>
             <h3>".$datae['description']."</h3>
             <p>".$datae['explanation']."</p>
             <p><a href='".$datae['file']."'>".$datae['name']."</a></p>";  
             }
              ?>
		</div>
	</div>
</main>
</body>
</html>
