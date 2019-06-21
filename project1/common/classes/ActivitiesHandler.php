<?php
	require 'ConnectionHandler.php';
	class ActivitiesHandler extends ConnectionHandler
	{
        private $ready  = 1;
        private $database  = "db_tact";      
        private $chatTable = 'tb_messages';
        private $chatUsersTable = 'tb_tact_users';
		private $statement;
		public function insert_Activity($code,$name,$description)
		{
			$sql = "CALL insert_activity('$code','$name','$description')";
			$this->statement = $this->connection->prepare($sql);
			if ($this->statement->execute()) {
				header("Location: ../pages/activity_upload.php");
			}
		}
		public function get_Activity()
		{
			$sql = "CALL get_all_activities()";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			return $this->statement->fetchall(PDO::FETCH_ASSOC);
		}
		public function insert_interest($name,$act_code,$descrip){
			$sql = "CALL insert_activity_interests('$name','$act_code','$descrip')";
			$this->statement = $this->connection->prepare($sql);
			if ($this->statement->execute()) {
				header("Location: ../pages/interest_upload.php");
			}
		}
		public function get_interest(){
			$sql = "CALL get_all_interests()";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			return $this->statement->fetchall(PDO::FETCH_ASSOC);
		}
		public function page_data($code){
			$sql = "CALL get_pages_data('$code')";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			return $this->statement->fetchall(PDO::FETCH_ASSOC);
		}
		public function get_users(){
            $sql = "CALL get_tact_users()";
            $this->statement = $this->connection->prepare($sql);
            $this->statement->execute();
            return $this->statement->fetchall(PDO::FETCH_ASSOC);
        }
        public function insert_update($userid,$activity,$city,$latitude,$longitude,$interest,$target_path){
            $sql = "CALL insert_activity_location('$userid','$activity','$longitude','$latitude','$city','$interest')";
            $this->statement = $this->connection->prepare($sql);
            $this->statement->execute();
            $sql1 = "CALL update_user_interest('$userid','$target_path','$interest')";
            $this->statement = $this->connection->prepare($sql1);
            if ($this->statement->execute()) {
            	header("Location: ../pages/add_interest_image.php");
            }

        }
        public function get_search_details($id,$interest,$pass){
        	$sql = "CALL get_more_details('$id','$interest','$pass')";
        	$this->statement = $this->connection->prepare($sql);
        	$this->statement->execute();
        	return $this->statement->fetch(PDO::FETCH_ASSOC) ;
        }
        public function get_About(){
        	$sql = "CALL get_about_us()";
        	$this->statement = $this->connection->prepare($sql);
        	$this->statement->execute();
        	return $this->statement->fetchall(PDO::FETCH_ASSOC) ;
        }
        public function get_home_page(){
        	$sql = "CALL get_home_page_data()";
        	$this->statement = $this->connection->prepare($sql);
        	$this->statement->execute();
        	return $this->statement->fetchall(PDO::FETCH_ASSOC) ;
        }












        private function getData($sqlQuery) {
        $this->statement = $this->connection->prepare($sqlQuery);
        $this->statement->execute();
        $rows = $this->statement->fetchAll(\PDO::FETCH_ASSOC);
        $data= array();
        foreach ($rows as $row) {
            $data[]=$row;            
        }
        return $data;
    }
    private function getNumRows($sqlQuery) {
        $this->statement = $this->connection->prepare($sqlQuery);
        $this->statement->execute();
        $numRows = $this->statement->rowcount();
        return $numRows;
    }
    public function loginUsers($username, $password){
        $sqlQuery = "
            SELECT user_id, email 
            FROM ".$this->chatUsersTable." 
            WHERE email='".$username."' AND pass_word='".$password."'";        
        return  $this->getData($sqlQuery);
    }       
    public function chatUsers($userid){
        if ($userid == "@admin") {
            $sqlQuery = " SELECT * FROM ".$this->chatUsersTable." WHERE email != '$userid' AND email != '@admin'";
            return  $this->getData($sqlQuery);
        }
        if ($userid != "@admin") {
            $sqlQuery = " SELECT * FROM ".$this->chatUsersTable." WHERE email = '@admin'";
            return  $this->getData($sqlQuery);
        }
        
    }
    public function getUserDetails($userid){
        $sqlQuery = "
            SELECT * FROM ".$this->chatUsersTable." 
            WHERE user_id = '$userid'";
        return  $this->getData($sqlQuery);
    }
    public function getUserAvatar($userid){
        $sqlQuery = "
            SELECT profile_image 
            FROM ".$this->chatUsersTable." 
            WHERE user_id = '$userid'";
        $userResult = $this->getData($sqlQuery);
        $userAvatar = '';
        foreach ($userResult as $user) {
            $userAvatar = $user['profile_image'];
        }   
        return $userAvatar;
    }   
    public function updateUserOnline($userId, $online) {        
        $sqlUserUpdate = "
            UPDATE ".$this->chatUsersTable." 
            SET status = '".$online."' 
            WHERE user_id = '".$userId."'";          
        $this->statement = $this->connection->prepare($sqlUserUpdate);
        $this->statement->execute();    
    }
    public function insertChat($reciever_userid, $user_id, $chat_message) {     
        $sqlInsert = "
            INSERT INTO ".$this->chatTable." 
            (receiver, sender, message_content, message_status) 
            VALUES ('".$reciever_userid."', '".$user_id."', '".$chat_message."', '1')";
            $this->statement = $this->connection->prepare($sqlInsert);
        
        $result = $this->statement->execute();
        if(!$result){
            return ('Error in query: '. mysqli_error());
        } else {
            $conversation = $this->getUserChat($user_id, $reciever_userid);
            $data = array(
                "conversation" => $conversation         
            );
            echo json_encode($data);    
        }
    }
    public function getUserChat($from_user_id, $to_user_id) {
        $fromUserAvatar = $this->getUserAvatar($from_user_id);  
        $toUserAvatar = $this->getUserAvatar($to_user_id);        
        $sqlQuery = "
            SELECT * FROM ".$this->chatTable." 
            WHERE (sender = '".$from_user_id."' 
            AND receiver = '".$to_user_id."') 
            OR (sender = '".$to_user_id."' 
            AND receiver = '".$from_user_id."') 
            ORDER BY sent_time ASC";
        $userChat = $this->getData($sqlQuery);  
        $conversation = '<ul>';
        foreach($userChat as $chat){
            $user_name = '';
            if($chat["sender"] == $from_user_id) {
                $conversation .= '<li class="sent">';
                $conversation .= '<img width="22px" height="22px" src="'.$fromUserAvatar.'" alt="" />';
            } else {
                $conversation .= '<li class="replies">';
                $conversation .= '<img width="22px" height="22px" src="'.$toUserAvatar.'" alt="" />';
            }           
            $conversation .= '<p>'.$chat["message_content"].'</p>';         
            $conversation .= '</li>';
        }       
        $conversation .= '</ul>';
        return $conversation;
    }
    public function showUserChat($from_user_id, $to_user_id) {      
        $userDetails = $this->getUserDetails($to_user_id);
        $toUserAvatar = '';
        foreach ($userDetails as $user) {
            $toUserAvatar = $user['profile_image'];
            $userSection = '<img src="'.$user['profile_image'].'" alt="" />
                <p>'.$user['surname'].'</p>
                <div class="social-media">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                     <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>';
        }       
        // get user conversation
        $conversation = $this->getUserChat($from_user_id, $to_user_id); 
        // update chat user read status     
        $sqlUpdate = "
            UPDATE ".$this->chatTable." 
            SET message_status = '0' 
            WHERE sender = '".$to_user_id."' AND receiver = '".$from_user_id."' AND message_status = '1'";
        mysqli_query($this->dbConnect, $sqlUpdate);     
        // update users current chat session
        $sqlUserUpdate = "
            UPDATE ".$this->chatUsersTable." 
            SET current_session = '".$to_user_id."' 
            WHERE user_id = '".$from_user_id."'";        
        $this->statement = $this->connection->prepare($sqlUserUpdate);
        $this->statement->execute();
        $data = array(
            "userSection" => $userSection,
            "conversation" => $conversation         
         );
         echo json_encode($data);       
    }   
    public function getUnreadMessageCount($senderUserid, $recieverUserid) {
        $sqlQuery = "
            SELECT * FROM ".$this->chatTable."  
            WHERE sender = '$senderUserid' AND receiver = '$recieverUserid' AND message_status = '1'";
        $numRows = $this->getNumRows($sqlQuery);
        $output = '';
        if($numRows > 0){
            $output = $numRows;
        }
        return $output;
    }   
	}
?>