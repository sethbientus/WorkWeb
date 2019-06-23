<?php
    require"ConnectionHandler.php";
    class Operations extends ConnectionHandler{
        private $statement;
        private $ready  = 1;
        private $database  = "db_tact";      
        private $chatTable = 'tb_messages';
        private $chatUsersTable = 'tb_tact_users';
        // private $chatLoginDetailsTable = 'chat_login_details';
        
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
            SET user_status = '".$online."' 
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
    // public function updateTypingStatus($is_type, $loginDetailsId) {     
    //     $sqlUpdate = "
    //         UPDATE ".$this->chatLoginDetailsTable." 
    //         SET is_typing = '".$is_type."' 
    //         WHERE id = '".$loginDetailsId."'";
    //     $this->statement = $this->connection->prepare($sqlUpdate);
    //     $this->statement->execute();
    // }       
    // public function fetchIsTypeStatus($userId){
    //     $sqlQuery = "
    //     SELECT is_typing FROM ".$this->chatLoginDetailsTable." 
    //     WHERE userid = '".$userId."' ORDER BY last_activity DESC LIMIT 1"; 
    //     $result =  $this->getData($sqlQuery);
    //     $output = '';
    //     foreach($result as $row) {
    //         if($row["is_typing"] == 'yes'){
    //             $output = ' - <small><em>Typing...</em></small>';
    //         }
    //     }
    //     return $output;
    // }       
    // public function insertUserLoginDetails($userId) {       
    //     $sqlInsert = "
    //         INSERT INTO ".$this->chatLoginDetailsTable."(userid) 
    //         VALUES ('".$userId."')";
    //     $this->statement = $this->connection->prepare($sqlInsert);
    //     $this->statement->execute();
    //     $lastInsertId = $this->statement->lastInsertId();
    //     return $lastInsertId;       
    // }   
    // public function updateLastActivity($loginDetailsId) {       
    //     $sqlUpdate = "
    //         UPDATE ".$this->chatLoginDetailsTable." 
    //         SET last_activity = now() 
    //         WHERE id = '".$loginDetailsId."'";
    //     $this->statement = $this->connection->prepare($sqlUpdate);
    //     $this->statement->execute();
    // }   
    // public function getUserLastActivity($userId) {
    //     $sqlQuery = "
    //         SELECT last_activity FROM ".$this->chatLoginDetailsTable." 
    //         WHERE userid = '$userId' ORDER BY last_activity DESC LIMIT 1";
    //     $result =  $this->getData($sqlQuery);
    //     foreach($result as $row) {
    //         return $row['last_activity'];
    //     }
    // }   
    // }
}
?>