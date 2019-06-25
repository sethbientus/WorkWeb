<?php
    session_start();
    require"../common/classes/ProfileHandler.php";
    $login = new ProfileHandler();
    require"../common/classes/PasswordHasher.php";
    $wp_hash = new PasswordHash(8, true);
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $details = $login->user_login($email);
        if ($wp_hash->CheckPassword($pass, $details['pass_word'])) {
            $_SESSION['userid'] = $details['user_id'];
            $_SESSION['username'] = $details['first_name'];
            header("location: ../site_chats/index.php");
        }
        else {
            header("location: ../pages/Home.php? invalid= Incorrect User Or Password");
        }
    }
?>