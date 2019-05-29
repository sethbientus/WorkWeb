<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="../js/jquery.js"></script>
	<link rel="stylesheet" href="../css/leaflet.css"/>
	<script src="../js/leaflet.js"></script>
	<script src="../js/map.js"></script>
</head>
<body>
	<div class="container-fluid ml-0" id="content">
		<div class="row" id="rows">
			<div class="col-lg-8 pr-0" >
				<div class="pageContent" style="height: 550px;overflow: hidden">
					<form method="post" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0">
						<iframe style="display:none" onload="load_map()" src="../js/leaflet.js"></iframe>
						<div class="input-group">
        					<input type="text" class="form-control" id="country" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
        					<div class="input-group-append">
          						<button class="btn btn-primary" type="button" onclick="Search();">
            						<i class="fas fa-search"></i> 
          						</button>
        					</div>
      					</div>
					</form>
					<div class="row mt-2">
						<div id="map" class="col-lg-12" style="height: 500px; overflow: hidden"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<p><center>Terrain image</center></p>
				<div  id="image" style="height: 500px">
					
				</div>
			</div>
		</div>
		<div class="row" id="rows">
			<div class="col-lg-6 col-sm-offset-5">
				<div id="description" style="height:200px;">
						

				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
		$('#country').keyup(function(){
			search = $(this).val();;
		$.post(
			'../serverSide/search_terrain.php',
			{
				name: search,
			},
			function(data, status)
			{
				var values = JSON.parse(data);
				var details = values.description;
				var picture = values.file;
				$('#description').html(details);
				 $('#image').html('<img src="' + picture  + '" style=width:100%;height:500px;." alt="There is not a Terrain in This city"/>');
			}
		);

		});
	});
</script>
</html>