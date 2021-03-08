<?php
require_once("db_connect.php");
class RegisterUser
{
    private $connection;
    function __construct()
    {
        $this->connection=new Connection();
    }

    public function addUser($username, $email, $password)
    {
        $username=mysqli_real_escape_string($this->connection->getConnection(),$username);
        $email=mysqli_real_escape_string($this->connection->getConnection(),$email);
        $password=mysqli_real_escape_string($this->connection->getConnection(),$password);
        $pwd = md5($password);
        $query = mysqli_query($this->connection->getConnection(), "INSERT INTO user(username,email,password,status) VALUES('$username','$email','$pwd',0)");
        if (!$query) {
            return false;
        }
        return true;
    }

    public function checkExistingUserName($username){
        $query="SELECT * FROM user WHERE username='$username'";
        $parse=mysqli_query($this->connection->getConnection(),$query);
        $count=mysqli_num_rows($parse);
        return $count ;
    }

    public function checkExistingEmail($email){
        $query="SELECT * FROM user WHERE email='$email'";
        $parse=mysqli_query($this->connection->getConnection(),$query);
        $count=mysqli_num_rows($parse);
        return $count ;
    }
}
