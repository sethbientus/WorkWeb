<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="main">
<!-- php registration of fundings-->
<?php
if (isset($_GET["id"])) {

if(isset($_POST['confirm'])){
include('connection.php');
$id= intval($_GET["id"]);
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];
$amount= $_POST['amount'];
$phone= $_POST['operators'].$_POST['contacts'];
$financial_inst= $_POST['financial_inst'];
$bank_account= $_POST['bank_account'];

//inserting into the database
$sql= $pdo->prepare("INSERT INTO `funding`( `project_id`,`firstname`, `lastname`, `email`, `contact`, `amount`, `financial_inst`,`bank_account`) VALUES ('$id','$fname','$lname','$email','$phone','$amount','$financial_inst','$bank_account')");
$sql->execute();
if($sql){
echo '<script>alert("you have been registered please wait for response")</script>';
header("location:akando.php");
}
else{
 echo '<script>alert("you have not been registered please try again")</script>'; 
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
	<div class="funding_form">
		<div>
			<br><form method="POST" action="">
				<h3>funding form</h3>
				<input type="text" name="project_id" placeholder="project_id" readonly="" required="" value="<?php echo intval($_GET["id"]);?>"><br><br>
				<input type="text" name="fname" placeholder="fname" required=""><br><br>
				<input type="text" name="lname" placeholder="lname" required=""><br><br>
				<input type="text" name="email" placeholder="email" required=""><br><br>
				<input type="text" name="amount" placeholder="amount" required=""><br><br>
                <select name="operators" style="height: 20px;">
                <option>+25078</option>
                <option>+25072</option>
                <option>+25073</option>
                </select>            
			   <input type="text" style="width: 95px;" name="contacts" class="form-control" minlength="7" maxlength="7" pattern="[0-9]{7}" placeholder="contacts" required><br><br>
				<input type="text" name="financial_inst" placeholder="financial_inst" required=""><br><br>
				<input type="number" name="bank_account" placeholder="bank_account" required=""><br><br>
				<button type="submit" name="confirm">Confirm</button>
			</form>
		</div>
	</div>
</main>
</body>
</html>
<?php
}
else{
	header("location: akando.php");
}
?>