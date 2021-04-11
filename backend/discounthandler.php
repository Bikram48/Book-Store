<?php 
    require_once "db_connect.php";
    function addDiscount($percentage,$pid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"INSERT INTO discount(percentage,fk1_productid) VALUES($percentage,$pid)");
    }

    function checkexisted_discount($pid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"SELECT * from discount WHERE fk1_productid=$pid");
        return mysqli_num_rows($query);
    }

    function priceafterdiscount($pid){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection()," SELECT p.price*(100.0-d.percentage)/100.0 as discount FROM product p,discount d WHERE d.fk1_productid=$pid AND p.productid=d.fk1_productid");
        $row=mysqli_fetch_assoc($query);
        $total_amount=$row['discount'];
        return $total_amount;
    }
?>