<?php
    require_once("config.php");
    class Connection{
        private $db_connection;
        function __construct()
        {
            $this->db_connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABSE);
            if(mysqli_connect_errno()){
                echo "Connection error occurred: ".mysqli_connect_error();
                exit();
            }
            else{
               
            }
        
        }

        public function getConnection(){
            return $this->db_connection;
        }
    }
?>