<?php
    require_once "db_connect.php";
    function insert_rating($rating_number,$userid,$productid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"INSERT INTO rating(rating_number,fk1_userid,fk2_productid) VALUES($rating_number,$userid,$productid)");
    }

    function averageRating($pid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"SELECT AVG(rating_number) from rating WHERE fk2_productid=$pid");
        $row=mysqli_fetch_assoc($query);
        $rating=(int)$row['AVG(rating_number)'];
        return $rating;
    }

    function checkUserRating($userid,$productid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"SELECT * FROM rating where fk1_userid=$userid AND fk2_productid=$productid");
        return mysqli_num_rows($query);
    }
?>