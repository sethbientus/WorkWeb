<?php
	require 'dbconnection.php';
	class Operations extends dbconnection{
		private $statement;
		private $username;
 		private $motdepasse;
		public function RegisterUser($Firstname,$Lastname,$Username,$Password,$E_mail,$Dod,$country,$Sex,$filePath,$folder,$check){
			$year = date("Y");
			$sql = "INSERT INTO users (firstName,lastName,userName,password,email,age,gender,pictures,HomeCountry) VALUES ('$Firstname','$Lastname','$Username','$Password','$E_mail','$Dod','$Sex','$filePath','$country')";
			if($check !== false){
        		if ($year > $Dod){
        			$this->statement = $this->connection->prepare($sql);
        			$this->statement->execute();
					header("location: index.php? regis= Sign in Successfully...");
				}
        		else{
        			header("location: newuser.php? data= Check Your Year Of Birth!!!");
        		}	
			}
			else{
        		header("location: newuser.php? notregis= Only Photo Allowed To Be Uploaded!!!!");
    		}
    		if (isset($_POST['reset'])){
				header("location: newuser.php");	
			}
    	} 
    	public function findexts ($filename){ 
 			$filename = strtolower($filename) ; 
 			$exts = split("[/\\.]", $filename) ; 
 			$n = count($exts)-1; 
 			$exts = $exts[$n]; 
 			return $exts; 
 		}
 		public function getByParam($uname = null,$password=null){
 			if (is_null($uname) && is_null($password)) {
 				$sql = "SELECT * FROM users";
 				$this->statement = $this->connection->prepare($sql);
 				$this->statement->execute();
 				return $this->statement->fetchAll();
 			}
 			elseif (!is_null($uname) && is_null($password)) {
 				$sql = "SELECT * FROM users WHERE userName = :username ";
 				$this->statement = $this->connection->prepare($sql);
 				$this->statement->bindParam(':username',$this->username);
 				$this->username = $uname;
 				$this->statement->execute();
 				return $this->statement->fetch(PDO::FETCH_ASSOC);	
 			}
 			elseif (!is_null($uname) && !is_null($password)) {
 				$sql = "SELECT * FROM users WHERE userName=:username AND password=:Password";
 				$this->statement = $this->connection->prepare($sql);
 				$this->statement->bindParam(':username',$this->username);
 				$this->statement->bindParam(':Password',$this->motdepasse);
 				$this->username = $uname;
 				$this->motdepasse = $password;
				$this->statement->execute();
				return $this->statement->rowcount();
 			}
 		}
		public function update($firstName,$lastName,$userName,$pword,$email,$Age,$country,$sex,$id){
			$sql = "UPDATE users SET firstName='$firstName', lastName='$lastName',userName = '$userName', password = '$pword',email = '$email', age= '$Age',HomeCountry = '$country', gender='$sex' WHERE userName='$id'";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			if ($this->statement->execute()) {
				header("location: igihe.php");
			}
			else{
				header("location: update.php");
			} 
		}
		public function search($key){
			$sql = "SELECT * FROM users WHERE age = '$key' OR gender LIKE '$key%' OR email LIKE '%$key%'";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			return $this->statement->fetchAll();
		}
	}
?>
