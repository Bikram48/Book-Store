<?php include "navbar.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/userprofile.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "../backend/db_connect.php";
    $connection = new Connection();

    $query = mysqli_query($connection->getConnection(), "SELECT * FROM user WHERE userid=$userid");
    $row = mysqli_fetch_assoc($query);
    $image = $row['image'];
    $username = $row['username'];
    $email = $row['email'];
    ?>
    <?php
    include "../backend/image_handler.php";
    require_once "../backend/userprofile.php";
    require_once "../backend/signup.php";

    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
    }
    if (isset($_POST['submit'])) {
        $obj = new RegisterUser();
        $error = "";
        $usernameError = $emailError = "";
        $imageName = "";
        $username = $_POST['username'];
        $email = $_POST['email'];
        $file = $_FILES['file'];
        if (strlen($username) < 5) {
            $usernameError .= "username must be at least 5 characters long ";
        } elseif (checkUsername($username, $userid) == true) {
            $error = true;
            $usernameError .= "Username is already taken";
        } else if (checkEmail($email, $userid) == true) {
            $error = true;
            $emailError .= "Email is aready existed please choose another one!!";
        } else {
            if ($_FILES['file']['name'] == "") {  
                if($image!==""){           
                    $imageName = $image;  
                }         
            }
            else{
                if (checkFileExtension($file)) {
                    $imageName = uploadFile($file);
                } else {
                    if($image!==""){           
                        $imageName = $image;  
                    } 
                    echo '<script language="javascript">';
                    echo 'alert("Invalid Image Extension!!")';
                    echo '</script>';
                }
            }
            
            if (!$error) {
                updateUser($username, $email, $imageName, $userid);
            }
        }
    }
    ?>
    <div class="container">
        <form method="POST" action="userprofile.php" enctype="multipart/form-data">
            <div class="row userprofile">

                <div class="col-md-6 mb-4 text-center">
                    <img class="rounded-circle" width="400px" height="400px" src="../avatars/<?php echo $image ?>" data-holder-rendered="true">
                    <h1><?php echo $username; ?></h1>

                    <input type="file" name="file">

                </div>
                <div class="col-md-6 box">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $username; ?>" placeholder="Enter Username" required>
                        <small id="emailHelp" class="form-text text-muted"><?php if (isset($usernameError)) {
                                                                                echo $usernameError;
                                                                            } ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="<?php echo $email; ?>" placeholder="Enter Email" required>
                        <small id="emailHelp" class="form-text text-muted"><?php if (isset($emailError)) {
                                                                                echo $emailError;
                                                                            } ?></small>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
    <div style="margin-top:200px;">
        <?php include "footer.php" ?>
    </div>
</body>

</html>