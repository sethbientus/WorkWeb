<?php
    require"configuration.php";
    class Connection extends Server{
        public $connection = false ;
        public function __construct(){
            $this->dbconnect();
        }
        public function __destruct(){
            $this->dbdisconnect();
        }
        public function dbconnect(){
            if (!($this->connection)){
                try{
                    $this->connection = new PDO("mysql:host=".Server::server.";dbname=".Server::database,Server::user,server::password);
                    $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                }
                catch (Exception $e) {
                    echo "Error".$e->getMessage();
                }
            }
            return $this->connection;
        }
        public function dbdisconnect(){
            if($this->connection){
                $this->connection = null;
            }
        }
    }
?>