<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "akando";
    $pdo = new PDO("mysql:host=localhost;dbname=akando", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    ?>
	