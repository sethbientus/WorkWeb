<?php
	session_start();
	require 'dboperation.php';
	$record = new Operations();
	$aname = $_SESSION["name"];
	$data = $record->getByParam($aname);
	$d[]= array();
	    $d[] = $data;

	echo json_encode($d);
?>
<?php  
    if (isset($_SESSION['name'])){
        }
    else{
        header("location:index.php");
    }
?>
