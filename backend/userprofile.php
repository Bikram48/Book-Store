<?php
    require_once "db_connect.php";
    function updateUser($username,$email,$image,$userid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"UPDATE user SET username='$username',email='$email',image='$image' WHERE userid=$userid");
        if($query){
        }  
    }

    function checkUsername($username,$userid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"SELECT * FROM user WHERE userid<>$userid");
        while($row=mysqli_fetch_assoc($query)){
            if($row['username']==$username){
               return true; 
            }
         
        }
        return false;
    }

    function checkEmail($email,$userid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"SELECT * FROM user WHERE userid<>$userid");
        while($row=mysqli_fetch_assoc($query)){
          
            if($row['email']==$email){
                return true;
            }
        }
        return false;
    }
?>