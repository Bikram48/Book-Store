<?php 

 /* 
3
* PayPal and database configuration 
4
*/ 


// PayPal configuration 

 define('PAYPAL_ID', 'paypaltest511@gmail.com'); 

 define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 


 define('PAYPAL_RETURN_URL', 'http://localhost/storeophasis/paypal_integration_php/success.php'); 

 define('PAYPAL_CANCEL_URL', 'http://localhost/storeophasis/paypal_integration_php/cancel.php'); 

 define('PAYPAL_NOTIFY_URL', 'http://localhost/storeophasis/paypal_integration_php/ipn.php'); 

 define('PAYPAL_CURRENCY', 'USD'); 

 // Database configuration 

 define('DB_HOST', 'localhost'); 

 define('DB_USERNAME', 'STOREOPHASIS'); 

 define('DB_PASSWORD', 'storeophais'); 

 define('DB_NAME', 'STOREOPHASIS'); 

 // Change not required 

 define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
 ?>

 <div class="user-area dropdown float-right">
                <span href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php
                  if (isset($_SESSION['userid'])) {
                    require_once "../backend/db_connect.php";
                    $db_connection = new Connection();
                    $userid = $_SESSION['userid'];
                    $query = mysqli_query($db_connection->getConnection(), "SELECT image FROM user WHERE userid=$userid");
                    $row = mysqli_fetch_assoc($query);

                  ?>
                    <?php echo "<img class='user-avatar rounded-circle' src=../avatars/" . $row['image'] . ">"; ?>

                  <?php } else {
                    echo "<img class='user-avatar rounded-circle' src=../avatars/avatar.png>";
                  } ?>

                </spn>
                <div class="user-menu dropdown-menu">
                  <?php if (isset($_SESSION['userid']) or isset($_SESSION['adminid'])) { ?>
                    <a class="nav-link" href="userprofile.php"><i class="fa fa-user"></i> My Profile</a>
                    <a class="nav-link" href="../backend/logout.php"><i class="fa fa-power-off"></i> Logout</a>
                </div>
              <?php } else { ?>
                <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> <span style="padding-left:10px;">Login</span></a>
              <?php } ?>
              </div>