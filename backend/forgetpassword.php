<?php
    require_once "db_connect.php";
    function checkEmailExisting($email){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"SELECT * FROM user WHERE email='$email'");
        $row=mysqli_num_rows($query);
        if($row>0){
            return true;
        }
        return false;
    }

    
    function sendPasswordVerifiactionCode($email){
        require '../phpmailer/PHPMailerAutoload.php';
        $content='';
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'mcneesebookstoreofficial@gmail.com';                 // SMTP username
        $mail->Password = 'Mcneese123@';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('mcneesebookstoreofficial@gmail.com', 'McneeseBookstore');
        $mail->addAddress($email);               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);     
        $content.="<p>Your password can be reset by clicking the link below.</p>";                             // Set email format to HTML
        $content.="<a href=http://localhost/book_store/pages/passwordreset.php?email=$email>Click Here</a>";
        $mail->Subject = "Password Reset Request For McNeeseBookstore";
        $mail->Body    = $content;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }

    function updatePassword($password,$email){
        $connection=new Connection();
        $query=mysqli_query($connection->getConnection(),"UPDATE user SET password='$password' WHERE email='$email'");
        if($query){
            return true;
        }
        return false;
    }
?>