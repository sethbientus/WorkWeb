<?php 
    session_start();
    if (isset($_SESSION['name'])){
    }
    else{
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="images/icon.jpeg" />
        <title>Angular Passing Parameter</title>
        <script src="scripts/angular.js"></script>
        <link rel="stylesheet" type="text/css" href="style/cssajaxPass.css">
    </head>
    <body style="background-color: #008B8B;">
        <div id="container">
            <div id="login" ng-app='angular_pass' ng-controller='pass_controller'>
            	<h3><center>Enter Your Search Key</center></h3>
                <table border="2" style="border-collapse: collapse; margin: auto;">
                	<tr>
                		<th colspan="10"><input type="text" size="20" ng-model="key" ng-keydown="Search()" placeholder="Type And Search Here...." style="background-color: cyan"></th>
                	</tr>
                	<tr style="background-color: cyan">
                		<th>User ID</th>
                		<th>First Name</th>
                		<th>Last Name</th>
                		<th>username</th>
                		<th>Password</th>
                		<th>Email</th>
                		<th>Age</th>
                		<th>Gender</th>
                        <th>Home Country</th>
                		<th>Photo</th>
                	</tr>
                	<tr ng-repeat = "record in returned">
                		<td>{{record.userID}}</td>
                		<td>{{record.firstName}}</td>
                		<td>{{record.lastName}}</td>
                		<td>{{record.userName}}</td>
                		<td>{{record.password}}</td>
                		<td>{{record.email}}</td>
                		<td>{{record.age}}</td>
                		<td>{{record.gender}}</td>
                        <td>{{record.HomeCountry}}</td>
                		<td><img src="{{record.pictures}}" width="50" height="30"></td>
                	</tr>
                </table>          
            </div>
        </div>
    </body>
    <script type="text/javascript">
        var app = angular.module('angular_pass', []);
        app.controller('pass_controller', function ($scope, $http) {

        $scope.Search = function () {
            var request = $http({
                method: "post",
                url:"ajaxFetch.php",
                data: {
                    passedKey: $scope.key
                },
            });
            request.then(function (response) {
                $scope.returned = response.data;
            });        
        }
        });
    </script>
</html>
