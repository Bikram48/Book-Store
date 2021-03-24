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
          if(isset($_GET['action'])=='clear'){
            setcookie('cartitem', "", time() - (86400 * 30));
        }
    ?>
    <div class="container">
        <div class="cart">
            <div class="products">
            <a href="addtocart.php?action=clear"><button class="remove-all">Remove All</button></a>
                <?php require_once "../backend/db_connect.php";
                $db_connection = new Connection();
                include "../backend/cookie_handler.php";
                if (isset($_POST['submit'])) {
                    $quantity = $_POST['quantity'];
                    $productid = $_POST['productid'];
                    updateQuantity($productid, $quantity);
                }
                if (isset($_GET['pid'])) {
                    removeProduct($_GET['pid']);
                }
            
                if (isset($_COOKIE['cartitem'])) {
                    $cookie_data = stripslashes($_COOKIE['cartitem']);
                    $cart_data = json_decode($cookie_data, true);

                    foreach ($cart_data as $key => $values) {
                        $pid = $values['item_id'];
                        $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM product WHERE productid=$pid");
                        while ($row = mysqli_fetch_assoc($query)) {
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
                } ?>
            </div>
            <div class="cart-total">

                <p>
                    <?php
                    $db_connection = new Connection();
                    $total_price = 0;
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
                            }
                        }
                    }
                    ?>
                    <span>Total Price</span>

                    <span>$ <?php echo $total_price ?></span>

                </p>

                <p>

                    <span>Number of Items</span>

                    <span>2</span>

                </p>

                <p>

                    <span>You Save</span>

                    <span>$ 1,000</span>

                </p>

                <a href="#">Proceed to Checkout</a>

            </div>
        </div>
    </div>
</body>

</html>
<?php include "footer.php" ?>