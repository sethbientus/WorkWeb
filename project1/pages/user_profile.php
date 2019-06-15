<?php
	session_start();
	require '../common/classes/ProfileHandler.php';
	$details = new ProfileHandler();
	$data = $details->get_user_pfrofiles( $_SESSION['userid']);
	$acitivities = $details->get_activity();
	$interest = $details->get_unsubscribed_interest( $_SESSION['userid']);
	$user_activities = $details->get_distinct_user_activities($_SESSION['userid']);
	$interests = $details->get_user_activities($_SESSION['userid']);
	foreach ($data as $key) {
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User_Profile</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap4.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-formhelpers.css">
    <script type="text/javascript">
		function displayImage(){
			if (this.files && this.files[0]) {
				var image_to_upload = new FileReader();
				image_to_upload.onload = function(data){
					var profile_image = document.getElementById('user_image');
					profile_image.src = data.target.result;
					profile_image.style.display = "block";
				}
				image_to_upload.readAsDataURL(this.files[0]);
			}
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('input[type="checkbox"]').change(function(){
				var checkboxname = $(this).val();
				if ($(".entry").hasClass(checkboxname)) {
					if ($(this).is(":checked")) {
						$(".entry." + checkboxname).show();
					}
					else{
						$(".entry." + checkboxname).hide();
					}
				}
			});

			$("input:checkbox").on('click',function(){
				var $box = $(this);
				var checkboxname = $(this).val();
				if ($box.is(":checked")) {
					var group = "input:checkbox[name='" + $box.attr("name") + "']";
					$(group).prop("checked",false);
					$box.prop("checked",true);
					$(".entry." + checkboxname).show();
				}
				else{
					$box.prop("checked",false);
					$(".entry." + checkboxname).hide();
				}
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<form  method="POST" action="../serverSide/update_profile.php" class="form-horizontal" style="margin: auto;" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-4">
					
						<div class="form-group">
							FirstName: <input type="text" class="form-control" name="fname" value="<?php echo $key['first_name'] ?>">
						</div>
						<div class="form-group">
							LastName: <input type="text" name="lname" class="form-control" value="<?php echo $key['surname'] ?>">
						</div>

						<div class="form-group">
		      				Email: <input type="email" class="form-control" name="email" value="<?php echo $key['email'] ?>">
						</div>

						<div class="form-group">
		      				Phone Number: <input type="text" class="form-control" name="phone" value="<?php echo $key['phone_number'] ?>">
						</div>

						<div class="form-group">
		      				Country: <input type="text" class="form-control" name="country" readonly value="<?php echo $key['country_of_origin'] ?>">
						</div>

						<div class="form-group">
		      				City: <input type="text" class="form-control" name="city" readonly value="<?php echo $key['city_of_origin'] ?>">
						</div>
						<div class="form-group">
		      				Change Your Profile Image: <input type="file" class="form-control" name="image_update" onchange="displayImage.call(this)">
						</div>
						<input type="submit" name="Update" value="Update" class="btn btn-success">
					
				</div>
				<div class="col-sm-6">
					<div class="col-sm-12 mt-4">
						<img src="<?php echo $key['profile_image'] ?>" id="user_image" width="100%" height="200" alt="You don't have any picture!! Upload one...">
					</div>
					<div class="row mt-3">
						<div class="col-sm-5 p-0 m-0">
							<div class="col-sm-12 mt-5">
								<p class="bg-primary">Your subscribed Activities</p>
								<?php
									echo "<ul style='list-style-type:circle;'>";				
										foreach ($user_activities as $key) {
										echo "<li>";
											echo $key['activity_name'];
										echo "</li>";
									}
									echo "</ul>";
								?>
							</div>

							<div class="col-sm-12 mt-3">
								<p class="bg-primary">Your scubscribed interest</p>
								<?php
									echo "<ul style='list-style-type:circle;'>";
										foreach ($interests as $key) {
											echo "<li>";
											echo $key['interest_name'];
										echo "</li>";
										}
									echo "</ul>";
								?>
							</div>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-6">
							<div class="col-sm-12 mt-5">
								<p class="bg-primary">Choose Your New Activity</p>
								<?php
									foreach ($acitivities as $key) {
										echo"<input type='checkbox' class='radio' name='chechboxes[1][]' value=".$key['activity_code'].">"." ".$key['activity_name'];
										echo "<br>";
									}
								?>
							</div>
							<div class="col-sm-12 mt-3">
								<p class="bg-primary">Choose Your New Interest</p>
								<?php
									foreach ($interest as $key) {
										echo "<div class='entry ".$key['activity_code']."' style='display: none'> ";
											echo "<input type='checkbox'  name='chechboxes_list[]' value=".$key['interest_name'].">"." ".$key['interest_name'];
											echo "<br>";
										echo "</div>";
									}
								?>
							</div>
						</div>
					</div>
			</div>
		</form>
	</div>
</body>
</html>