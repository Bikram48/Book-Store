<?php
session_start();
require_once("../backend/config.php");
$db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABSE);
$payer_email = $_SESSION['email'];
$payer_status = "VERIFIED";
$payment_gross = $_SESSION['totalPrice'];
$customer_id = $_SESSION['customer_id'];
if ($customer_id) {
    $query = mysqli_query($db_connection, "INSERT INTO payments(payment_gross,payment_status,fk1_userid) VALUES($payment_gross,'$payer_status',$customer_id)");
    if($query){
     
        $qry=mysqli_query($db_connection,"SELECT p.productid,c.quantity as cart_quantity,p.price,p.quantity FROM cart c,product p WHERE p.productid=c.fk1_productid AND c.fk1_userid=$customer_id"); 
        while($row=mysqli_fetch_assoc($qry)){
            $productid=$row['productid'];
            $cart_quantity=$row['cart_quantity'];
            $product_quantity=$row['quantity'];
            $quantity=$product_quantity-$cart_quantity;
            $query=mysqli_query($db_connection,"UPDATE product SET quantity=$quantity WHERE productid=$productid");
        }
    }
}

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
    <h1>Your Payment Is Successful</h1>
    <h2>Please See Your Email For The Invoice</h2>
    <?php
    require '../phpmailer/PHPMailerAutoload.php';
    $content='';
    $mail = new PHPMailer;
/*
    $query=mysqli_query($db_connection,"SELECT email from user WHERE userid=$customer_id");
    $row=mysqli_fetch_assoc($query);
    $email=$row['email'];
    */

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'mcneesebookstoreofficial@gmail.com';                 // SMTP username
    $mail->Password = 'Mcneese123@';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('mcneesebookstoreofficial@gmail.com', 'McneeseBookstore');
    $mail->addAddress($payer_email);               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'McneeseBookstore Invoice';
    $content.="Dear Valued Customer,<br> Greetings from McneeseBookstore! <br> Here is your invoice...<br>";
    $qry=mysqli_query($db_connection,"SELECT p.product_name,c.quantity,p.price FROM cart c,product p WHERE p.productid=c.fk1_productid AND c.fk1_userid=$customer_id");
    $content.='<table  width="500" border="1"><tr><th style=width:200px;>Productname</th><th style=width:100px;>Quantity</th><th style=width:100px;>Price Per Quantity</th></tr></table>';
    while($row=mysqli_fetch_assoc($qry)){
        $content.='<table  width="500" border="1"><tr><td style=width:200px;>'.$row['product_name'].'</td><td style=width:100px;>'.$row['quantity'].'</td><td style=width:100px;>'.$row['price'].'</td></tr></table>';
    }
    $content.="<table  width='500'><tr><td style=width:300px;><B>Total Price:</B></td><td style=width:100px;> <B>$ $payment_gross</B> </td> </tr>";
    $content.="<br><br><p>Thank you for your business.</p>";
    $mail->Body=$content;
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        mysqli_query($db_connection,"DELETE FROM cart WHERE fk1_userid=$customer_id");
    }
    ?>
    <a href="../pages/index.php">Go to homepage</a>
</body>

</html>