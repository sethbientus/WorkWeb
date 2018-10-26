<?php 
	session_start();
	require '../dboperation.php';
	if (isset($_SESSION['name'])) {
		$home = new Operations();
		$row = $home->getByParam($_SESSION['name']);
	}
	else{
		header("location: ../OOP/index.php");
	} 
?>
<html>
	<head>
		<link rel="icon" type="image/png" href="icon.jpeg" />
		<title>Show Home Country</title>
		<link rel="stylesheet" href="Styles/leaflet.css" />
		<link rel="stylesheet" type="text/css" href="Styles/map.css">
		<script src="Scripts/leaflet.js"></script>
		<script src="Scripts/jquery.min.js"></script>
	</head>
	<body>
		<div id="search">
			<input type="hidden" value="<?php echo $row['HomeCountry']; ?>" id="country" size="10" />
			<center><button type="button" onclick="Search();">HomeCountry</button></center>
			<div id="map"></div>
		</div>
		<script src="Scripts/map.js"></script>
	</body>
</html>