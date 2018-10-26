<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="images/icon.jpeg" />
	<title>Profile</title>
	<script src="scripts/angular.js"></script>
	<link rel="stylesheet" type="text/css" href="style/cssprofile.css">
</head>
<body style="background-color: #008B8B;" ng-app="Fetch" ng-controller="fetchControl">
	<div id="content">
		<div id="profile" ng-repeat="x in result">
			<span id="form">
				<form action="upquery.php" method="POST">
					<h2><center>Your Profile</center></h2>
					<label>User ID:</label>
					<input type="text" name="uid" readonly value="{{ x.userID}}" style="margin-left: 43px;"><br><br>
					<label>First Name:</label>
					<input type="text" name="fname" value="{{ x.firstName}}" style="margin-left: 17px;"><br><br>
					<label>Last Name:</label>
					<input type="text" name="lname" readonly value="{{ x.lastName }}" style="margin-left: 17px;"><br><br>
					<label>Username:</label>
					<input type="text" name="uname" readonly value="{{ x.userName}}" style="margin-left: 22px;"><br><br>
					<label>Password:</label>
					<input type="text" name="pword" readonly value="{{ x.password}}" style="margin-left: 27px;"><br><br>
					<label>Email:</label>
					<input type="text" name="email" readonly value="{{ x.email}}" style="margin-left: 57px;"><br><br>
					<label>Years:</label>
					<input type="text" name="years" value="{{ x.age}}" style="margin-left: 60px;"><br><br>
					<label>Gender:</label>
					<input type="text" name="Gender" value="{{ x.gender}}" style="margin-left: 47px;"><br>
					<label>Home Country:</label>
					<input type="text" name="homeCountry" value="{{x.HomeCountry}}" style="margin-left: 5px" size="15">
					<center><input type="submit" name="saveChanges" value="Save"></center><br>
					<?php 
						session_start(); 
		 				if (isset($_SESSION['name'])){
							echo '<center><a href="igihe.php" style = "text-decoration: none;">Back </a></center>';
						}
						else{
							header("location:index.php");
						}
		 			?>
				</form>
			</span>
			<span id="image">
				<img src="{{x.pictures}}"> 
			</span>
		</div>
	</div>
	<script>
		var app = angular.module('Fetch', []);
		app.controller('fetchControl', function($scope, $http){
  			$http.get("fetch.php").then(function (response) {
     		 	$scope.result = response.data;
  			});
		});
	</script>
</body>
</html>
