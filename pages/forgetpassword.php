<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
<?php
    if(isset($_POST['submit'])){
        require_once "../backend/forgetpassword.php";
        $error='';
        $email=$_POST['emailorusername'];
        if(empty($email)){
            $error.="Field is empty!";
        }
        else if(checkEmailExisting($email)==false){
            $error.="Email doesn't exist,Please try again!";
        }
        else{
            if(sendPasswordVerifiactionCode($email)==true){?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Please check your email for password reset!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php }
        }
    }
?>
<div class="container" style="margin-bottom: 200px;">
        <h2 id="headerText">Forget Password</h1>
            <div class="row login-section">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <form method="POST" action="forgetpassword.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter Your Email</label>
                            <input style="border-radius: 0%;" type="input" name="emailorusername" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <small id="error" class="form-text text-muted">
                                <p class="error-text"><?php if (isset($error)) {
                                                            echo $error;
                                                        } ?></p>
                            </small>
                        </div>
                        <button class="login-btn" type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                </div>
                <div class="col-xl-3"></div>
            </div>
    </div>
</body>
</html>