<?php include "navbar.php" ?>
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
    <div class="container">
        <div class="cart">
            <div class="products">
                <div class="product">
                    <img src="../images/steve.jpg">
                    <div class="product-info">
                        <div class="product-name">
                            Steve Jobs
                        </div>
                        <div class="product-price">
                            $10.0
                        </div>
                        <p class="product-quantity">
                            <input value="1" name="">
                        </p>
                        <p class="product-edit">
                        <i class="far fa-edit"></i>
                            <span class="edit">Edit</span>
                        </p>
                        <p class="product-remove">
                            <i class="fa fa-trash"></i>
                            <span class="remove">Remove</span>
                        </p>
                    </div>
                </div>
                <div class="product">
                    <img src="../images/steve.jpg">
                    <div class="product-info">
                        <div class="product-name">
                            Steve Jobs
                        </div>
                        <div class="product-price">
                            $10.0
                        </div>
                        <p class="product-quantity">
                            <input value="1" name="">
                        </p>
                        <p class="product-edit">
                            <i class="fa fa-trash"></i>
                            <span class="edit">Edit</span>
                        </p>
                        <p class="product-remove">
                            <i class="fa fa-trash"></i>
                            <span class="remove">Remove</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="cart-total">

			<p>

				<span>Total Price</span>

				<span>$100</span>

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