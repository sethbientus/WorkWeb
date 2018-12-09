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
	<div class="courses">
		<div>
	      <?php
             include("connection.php");
             $query= $pdo->prepare("SELECT * from courses");
             $query->execute();
             while($datae = $query->fetch()){
             echo '<h1>course: '.$datae['name'].'</h1>
             <h3>chapter:  '.$datae['name'].'</h3>
             <p><video src="'.$datae['video'].'" alt="Card image cap" style="height:225px;width:300px;" controls="see"></video></p>';
              }
              ?>
		</div>
	</div>
</main>
</body>
</html>
