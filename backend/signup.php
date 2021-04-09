<?php
require_once("db_connect.php");
class RegisterUser
{
    private $verification_code;
    private $connection;
    function __construct()
    {
        $this->connection = new Connection();
        $this->verification_code = md5(rand(0, 1000));
    }

    public function addUser($username, $email, $password, $image)
    {
        $username = mysqli_real_escape_string($this->connection->getConnection(), $username);
        $email = mysqli_real_escape_string($this->connection->getConnection(), $email);
        $password = mysqli_real_escape_string($this->connection->getConnection(), $password);
        $pwd = md5($password);
        $query = mysqli_query($this->connection->getConnection(), "INSERT INTO user(username,email,password,status,image,verification_code,isVerified) VALUES('$username','$email','$pwd',0,'$image','$this->verification_code','N')");
        if (!$query) {
            return false;
        }
        return true;
    }

    public function checkExistingUserName($username)
    {
        $query = "SELECT * FROM user WHERE username='$username'";
        $parse = mysqli_query($this->connection->getConnection(), $query);
        $count = mysqli_num_rows($parse);
        return $count;
    }

    public function checkExistingEmail($email)
    {
        $query = "SELECT * FROM user WHERE email='$email'";
        $parse = mysqli_query($this->connection->getConnection(), $query);
        $count = mysqli_num_rows($parse);
        return $count;
    }

    public function sendVerificationCode($email)
    {
        $query = mysqli_query($this->connection->getConnection(),"SELECT * FROM user WHERE email='$email'");
        $row=mysqli_fetch_assoc($query);
        $verification_code=$row['verification_code'];
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
        $mail->isHTML(true);                                  // Set email format to HTML
        $content.="<a href=http://localhost/book_store/pages/login.php?verification_code=$verification_code&email=$email>Click Here</a>";
        $mail->Subject = "Please verify your account";
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
}
