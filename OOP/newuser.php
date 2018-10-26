	
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="images/icon.jpeg" />
	<title>Register</title>
	<script language="JavaScript" src="scripts/gen_validatorv4.js"
    	type="text/javascript" xml:space="preserve">
    	</script>
	<link rel="stylesheet" type="text/css" href="style/cssnewuser.css">
</head>
<body class="main">
	<div class="content">
		<form method="POST" action="insert.php" id="registration" enctype="multipart/form-data">
			<div class="Font_input">
				<center><h5>Register Form</h5></center>
				<label style="margin-left: 15px;margin-top: -8px;">First Name</label>
				<input type="text" name ="firstName"  required placeholder="Enter First Name">
				<label style="margin-left: 15px; margin-top: -8px;">Last Name</label>
				<input type="text" name ="lastName" required placeholder="Enter Last Name">
				<label style="margin-left: 15px; margin-top: -8px;">User name</label>
				<input type="text" name ="username" required placeholder="Enter username">
				<label style="margin-left: 15px;">Password</label>
				<input type="password" name="password" required placeholder="Enter password">
				<label style="margin-left: 15px;">Email</label>
				<input type="email" name="email" required placeholder="Enter email">
				<label style="margin-left: 15px;">Year of Birth</label>
				<input type="text" name="years" required placeholder="Year Only">
				<label style="margin-left: 15px;">Gender</label>
				<select name="Gender">
					<option>Male</option>
					<option>Female</option>
				</select>
				<select name="country">
					<option value="">Please Select Country</option>
					<option value="Argentina">Argentina</option>
					<option value="Australia">Australia</option>
					<option value="Belgium">Belgium</option>
					<option value="Brazil">Brazil</option>
					<option value="Egypt">Egypt</option>
					<option value="Estonia">Estonia</option>
					<option value="France">France</option>
					<option value="Canada">Canada</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Germany">Germany</option>
					<option value="Iceland">Iceland</option>
					<option value="India">India</option>
					<option value="Israel">Israel</option>
					<option value="Italy">Italy</option>
					<option value="Japan">Japan</option>
					<option value="Kenya">Kenya</option>
					<option value="Norway">Norway</option>
					<option value="Portugal">Portugal</option>
					<option value="Qatar">Qatar</option>
					<option value="Rwanda">Rwanda</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="Singapore">Singapore</option>
					<option value="South Africa">South Africa</option>
					<option value="Spain">Spain</option>
					<option value="Sweden">Sweden</option>
					<option value="Tanzania">Tanzania</option>
					<option value="Turkey">Turkey</option>
					<option value="Uganda">Uganda</option>
					<option value="Ukraine">Ukraine</option>
					<option value="United Arab Emirates">United Arab Emirates</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="United States">United States</option>
					<option value="Uruguay">Uruguay</option>
					<option value="Vatican City">Vatican City</option>
				</select>
				<input type="file" name="img" id="img" style="background-color: white" required>
			</div>
				<?php 
				if (@$_GET['notregis']==true) 
				{
			?>
				<div style="text-align: center; margin-bottom: 3px; margin-top: -5px;" ><?php echo $_GET['notregis']?></div>	
			<?php 
				}
			 ?>
			 <?php 
				if (@$_GET['data']==true) 
				{
			?>
				<div style="text-align: center; margin-bottom: 3px; margin-top: -5px;" ><?php echo $_GET['data']?></div>	
			<?php 
				}
			 ?>
		<center><input type="submit" name="submit" value="save" style="background-color: cyan;height: 25px;>
			<a href="newuser.php"><input type="button" name="reset" value="Reset"  style="background-color: cyan;height: 25px;">
				</a></center></br>
		<?php  
		 		session_start();
		 		if (isset($_SESSION['name'])) 
				{
					
				}
				else
				{
					header("location:index.php");
				}
		 		?>
		</form>
	</div>
	<script language="JavaScript" type="text/javascript"
    xml:space="preserve">
  var frmvalidator  = new Validator("registration");
  // validating first name input
  frmvalidator.addValidation("firstName","req","Please enter your First Name");
  frmvalidator.addValidation("firstName","maxlen=40",	"Max length for FirstName is 20");
  frmvalidator.addValidation("firstName","alpha","Name could not contain numbers");

  frmvalidator.addValidation("lastName","req","Please enter your Last Name");
  frmvalidator.addValidation("lastName","maxlen=20",	"Max length for lastName is 20");
  frmvalidator.addValidation("lastName","alpha","Name could not contain numbers");

  frmvalidator.addValidation("email","req","Please enter your email");
  frmvalidator.addValidation("email","maxlen=50");
  frmvalidator.addValidation("email","email","Enter a valid E-mail");

  frmvalidator.addValidation("years","req","Please enter your year of birth");
  frmvalidator.addValidation("years","maxlen=4");
  frmvalidator.addValidation("years","numeric","Year must be numeric only!");
</script>

</body>
</html>