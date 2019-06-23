<?php
	require 'ConnectionHandler.php';
	class ProfileHandler extends ConnectionHandler{
	       private $statement;
               public function register($firstname,$lastname,$email,$phone,$gender,$password,$country,$city,$image,$interest){
                        $sql = "CALL register_user('$firstname','$lastname','$email','$phone','$gender','$password','$country','$city','$image','$interest')";
                        $this->statement = $this->connection->prepare($sql);
                        if ($this->statement->execute()) {
                                header("Location: ../pages/profile.php");
                        }
                }
                public function user_login($user_email,$user_password){
                    $sql = "SELECT * FROM tb_tact_users WHERE email = :gmai AND pass_word = :pwd";
                    $this->statement = $this->connection->prepare($sql);
                    $this->statement->bindParam(':gmai',$user_email);
                    $this->statement->bindParam(':pwd',$user_password);
                    $this->statement->execute();
                    if ($this->statement->rowcount() > 0) {
                         return $this->statement->fetch(PDO::FETCH_ASSOC);
                    }
                }
                public function get_user_profiles($user_id){
                        $sql = "CALL get_user_details('$user_id')";
                        $this->statement = $this->connection->prepare($sql);
                        if ($this->statement->execute()) {
                                return $this->statement->fetchall(PDO::FETCH_ASSOC);
                        }
                }
                public function update_user_profile($id,$fname,$lname,$gmail,$phone,$interest){
                        $sql = "CALL update_user_profile('$id','$fname','$lname','$gmail','$phone','$interest')";
                        $this->statement = $this->connection->prepare($sql);
                        if ($this->statement->execute()) {
                                header("Location: ../pages/profile.php");
                        }
                }
                public function get_user_activities($id){
                    $sql = "CALL get_user_activities('$id')";
                    $this->statement = $this->connection->prepare($sql);
                    if ($this->statement->execute()) {
                         return $this->statement->fetchall(PDO::FETCH_ASSOC);
                    }
                }
                public function get_distinct_user_activities($id){
                    $sql = "CALL get_user_distinct_activity('$id')";
                    $this->statement = $this->connection->prepare($sql);
                    if ($this->statement->execute()) {
                         return $this->statement->fetchall(PDO::FETCH_ASSOC);
                    }
                }
                public function get_Activity(){
                    $sql = "CALL get_all_activities()";
                    $this->statement = $this->connection->prepare($sql);
                    $this->statement->execute();
                    return $this->statement->fetchall(PDO::FETCH_ASSOC);
                }
                public function get_interest(){
                    $sql = "CALL get_all_interests()";
                    $this->statement = $this->connection->prepare($sql);
                    $this->statement->execute();
                    return $this->statement->fetchall(PDO::FETCH_ASSOC);
                }
                public function get_unsubscribed_interest($ids){
                    $sql = "CALL get_user_unsubscribed('$ids')";
                    $this->statement = $this->connection->prepare($sql);
                    $this->statement->execute();
                    return $this->statement->fetchall(PDO::FETCH_ASSOC);
                }
            }

?>
