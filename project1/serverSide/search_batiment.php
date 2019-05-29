<?php
$table= "batiments";
require '../common/classes/DatabaseHandler.php';
if(isset($_POST['name'])){
    $pass = $_POST['name'];
	$data = new Operations();
	$row = $data->SelectTerrain($table,$pass);
	echo json_encode($row);
}
