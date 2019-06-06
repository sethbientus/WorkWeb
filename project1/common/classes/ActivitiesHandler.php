<?php
	// session_start();S
	require 'ConnectionHandler.php';
	class ActivitiesHandler extends ConnectionHandler
	{
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
		public function immobilier_page_data($code){
			$sql = "CALL data_immobilier_page('$code')";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			return $this->statement->fetchall(PDO::FETCH_ASSOC);
		}
	}
?>