<?php
    session_start();
    require_once("../backend/config.php"); 
    $db_connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
          $payer_email=$_POST['payer_email'];
          $payer_status=$_POST['payer_status'];
          $txn_id=$_POST['txn_id'];
          $payment_gross=$_POST['payment_gross'];
          $num_cart_items=(int)$_POST['num_cart_items'];
      
        $customer_id=$_SESSION['customer_id'];
        if($customer_id){
          $query=mysqli_query($db_connection,"INSERT INTO payments(item_number,txn_id,payment_gross,payment_status,fk1_userid) VALUES($num_cart_items,'$txn_id',$payment_gross,'$payer_status',19)");
        }
    ?>
    <h1>Your Payment Is Successful</h1>
    <a href="../pages/index.php">Go to homepage</a>
</body>
</html>
