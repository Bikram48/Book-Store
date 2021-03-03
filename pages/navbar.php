<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
          <a class="navbar-brand" href="index.php"><img width="70" height="60" src="../images/website_logo.svg"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end navitems" id="navbarNav">
            <ul class="navbar-nav">
              <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a style="color:black;" class="nav-link" href="index.php">HOME </a>
              </li>
              <li class="nav-item">
                <a style="color:black;" class="nav-link" href="#">ABOUT</a>
              </li>
              <li class="nav-item">
                <a style="color:black;" class="nav-link" href="#">CONTACT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="addClass" href="#"><i style="padding:0px;" class="fas fa-search"></i></a>
              </li>

              <li class="nav-item">
                <a class="nav-link"  href="login.php"><i class="fas fa-user"></i></a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-shopping-bag"></i></a>
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

  <script>
    $(function() {
      $("#addClass").click(function() {
        $('#qnimate').addClass('popup-box-on');
      });

      $("#removeClass").click(function() {
        $('#qnimate').removeClass('popup-box-on');
      });
    })
  </script>
</body>

</html>