<?php 
    include "db_connect.php";
    function addPayment($quantity,$txn_id,$payment_gross,$status,$userid){
        $db=new Connection();
        if(checkTxnId($txn_id)==0){
            $query=mysqli_query($db->getConnection(),"INSERT INTO payments(item_number,txn_id,payment_gross,payment_status,fk1_userid) VALUES($quantity,'$txn_id',$payment_gross,'$status',19)");
        }
    }

    function checkTxnId($txn_id){
        $db=new Connection();
        $query=mysqli_query($db->getConnection(),"SELECT * from payments WHERE txn_id='$txn_id'");
        $row=mysqli_num_rows($query);
        return $row;
    }
?>