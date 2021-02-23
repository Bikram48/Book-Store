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
    <div class="container">
        <h2 id="headerText">Create Account</h1>
            <div class="row login-section">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input style="border-radius: 0%;" type="input" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input style="border-radius: 0%;" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input style="border-radius: 0%;" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Repeat Password</label>
                            <input style="border-radius: 0%;" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button class="login-btn" type="submit" class="btn btn-primary">CREATE</button>
                        <p class="create-account"><a style="color:#252757;" href="login.php">SIGN IN</a></p>
                    </form>
                </div>
                <div class="col-xl-3"></div>
            </div>
    </div>
</body>

</html>
<?php include "footer.php" ?>