<?php
    require "dbconnection.php";
    class Operations extends Connection {
        private $statement;
        public function RegisterUser($Firstname,$Lastname,$Username,$Password,$Account,$filePath,$aboutMe) {
			$sql = "INSERT INTO users (firstName,lastName,userName,passwrd,bkAccount,portfolio,aboutMe) VALUES ('$Firstname','$Lastname','$Username','$Password','$Account','$filePath','$aboutMe')";
	        $this->statement = $this->connection->prepare($sql);
        	if($this->statement->execute()){
                header("location: loginForm.php");
            }
        }
        public function RegisterClub($clubname,$leadername,$career,$Camp,$pass,$status,$account) {
			$sql = "INSERT INTO clubs (clubName,clubleader,field,campName,grouppassword,bkAccount,aboutClub) VALUES ('$clubname','$leadername','$career','$Camp','$pass','$account','$status')";
	        $this->statement = $this->connection->prepare($sql);
        	if($this->statement->execute()){
                header("location: loginForm.php");
            }
        }
        public function getByParam($var1=null,$var2 = null){
            if (!is_null($var1) && is_null($var2)) {
                $sql = "SELECT * FROM $var1";
                $this->statement = $this->connection->prepare($sql);
                $this->statement->execute();
                return $this->statement->fetchAll(PDO::FETCH_ASSOC);
            }
            elseif (!is_null($var1) && !is_null($var2)) {
                $sql = "SELECT * FROM clubs WHERE clubName=:username AND grouppassword=:pwrd";
                $this->statement = $this->connection->prepare($sql);
                $this->statement->bindParam(':username',$var1);
                $this->statement->bindParam(':pwrd',$var2);
               $this->statement->execute();
               return $this->statement->rowcount();
            }
        }
        public function findexts ($filename){ 
            $filename = strtolower($filename) ; 
            $exts = split("[/\\.]", $filename) ; 
            $n = count($exts)-1; 
            $exts = $exts[$n]; 
            return $exts; 
        }
    }
?>