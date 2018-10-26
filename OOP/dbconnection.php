<?php
	/*
	 created by seth
	 Date: 17/09/2018
	*/
	class dbconnection{
		private $server = "localhost";
		private $user ="root";
		private $password ="";
		private $database = "vactest";
		public $connection = false;
		public function __construct(){
			$this->dbconnect();
		}
		public function __destruct(){
			$this->dbdisconnect();
		}
		private function dbconnect(){
			if (!$this->connection){
				try{
					$this->connection = new PDO("mysql:host=$this->server;dbname=$this->database",$this->user,$this->password);
					$this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
				} 
				catch (Exception $e){
					echo "Error".$e->getMessage();
				}
			}
			return $this->connection;
		}
		private function dbdisconnect(){
			if ($this->connection){
				$this->connection = null;	
			}
		}
	}
?>