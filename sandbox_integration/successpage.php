<?php
    session_start();
    include "../backend/checkout.php";

    $_SESSION['payer_email']=$_POST['payer_email'];
    $_SESSION['payer_status']=$_POST['payer_status'];
    $_SESSION['txn_id']=$_POST['txn_id'];
    $_SESSION['payment_gross']=$_POST['payment_gross'];
    $_SESSION['num_cart_items']=(int)$_POST['num_cart_items'];
    addPayment($_SESSION['num_cart_items'], $_SESSION['txn_id'], $_SESSION['payment_gross'],$_SESSION['payer_status'],1);
    echo "<h1>Your Payment has been received</h1>"
?>