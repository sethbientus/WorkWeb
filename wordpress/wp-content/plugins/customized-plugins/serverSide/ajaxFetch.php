<?php
	require '../Database_Handler/ActivitiesHandler.php';
	$searching = new ActivitiesHandler();
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
