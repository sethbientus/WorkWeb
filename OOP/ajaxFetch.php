<?php 
	session_start();
	if (isset($_SESSION['name'])){
	}
	else{
		header("location:index.php");
	}
?>
<?php
	require 'dboperation.php';
	$searching = new Operations();
	$result = array();
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $searchKey = $request->passedKey;
    $data = $searching->search($searchKey);
	foreach ($data as $row) {
		$result[] = $row;
	}
	echo json_encode($result);
?>
