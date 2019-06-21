<?php
	require '../wp-content/plugins/customized-plugins/Database_Handler/ActivitiesHandler.php';
	$details = new ActivitiesHandler();
	$data = $details->get_users();
	$activity = $details->get_interest();
	$immo_interest = $details->get_immo_interest();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update user interest</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
	<script type="text/javascript" src="../wp-content/plugins/customized-plugins/js/angular.js"></script>
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
	<style>
        table tbody tr{
            cursor: pointer;
        }
    </style>
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-sm-5" style="margin-left: 2px;">
				<form  method="POST" action="../wp-content/plugins/customized-plugins/serverSide/insert_activity_location.php" class="form-horizontal" style="margin: auto;" enctype="multipart/form-data">
					<div class="form-group" style="display: none;">
		      			<input type="text" name="user_id" id="user_id" placeholder="user id" readonly required class="form-control">
					</div>
					<div class="form-group">
		      			<input type="text" name="fname" id="fname" placeholder="user first name" readonly required class="form-control">
					</div>
					<div class="form-group">
		      			<input type="text" name="lname" id="lname" placeholder="user last name" readonly required class="form-control">
					</div>
					<div class="form-group">
		      			<input type="email" name="email" id="email" placeholder="user email" readonly required class="form-control">
					</div>
					<div class="form-group">
						<select class="form-control" name="interest">
							<option class="form-control" selected="true">select activity</option>
							<?php
								foreach ($immo_interest as $key) {
									echo "<option class='form-control' value='".$key['interest_name']."'>";
										echo " ".$key['interest_name'];
									echo "</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
		      			<input type="text" required class="form-control" onblur ="addr_search()" id="city" name="city" placeholder="Enter activity location">
					</div>
					<div class="col-sm-12">
						<img src="" id="user_image">
					</div>
					<div class="form-group">
		      			Change Your Profile Image: <input type="file" class="form-control" name="interest_image" onchange="displayImage.call(this)">
					</div>
					<div class="form-group" style="display: none;">
		      			<input type="text" name="latitude" id="latitude" readonly required class="form-control">
					</div>
					<div class="form-group" style="display: none;">
		      			<input type="text" name="longitude" id="longitude" readonly required class="form-control">
					</div>
					<input type="submit" name="Update" value="Update" class="btn btn-success">
				</form>
			</div>
			<div class="col-sm-6" ng-app='angular_pass' ng-controller='pass_controller'>
                <table id="table"  border="1" style="border-collapse: collapse;" class="border border-info table table-hover">
	                <tr>
	                	<th colspan="4" class="align-middle">
	                		<input class="form-control"  type="text"  ng-model="user_name" ng-keyup="Search()"  placeholder="enter name of user">
	                	</th>
	                </tr>
	                <tr class="bg-info">
	                	<th>User ID</th>
	                	<th>First Name</th>
	                	<th>Last Name</th>
	                	<th>Email</th>
	                </tr>
	                <tbody ng-repeat = "record in returned track by $index">
	                	<tr ng-click = "getuser($index)">
		                	<td>{{record.user_id}}</td>
		                    <td>{{record.first_name}}</td>
		                	<td>{{record.surname}}</td>
		                	<td>{{record.email}}</td>
	                	</tr>
	                </tbody>
                </table>
			</div>
		</div>		
	</div>
	<script type="text/javascript">
        var app = angular.module('angular_pass', []);
        app.controller('pass_controller', function ($scope, $http) {
			$scope.Search = function () {
            	var request = $http({
                	method: "POST",
                	url:"../wp-content/plugins/customized-plugins/serverSide/ajaxFetch.php",
                	data: {
                    	passedKey: $scope.user_name
                	},
            	});
            	request.then(function (response) {
                	$scope.returned = response.data;
            	});        
        	};
        	$scope.getuser = function (index) {
        		var uid = $scope.returned[index].user_id;
                var email = $scope.returned[index].email;
                var fname = $scope.returned[index].first_name;
                var lname = $scope.returned[index].surname;
                document.getElementById('user_id').value = uid;
                document.getElementById('email').value = email;
                document.getElementById('fname').value = fname;
                document.getElementById('lname').value = lname;
            };
        });
    </script>
	<script type="text/javascript">
		function chooseAddr(lat1, lng1){
			lat2 = lat1;
			lon2 = lng1;
		 	document.getElementById('latitude').value = lat2;
		 	document.getElementById('longitude').value = lon2;
		}
		function myFunction(arr){
		 	var out = "<br />";
		 	var i;
		 	if(arr.length > 0){
		  		for(i = 0; i < arr.length; i++){
		   			chooseAddr(arr[i].lat,arr[i].lon);
		  		}
		  		document.getElementById('results').innerHTML = out;
		 	}
		}
		function addr_search(){
			var inp = document.getElementById("city");
		 	if (inp.value != "") {
			 	var xmlhttp = new XMLHttpRequest();
			 	var url = "https://nominatim.openstreetmap.org/search?format=json&limit=1&q=" + inp.value;
			 	xmlhttp.onreadystatechange = function(){
			   		if (this.readyState == 4 && this.status == 200){
			    		var myArr = JSON.parse(this.responseText);
			    		myFunction(myArr);
			   		}
			 	};
				xmlhttp.open("GET", url, true);
			 	xmlhttp.send();
		 	}
		 	else{
		 		alert("activity location is missing");
		 	}
		}

	</script>
</body>
</html>