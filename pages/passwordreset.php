<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/signup.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
    require_once "../backend/forgetpassword.php";
    $error1 = $error2 = $error3 = $error4 =$error5= "";
    $loginBtn='';
    if(isset($_GET['email'])){
        $_SESSION['email']=$_GET['email'];
    }
    $email=$_SESSION['email'];
    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];
        if ($password != $repeat_password) {
            $error1 = "Password is not matching";
        } elseif (strlen($password) < 6) {
            $error3 .= "Password must be at least 6 characters long";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $error3 .= "Password must contain at least one number";
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $error3 .= "Password must contain at least one capital letter";
        } elseif (!preg_match("#[\W]+#", $password)) {
            $error3 .= "Password must contain at least one special character";
        } 
        else{
            if(updatePassword($password,$email)==true){
                $loginBtn.=true; ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Your password is changed! Now Login by clicking the login button
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php
            }
        }
        }
    ?>
<div class="container" style="margin-bottom: 80px;">
        <h2 id="headerText">PASSWORD RESET</h1>
            <div class="row login-section">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <form action="passwordreset.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input disabled name="email" style="border-radius: 0%;" type="email" value="<?php echo $email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" style="border-radius: 0%;" type="password" class="form-control" id="exampleInputPassword1" required>
                            <small id="error" class="form-text text-muted">
                                <p class="error-text"><?php if (isset($error3)) {
                                                            echo $error3;
                                                        } ?></p>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Repeat Password</label>
                            <input name="repeat_password" style="border-radius: 0%;" type="password" class="form-control" id="exampleInputPassword1" required>
                            <small id="error" class="form-text text-muted">
                                <p class="error-text"><?php if (isset($error1)) {
                                                            echo $error1;
                                                        } ?></p>
                            </small>
                        </div>
                        <button style="width: 100%;position:relative;left:0;" class="login-btn" type="submit" name="submit" class="btn btn-primary">RESET PASSWORD</button><br><br>
                      
                    </form>
                    <?php if($loginBtn==true){ ?>
                            <a href="login.php"><button style="width: 100%;position:relative;left:0;" class="login-btn"  name="submit" class="btn btn-primary">LogIn</button></a>
                        <?php } ?>
                </div>
                <div class="col-xl-3"></div>
            </div>
    </div>
</body>
</html>