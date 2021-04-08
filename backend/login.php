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
            $query=mysqli_query($this->connection->getConnection(),"SELECT * FROM user WHERE username='$username' AND password='$pwd'");
            $row=mysqli_fetch_assoc($query);
            $count=mysqli_num_rows($query);
            if($count==1){
                if($row['status']==0){
                    $_SESSION['userid']=$row['userid'];
                    $_SESSION['customer_id']=$row['userid'];
                    $_SESSION['username']=$usernameoremail;
                    $_SESSION['email']=$row['email'];
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

        public function adminLogin($usernameoremail,$password){
            $username=mysqli_real_escape_string($this->connection->getConnection(),$usernameoremail);
            $password=mysqli_real_escape_string($this->connection->getConnection(),$password);
            $query=mysqli_query($this->connection->getConnection(),"SELECT * FROM user WHERE username='$username' AND password='$password'");
            $row=mysqli_fetch_assoc($query);
            $count=mysqli_num_rows($query);
            if($count==1){
                if($row['status']==1){
                    $_SESSION['adminid']=$row['userid'];
                    $_SESSION['admin_username']=$usernameoremail;
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

        public function getUserId($usernameoremail,$password){
            $userid=0;
            $username=mysqli_real_escape_string($this->connection->getConnection(),$usernameoremail);
            $password=mysqli_real_escape_string($this->connection->getConnection(),$password);
            $query=mysqli_query($this->connection->getConnection(),"SELECT * FROM user WHERE username='$username' AND password='$password'");
            $row=mysqli_fetch_assoc($query);
            $count=mysqli_num_rows($query);
            if($count==1){
                if($row['status']==1){
                    $userid=$row['userid'];
                }
            }

            return $userid;
        }

    }
?>