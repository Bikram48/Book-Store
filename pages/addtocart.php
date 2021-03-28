<?php ob_start();
include "navbar.php"
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
    require_once "../backend/db_connect.php";
    $db_connection = new Connection();
    if (isset($_GET['action']) == 'clear') {
        if (isset($_COOKIE['cartitem'])) {
            setcookie('cartitem', "", time() - (86400 * 30));
        }
        if (isset($_SESSION['userid'])) {
            $userid = $_SESSION['userid'];
            $query = mysqli_query($db_connection->getConnection(), "DELETE FROM cart WHERE fk1_userid=$userid");
        }
    }
    ?>
    <div class="container">
        <div class="cart">
            <div class="products">
                <a href="addtocart.php?action=clear"><button class="remove-all">Remove All</button></a>
                <?php
                include "../backend/cookie_handler.php";
                require_once "../backend/cart.php";
                if (isset($_POST['submit'])) {
                    $quantity = $_POST['quantity'];
                    $productid = $_POST['productid'];
                    if (isset($_COOKIE['cartitem'])) {
                        updateQuantity($productid, $quantity);
                    }
                    if (isset($_SESSION['userid'])) {
                        $userid = $_SESSION['userid'];
                        $query = mysqli_query($db_connection->getConnection(), "SELECT cart_id FROM cart WHERE fk1_productid=$productid AND fk1_userid=$userid");
                        $row = mysqli_fetch_assoc($query);
                        $cartid = $row['cart_id'];
                        $cartObj = new Cart($productid, $quantity, $userid);
                        $cartObj->updateCart($cartid);
                    }
                }
                if (isset($_GET['pid'])) {
                    if (isset($_COOKIE['cartitem'])) {
                        removeProduct($_GET['pid']);
                    }
                    if (isset($_SESSION['userid'])) {
                        $cartObj = new Cart($_GET['pid'], 1, $_SESSION['userid']);
                        if ($cartObj->removeProduct() == true) {
                            //echo "Removed successfully";
                        }
                    }
                }
                $total_price = 0;
                $total_item = 0;
                if (isset($_COOKIE['cartitem'])) {
                    $cookie_data = stripslashes($_COOKIE['cartitem']);
                    $cart_data = json_decode($cookie_data, true);

                    foreach ($cart_data as $key => $values) {
                        $pid = $values['item_id'];
                        $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM product WHERE productid=$pid");
                        while ($row = mysqli_fetch_assoc($query)) {
                            $price = $row['price'];
                            $quantity = $values['item_quantity'];
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
                                        <?php echo $row['price'] ?>
                                    </div>
                                    <form method="POST" action="addtocart.php">
                                        <input type="hidden" value="<?php echo $row['productid']; ?>" name="productid">
                                        <p class="product-quantity">
                                            <input value=<?php echo $values['item_quantity'] ?> name="quantity">
                                        </p>
                                        <p class="product-edit">
                                            <button style="background: none;border:none;" type="submit" name="submit">Edit</button>
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
                if (isset($_SESSION['userid'])) {
                    $userid = $_SESSION['userid'];
                    $query = mysqli_query($db_connection->getConnection(), "SELECT p.*,c.quantity FROM product p,cart c,user u WHERE u.userid=c.fk1_userid AND p.productid=c.fk1_productid AND c.fk1_userid=$userid");
                    while ($row = mysqli_fetch_assoc($query)) {
                        $pid = $row['productid'];
                        $price = $row['price'];
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
                                    <?php echo $row['price'] ?>
                                </div>
                                <form method="POST" action="addtocart.php">
                                    <input type="hidden" value="<?php echo $row['productid']; ?>" name="productid">
                                    <p class="product-quantity">
                                        <input value=<?php echo $row['quantity'] ?> name="quantity">
                                    </p>
                                    <p class="product-edit">
                                        <button style="background: none;border:none;" type="submit" name="submit">Edit</button>
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
                } ?>
            </div>
            <div class="cart-total">
                <div class="row">
                    <div class="col-xl-12">
                        <p>

                            <span>Total Price</span>

                            <span>$ <?php echo $total_price ?></span>

                        </p>
                    </div>
                    <div class="col-xl-12">
                        <p>

                            <span>Number of Items</span>

                            <span><?php echo $total_item ?></span>
                        </p>
                    </div>
                    <div class="col-xl-12">
                        <form action="../sandbox_integration/payments.php" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="upload" value="1">
                            <input type="hidden" name="no_note" value="1">
                            <input type="hidden" name="lc" value="UK">
                            <?php
                            if (isset($_SESSION['userid'])) {
                                $i = 0;
                                $userid = $_SESSION['userid'];
                                $query = mysqli_query($db_connection->getConnection(), "SELECT p.*,c.quantity FROM product p,cart c,user u WHERE u.userid=c.fk1_userid AND p.productid=c.fk1_productid AND c.fk1_userid=$userid");
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $i++;
                                    $name = $row['product_name'];
                                    $productid = $row['productid'];
                                    $quantity = $row['quantity'];
                                    $price = $row['price'];
                            ?>
                                    <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $name; ?>">

                                    <input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>">

                                    <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $price; ?>">

                                    <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $quantity; ?>">
                                    <input type="hidden" name="rm" value="2">
                                   <input type="hidden" name="return" value="http://localhost/book_store/sandbox_integration/successpage.php">
                            <?php }
                            } ?>
                            <button type="submit" name="submit" border="0">Pay with paypal &nbsp;&nbsp;<img height="30px;" src="../images/rsz_paypal.png"></button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
<?php include "footer.php" ?>