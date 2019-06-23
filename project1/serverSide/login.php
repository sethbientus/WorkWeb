<?php
    session_start();
    require"../common/classes/ProfileHandler.php";
    $login = new ProfileHandler();
    // require"../common/classes/PasswordHasher.php";
    // $wp_hash = new PasswordHash(8, true);
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        // $pass = $wp_hash->HashPassword($_POST['password']);
        $details = $login->user_login($email,$password);
        // if ($wp_hash->CheckPassword($pass, $details['pass_word'])) {
        //     echo "Password Matched";
        // }
        // else {
        //     echo "Entered Password is wrong";
        // }
        // $details = $login->user_login($email,$password);
        if($details['email'] == $email AND $details['pass_word']== $password){
            $_SESSION['userid'] = $details['user_id'];
            $_SESSION['username'] = $details['surname'];
            $_SESSION['image'] = $details['profile_image'];
            header("location: ../pages/profile.php");
        }
        else{
            header("location: ../pages/Home.php? invalid= Incorrect User Or Password");
        }
    }
?>