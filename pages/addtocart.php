<?php
ob_start();
require_once "navbar.php";
require_once "../backend/cart.php";
require_once "../backend/db_connect.php";
require_once "../backend/cookie_handler.php";
require_once "../backend/discounthandler.php";
$db_connection = new Connection();
if (isset($_GET['action']) == 'clear') {
    if (isset($_COOKIE['cartitem'])) {
        setcookie('cartitem', "", time() - (86400 * 30));
    }
}
if (isset($_COOKIE['cartitem'])) {
    if (isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $productid = $_POST['productid'];
        updateQuantity($productid, $quantity);
    }
}
if (isset($_GET['pid'])) {
    if (isset($_COOKIE['cartitem'])) {
        removeProduct($_GET['pid']);
    }
}
$total_item = 0;
if (isset($_SESSION['userid'])) {
    if (isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $productid = $_POST['productid'];
        $userid = $_SESSION['userid'];
        $query = mysqli_query($db_connection->getConnection(), "SELECT cart_id FROM cart WHERE fk1_productid=$productid AND fk1_userid=$userid");
        $row = mysqli_fetch_assoc($query);
        $cartid = $row['cart_id'];
        $cartObj = new Cart($productid, $quantity, $userid);
        $cartObj->updateCart($cartid);
    }
}
if (isset($_GET['pid'])) {
    if (isset($_SESSION['userid'])) {
        $cartObj = new Cart($_GET['pid'], 1, $_SESSION['userid']);
        if ($cartObj->removeProduct() == true) {
            //echo "Removed successfully";
        }
    }
}
$total_price = 0;
if (isset($_GET['action']) == 'clear') {
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $query = mysqli_query($db_connection->getConnection(), "DELETE FROM cart WHERE fk1_userid=$userid");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/addtocart.css">
    <title>Document</title>
</head>

<body>
    <?php

    ?>
    <div class="container">
        <div class="cart">
            <div class="products">

                <?php

                if (isset($_COOKIE['cartitem'])) {
                    $cookie_data = stripslashes($_COOKIE['cartitem']);
                    $cart_data = json_decode($cookie_data, true);

                    foreach ($cart_data as $key => $values) {
                        $pid = $values['item_id'];
                        $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM product WHERE productid=$pid");
                        while ($row = mysqli_fetch_assoc($query)) {
                            if (checkexisted_discount($row['productid']) > 0) {
                                $price = priceafterdiscount($row['productid']);
                            } else {
                                $price = $row['price'];
                            }
                            $quantity = $values['item_quantity'];
                            $total_price = $total_price + $price * $quantity;
                            $total_item++;
                            if ($total_item > 0) {
                ?>
                                <div class="product">
                                    <img src="../images/<?php echo $row['image'] ?>">
                                    <div class="product-info">
                                        <div class="product-name">
                                            <?php echo $row['product_name'] ?>
                                        </div>
                                        <div class="product-price">

                                            <?php if (checkexisted_discount($row['productid']) > 0) { ?>
                                                <del><?php echo "$" . $row['price'] ?></del><?php $price = priceafterdiscount($row['productid']);
                                                                                            echo " $" . $price; ?>
                                            <?php } else {
                                                echo "$" . $row['price'];
                                            } ?>
                                        </div>
                                        <form method="POST" action="addtocart.php">
                                            <input type="hidden" value="<?php echo $row['productid']; ?>" name="productid">

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                <input type="number" value=<?php echo $values['item_quantity'] ?> name="quantity">
                                            </div>
                                            <p class="product-edit">
                                            <button  type="submit" name="submit"><i class="fas fa-edit"></i>quantity</button>
                                            </p>
                                        </form>
                                        <?php echo "<a href='addtocart.php?pid=$pid'>" ?>
                                        <p class="product-remove">
                                            <i class="fa fa-trash"></i>
                                            <span class="remove">Remove</span>
                                        </p>
                                        </a>
                                    </div>
                                </div>
                <?php }
                        }
                    }
                }

                ?>

                <?php
                if (isset($_SESSION['userid'])) {
                    $userid = $_SESSION['userid'];
                    $query = mysqli_query($db_connection->getConnection(), "SELECT p.*,c.quantity FROM product p,cart c,user u WHERE u.userid=c.fk1_userid AND p.productid=c.fk1_productid AND c.fk1_userid=$userid");
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            $pid = $row['productid'];
                            if (checkexisted_discount($row['productid']) > 0) {
                                $price = priceafterdiscount($row['productid']);
                            } else {
                                $price = $row['price'];
                            }
                            $quantity = $row['quantity'];
                            $total_price = $total_price + $price * $quantity;
                            $total_item++;
                ?>
                            <div class="product">
                                <img src="../images/<?php echo $row['image'] ?>">
                                <div class="product-info">
                                    <div class="product-name">
                                        <?php echo $row['product_name'] ?>
                                    </div>
                                    <div class="product-price">

                                        <?php if (checkexisted_discount($row['productid']) > 0) { ?>
                                            <del><?php echo "$" . $row['price'] ?></del><?php $price = priceafterdiscount($row['productid']);
                                                                                        echo " $" . $price; ?>
                                        <?php } else {
                                            echo "$" . $row['price'];
                                        } ?>
                                    </div>
                                    <form method="POST" action="addtocart.php">
                                        <input type="hidden" value="<?php echo $row['productid']; ?>" name="productid">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <input type="number" value=<?php echo $row['quantity'] ?> name="quantity">
                                        </div>
                                        <p class="product-edit">
                                            <button  type="submit" name="submit"><i class="fas fa-edit"></i>quantity</button>
                                        </p>
                                    </form>
                                    <?php echo "<a href='addtocart.php?pid=$pid'>" ?>
                                    <p class="product-remove">
                                        <i class="fa fa-trash"></i>
                                        <span class="remove">Remove</span>
                                    </p>
                                    </a>
                                </div>
                            </div>
                    <?php }
                    }
                }
                if ($total_item > 0) { ?>
                    <a href="addtocart.php?action=clear"><button class="remove-all">Remove All</button></a>
                <?php }
                if ($total_item == 0) {
                    echo "<h1 style=text-align:center;>No items in cart</h1>";
                }
                $_SESSION['totalPrice'] = $total_price;  ?>
            </div>
            <?php if ($total_item > 0) { ?>
                <div class="cart-total">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <p>

                                <span>Total Price</span>

                                <span>$ <?php echo $total_price ?></span>

                            </p>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <p>

                                <span>Number of Items</span>

                                <span><?php echo $total_item ?></span>
                            </p>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <form action="payments.php" method="post">
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="upload" value="1">
                                <input type="hidden" name="no_note" value="1">
                                <input type="hidden" name="currency_code" value="USD">
                                <?php
                                $i = 0;
                                if (isset($_SESSION['userid'])) {
                                    $query = mysqli_query($db_connection->getConnection(), "SELECT p.*,c.quantity FROM product p,cart c,user u WHERE u.userid=c.fk1_userid AND p.productid=c.fk1_productid AND c.fk1_userid=$userid");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $i++;
                                        $name = $row['product_name'];
                                        $productid = $row['productid'];
                                        $quantity = $row['quantity'];
                                        if (checkexisted_discount($row['productid']) > 0) {
                                            $price = priceafterdiscount($row['productid']);
                                        }
                                        else{
                                            $price = $row['price'];
                                        }
                                ?>
                                        <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $name; ?>">

                                        <input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>">

                                        <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $price; ?>">

                                        <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $quantity; ?>">
                                        <input type="hidden" name="return" value="http://localhost/book_store/sandbox_integration/successpage.php">
                                <?php }
                                }
                                ?>
                                <?php if (isset($_SESSION['userid'])) { ?>
                                    <button type="submit" name="submit" border="0">Pay with paypal &nbsp;&nbsp;<img height="30px;" src="../images/rsz_paypal.png"></button>
                                <?php } else { ?>
                                    <button border="0">Login to checkout</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</body>
<script src="../scripts/input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner();
</script>

</html>
<?php include "footer.php" ?>