<?php 
ob_start();
include "navbar.php";
require_once "../backend/db_connect.php";
include_once "../backend/cart.php";
$db_connection = new Connection();
$error = "";
if (isset($_GET['genre'])) {
    $category = $_GET['genre'];
    $_SESSION['category'] = $category;
}

if (isset($_SESSION['category'])) {
    $cat = $_SESSION['category'];
}

if (isset($_POST['submit'])) {
    $productid = $_POST['pid'];
    $quantity = 1;
    if (isset($_SESSION['userid'])) {
        $cartObj=new Cart($productid,$quantity,$_SESSION['userid']);
        echo "Total cart items: ".$cartObj->checkProductExistence();
        if($cartObj->checkProductExistence()==0){
            $cartObj->insertItem();
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("This product is already in cart")';
            echo '</script>';
        }
        header("Location:addtocart.php");
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
        ob_end_flush();
        if (!$error) {
            header("Location:addtocart.php");
        }
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/booklist.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container banner">
        <div class="row">
            <div class="col-xl-1 col-lg-0 col-md-0 col-sm-0 col-0"></div>
            <div class="col-xl-6 col-lg-7 col-md-7 col-4 col-sm-6">
                <div class="row contents">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab vero molestias neque soluta quidem rerum, laboriosam facere cumque reiciendis, labore dolor nulla ut sed eveniet porro excepturi velit? Suscipit, fugiat!
                </div>
                <div class="row banner-title">
                    <h1>Don't stop reading</h1>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-8 image">
                <img class="img-fluid" src="../images/model1.jpg">
            </div>
            <div class="col-xl-2 col-sm-0 col-0"></div>
        </div>
        <?php
        $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM product WHERE category='$cat'");
        while ($row = mysqli_fetch_assoc($query)) {
            $productid = $row['productid'];
        ?>
            <div class="row book-items">
                <div class="col-xl-1 col-lg-1 col-sm-3"></div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 image-box">
                    <img class="img-fluid" src="../images/<?php echo $row['image'] ?>" alt="">
                </div>
                <div class="col-xl-7 col-lg-7 col-md-8 col-sm-6 book-contents">
                    <h3 class="product_title"><?php echo $row['product_name']; ?></h3>
                    <p style="font-style: italic;font-weight:bolder;"><?php echo $row['category']; ?></p>
                    <p style="font-weight: bolder;">$<?php echo $row['price']; ?></p>
                    <div class="description">
                        <p><?php echo $row['description']; ?></p>
                    </div>
                    <form method="POST" action="booklist.php">
                        <input type="hidden" name="pid" value="<?php echo $productid ?>">
                        <button type="submit" class="addtocart" name="submit">ADD TO CART</button>
                        <button class="addtocart"><?php echo "<a style=color:white;text-decoration:none; href='productdescription.php?productid=$productid'>PRODUCT DETAILS</a>" ?></button>
                    </form>
                </div>
            </div>
        <?php } ?>

    </div>
    <div style="margin-top:400px;">
        <?php include "footer.php" ?>
    </div>
</body>

</html>