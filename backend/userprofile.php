<?php
    require_once "db_connect.php";
    function updateUser($username,$email,$image,$userid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"UPDATE user SET username='$username',email='$email',image='$image' WHERE userid=$userid");
        if($query){
        }
       
    }
?>