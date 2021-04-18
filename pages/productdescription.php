<?php
ob_start();
include "navbar.php";
require_once "../backend/discounthandler.php";
if (isset($_POST['submit'])) {
    $error = "";
    $productid = $_POST['pid'];
    $quantity = $_POST['quantity'];
    if (isset($_SESSION['userid'])) {
        include_once "../backend/cart.php";
        $cartObj = new Cart($productid, $quantity, $_SESSION['userid']);
        if ($cartObj->checkProductExistence() == 0) {
            $cartObj->insertItem();
        } else {
            $error = true;
            echo '<script language="javascript">';
            echo 'alert("This product is already in cart")';
            echo '</script>';
        }
        if (!$error) {
            header("Location:addtocart.php");
        }
    } else {
        if (isset($_COOKIE['cartitem'])) {
            $cookie_data = stripslashes($_COOKIE['cartitem']);
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }
        $item_id_list = array_column($cart_data, 'item_id');
        if (in_array($productid, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]['item_id'] == $productid) {
                    echo '<script language="javascript">';
                    echo 'alert("This product is already in cart")';
                    echo '</script>';
                    $error = true;
                }
            }
        } else {
            $item_array = array("item_id" => $productid, "item_quantity" => $quantity);
            $cart_data[] = $item_array;
        }
        $item_data = json_encode($cart_data);
        setcookie('cartitem', $item_data, time() + (86400 * 30));
        if (!$error) {
            header("Location:addtocart.php");
        }
    }
}
include_once "../backend/db_connect.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>
    </title>
    <link rel="stylesheet" href="../styles/productdescription.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-xl-6 col-sm-12 image-part">
                <?php
                $db_connection = new Connection();
                if (isset($_GET['productid'])) {
                    $_SESSION['productid'] = $_GET['productid'];
                }
                if (isset($_SESSION['productid'])) {
                    $pid = $_SESSION['productid'];
                }
                if (isset($_SESSION['userid'])) {
                    $userid = $_SESSION['userid'];
                }
                include "../backend/ratinghandler.php";
                if (isset($_POST['rating_submit'])) {
                    $rating_number = $_POST['rating_number'];
                    if(empty($rating_number)){
                        echo '<script language="javascript">';
                        echo 'alert("Field is empty!! Please provide the value from 1 to 5 to rate the product ")';
                        echo '</script>';
                    }
                    if (checkUserRating($userid, $pid) > 0) {
                        echo '<script language="javascript">';
                        echo 'alert("Sorry!! you have already rated this product..")';
                        echo '</script>';
                    } else {
                        insert_rating($rating_number, $userid, $pid);
                    }
                }

                $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM PRODUCT WHERE PRODUCTID=$pid");

                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="image">
                        <?php echo "<img style=height:350px; class=img-fluid  src=../images/" . $row['image'] . ">"; ?>
                    </div>

                <?php
                }

                ?>

            </div>

            <div class="col-md-6 col-xl-5 col-sm-12 description">
                <?php

                $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM PRODUCT WHERE PRODUCTID=$pid");
                while ($row = mysqli_fetch_assoc($query)) {
                    $productid = $row['productid'];

                ?>
                    <h6 class="productName"><?php echo $row['product_name']; ?></h6>
                    <?php if (checkexisted_discount($productid) > 0) { ?>
                        <p style="color: #6b6868;font-weight:bolder;" class=""> <del><?php echo "$" . $row['price']; ?></del><?php echo "  $" . priceafterdiscount($productid); ?> </p>
                    <?php } else { ?>
                        <p class=""><?php echo "$" . $row['price']; ?></p>
                    <?php } ?>
                <?php } ?>
                <div class="ratings">
                    <?php $rating = averageRating($pid);
                    if ($rating == 1) { ?>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:silver;" class="fas fa-star"></i>
                        <i style="color:silver;"  class="fas fa-star"></i>
                        <i style="color:silver;"  class="fas fa-star"></i>
                        <i style="color:silver;"  class="fas fa-star"></i>
                    <?php } elseif ($rating == 2) { ?>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:silver;"  class="fas fa-star"></i>
                        <i style="color:silver;"  class="fas fa-star"></i>
                        <i style="color:silver;"  class="fas fa-star"></i>
                    <?php } elseif ($rating == 3) { ?>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:silver;" class="fas fa-star"></i>
                        <i style="color:silver;" class="fas fa-star"></i>
                    <?php } elseif ($rating == 4) { ?>

                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:silver;"  class="fas fa-star"></i>

                    <?php } elseif ($rating == 5) { ?>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                        <i style="color:orangered;" class="fas fa-star"></i>
                    <?php } else { ?>
                        <p style="color:red;font-weight:bolder;">Not rated yet!!</p>
                    <?php } ?>



                </div>
                <?php if (isset($_SESSION['userid'])) { ?>
                    <form method="POST" action="productdescription.php">
                
                    <label for="rating">Give Rating </label> 
                    <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-12">
                        <input type="number" max="5" min="1" name="rating_number">
                        <input id="submitbtn" type="submit" value="submit" name="rating_submit">
                    </div>
                    </div>
                    </form>
                <?php } else { ?>
                    <a href="login.php">Login to rate the book</a>
                <?php
                }
                $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM PRODUCT WHERE PRODUCTID=$pid");
                while ($row = mysqli_fetch_assoc($query)) {
                    $productid = $row['productid'];
                    $total_quantity=$row['quantity'];
                ?>
                    <p class="product-description"><?php echo $row['description']; ?>Daniel Minoli has many years of telecom, networking, and IT experience with end-users, carriers, academia, and venture capitalists, including work at ARPA think tanks, Bell Telephone Laboratories, ITT, Prudential Securities,Daniel Minoli has many years of telecom, networking, and IT experience with end-users, carriers, academia, and venture capitalists, including work at ARPA think tanks, Bell Telephone Laboratories, ITT, Prudential Securities,Daniel Minoli has many years of telecom, networking, and IT experience with end-users, carriers, academia, and venture capitalists, including work at ARPA think tanks, Bell Telephone Laboratories, ITT, Prudential Securities,Daniel Minoli has many years of telecom, networking, and IT experience with end-users, carriers, academia, and venture capitalists, including work at ARPA think tanks, Bell Telephone Laboratories, ITT, Prudential Securities,
                    </p>
                    <p style="font-weight: bold;" class=""><?php echo "Items availability:  " . $row['quantity']; ?> </p>

                <?php
                }
                ?>
                <form action="productdescription.php" method="POST">
                    <input type="hidden" name="pid" value="<?php echo $productid ?>">
                    <div style="margin-left: 3px;" class="row">
                    <label for="quantity">Quantity </label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7 col-12">
                    <input id="quantity" type="number" name="quantity" value=1 min="1" max="<?php echo $total_quantity; ?>">
                    </div>
                    </div>
                   
                    <input class="adding-cart" type="submit" name="submit" value="Add to Cart">

            </div>

            <div class="col-xl-10 col-lg-10 col-md-10 bar">
                <div class="row">
                    <div class="col-xl-3 col-md-1  cart-add float-right">
                        <input class="addsubmit" type="submit" name="submit" value="Add to Cart">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div style="margin-top:300px;">
        <?php include "footer.php" ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="../scripts/input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner();
</script>

</html>