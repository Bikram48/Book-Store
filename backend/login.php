<?php
//mysqli_query($this->connection->getConnection(),"UPDATE user SET status=1 WHERE username=$username"
    require_once("db_connect.php");
    class UserLogin{
        private $connection;
        function __construct()
        {
            $this->connection=new Connection();
        }

        public function checkUser($usernameoremail,$password){
            $username=mysqli_real_escape_string($this->connection->getConnection(),$usernameoremail);
            $password=mysqli_real_escape_string($this->connection->getConnection(),$password);
            $pwd=md5($password);
            $query=mysqli_query($this->connection->getConnection(),"SELECT * FROM user WHERE username='$username' OR email='$username' AND password='$password'");
            $row=mysqli_fetch_assoc($query);
            $count=mysqli_num_rows($query);
            if($count==1){
                if($row['status']==0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
    }
?>