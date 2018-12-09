<?php 
    session_start();
	if (isset($_SESSION['name'])){
		$_SESSION['end_time'] = microtime(true);
		$time_diff = number_format($_SESSION['end_time'] - $_SESSION['start_time'],3);
		$time = number_format($time_diff/3600,5);
		echo'hours spent are ',$time,' hours';
		include"connection.php";
        $group_id = $_SESSION['group_id'];
        $course_id = $_SESSION['course_id'];

//inserting into the database
$sql= $pdo->prepare("INSERT INTO `time`( `course_id`,`group_id`, `hours`) VALUES ('$course_id','$group_id','$time')");
$sql->execute();
if($sql){
header("location:clubLOgin.php");
}
else{
 echo '<script>alert("you have not been registered please try again")</script>'; 
}
		session_destroy();
	}
 ?> 