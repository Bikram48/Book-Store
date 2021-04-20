<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/navbar.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Document</title>
  <script src="https://kit.fontawesome.com/566b302374.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <nav class="navbar  navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.php"><img width="200" height="70" src="../images/website_logo.svg"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end navitems" id="navbarNav">
            <ul class="navbar-nav">
              <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
              </li>
              <li>
                <form method="POST" action="searchresult.php">
                  <select style="font-family: sans-serif;height:40px;width:107px;font-size:12px;margin:0;padding:0;border:none;background-color:#0E0E25;color:white" name="keyword_cat" style="width: 100px;height:40px;border-radius:5px;border:2px solid black;">
                    <option value="keyword">keyword search</option>
                    <option value="title">Title</option>
                    <option value="author">Author</option>
                    <option value="category">Department</option>
                  </select>
                  <input class="search-box" name="searchtxt" type="text">
                  <button style="height: 40px;width:50px;border:none;background-color:#0E0E25;" type="submit" name="submit"><i style="color:white;" class="fas fa-search"></i></button>
                </form>
              </li>
              <li class="nav-item">
                <a style="color:black;" class="nav-link" href="index.php">HOME </a>
              </li>
              <li class="nav-item">
                <a style="color:black;" class="nav-link" href="aboutus.php">ABOUT</a>
              </li>
              <li class="nav-item">
                <a style="color:black;" class="nav-link" href="contactus.php">CONTACT</a>
              </li>
              <?php if (isset($_SESSION['adminid'])) { ?>
                <li class="nav-item">
                  <a style="color:black;" class="nav-link" href="dashboard.php">DASHBOARD</a>
                </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link" href="addtocart.php"><i class="fas fa-shopping-bag"></i></a>
              </li>
              <li class="nav-item">
              <div class="user-area dropdown float-right">
                <a style="color:black;text-decoration:none;font-size:14px;" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php
                  if (isset($_SESSION['userid'])) {
                    require_once "../backend/db_connect.php";
                    $db_connection = new Connection();
                    $userid = $_SESSION['userid'];
                    $query = mysqli_query($db_connection->getConnection(), "SELECT image,username FROM user WHERE userid=$userid");
                    $row = mysqli_fetch_assoc($query);

                  ?>
                    <?php if($row['image']!=""){ echo "<img class='user-avatar rounded-circle' src=../avatars/" . $row['image'] . ">";} else{  echo "Welcome ".$row['username']; } ?>

                  <?php } else {
                    echo "<img class='user-avatar rounded-circle' src=../avatars/avatar.png>";
                  } ?>

                </a>
                <div class="user-menu dropdown-menu">
                  <?php if (isset($_SESSION['userid']) or isset($_SESSION['adminid'])) { ?>
                    <a class="nav-link" href="userprofile.php"><i class="fa fa-user"></i> My Profile</a>
                    <a class="nav-link" href="../backend/logout.php"><i class="fa fa-power-off"></i> Logout</a>
                </div>
              <?php } else { ?>
                <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> <span style="padding-left:10px;">Login</span></a>
              <?php } ?>
              </div>
              </li>
            </ul>
          </div>
        </nav>

        <div id="qnimate" class="off">
          <div id="search" class="open">
            <button data-widget="remove" id="removeClass" class="close" type="button">×</button>
            <form action="" method="" autocomplete="off">
              <input type="text" placeholder="Type search keywords here" value="" name="term" id="term">
              <button class="btn btn-lg btn-site" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>