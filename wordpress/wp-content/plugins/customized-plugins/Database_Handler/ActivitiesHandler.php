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
				header("Location: ../../../../wp-admin/");
			}
		}
		public function get_Activity()
		{
			$sql = "CALL get_all_activities()";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			return $this->statement->fetchall(PDO::FETCH_ASSOC);
		}
		public function get_one_Activity($code)
		{
			$sql = "CALL get_single_activity('$code')";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			return $this->statement->fetchall(PDO::FETCH_ASSOC);
		}
		public function insert_interest($name,$act_code,$descrip){
			$sql = "CALL insert_activity_interests('$name','$act_code','$descrip')";
			$this->statement = $this->connection->prepare($sql);
			if ($this->statement->execute()) {
				header("Location: ../../../../wp-admin/");
			}
		}
		public function get_interest(){
			$sql = "CALL get_all_interests()";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			return $this->statement->fetchall(PDO::FETCH_ASSOC);
		}
		public function get_interest_with_activity(){
			$sql = "CALL get_interest_with_activity()";
			$this->statement = $this->connection->prepare($sql);
			$this->statement->execute();
			return $this->statement->fetchall(PDO::FETCH_ASSOC);
		}
		public function delete_activity($code){
			$sql = "CALL delete_activity('$code')";
			$this->statement = $this->connection->prepare($sql);
			if ($this->statement->execute()) {
				header("Location: http://localhost/wordpress/wp-admin/admin.php?page=View+activities");
			}
		}
		public function delete_activity_interest($name){
			$sql = "CALL delete_interest('$name')";
			$this->statement = $this->connection->prepare($sql);
			if ($this->statement->execute()) {
				header("Location: http://localhost/wordpress/wp-admin/admin.php?page=View+interest");
			}
		}
	}
?>