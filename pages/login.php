<?php include "navbar.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
       require_once "../backend/login.php";
       $error="";
       if(isset($_POST['submit'])){
       $obj=new UserLogin();
        $emailorusername=$_POST['emailorusername'];
        $password=$_POST['password'];
        if($obj->checkUser($emailorusername,$password)==true){?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Congratulations! You are successfully logged in.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <?php
        }
        else{
            $error="User doesn't exist. Please try again later!!";
        }
    }
    ?>
    <div class="container" style="margin-bottom: 200px;">
        <h2 id="headerText">Login</h1>
            <div class="row login-section">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <form method="POST" action="login.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email/Username</label>
                            <input style="border-radius: 0%;" type="input" name="emailorusername" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <small id="error" class="form-text text-muted">
                                <p class="error-text"><?php if (isset($error)) {
                                                            echo $error;
                                                        } ?></p>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input style="border-radius: 0%;" type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                        </div>
                        <button class="login-btn" type="submit" name="submit" class="btn btn-primary">SIGN IN</button>
                        <p class="create-account"><a style="color:#252757;" href="signup.php">Create account</a></p>
                    </form>
                </div>
                <div class="col-xl-3"></div>
            </div>
    </div>
</body>

</html>
<?php include "footer.php" ?>