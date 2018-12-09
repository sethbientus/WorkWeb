<main class="content">
	<div class="projects">
		<div>
	      <?php
	         $id =intval($_GET["id"]);
             include("connection.php");
             $query= $pdo->prepare("SELECT * from opportunity where id = $id");
             $query->execute();
             while($datae = $query->fetch()){
             echo "<h1>opportunity explanation:</h1>
             <h3>".$datae['title']."</h3>
             <p>".$datae['opportunity']."</p>";  
             }
              ?>
		</div>
	</div>
</main>
</body>
</html>