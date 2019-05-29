<?php
    require"../common/classes/ProfileHandler.php";
    $InsertUser = new ProfileHandler();
    if(isset($_POST['submit'])){
      $InsertUser->register($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['phone'],$_POST['gender'],md5($_POST['password']),$_POST['country'],$_POST['city'],$_POST['immobilier'],$batiment = $_POST['batiment']);
      }
?>