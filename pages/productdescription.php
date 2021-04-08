<?php
include "navbar.php";
 if(isset($_POST['submit'])){
    $error="";
   $productid=$_POST['pid'];
   $quantity=$_POST['quantity'];
   if (isset($_SESSION['userid'])) {
       include_once "../backend/cart.php";
       $cartObj=new Cart($productid,$quantity,$_SESSION['userid']);
       if($cartObj->checkProductExistence()==0){
           $cartObj->insertItem();
       }
       else{
           $error=true;
           echo '<script language="javascript">';
           echo 'alert("This product is already in cart")';
           echo '</script>';
       }
       if(!$error){
           header("Location:addtocart.php");
       }
   }
   else{
   if(isset($_COOKIE['cartitem'])){
       $cookie_data=stripslashes($_COOKIE['cartitem']);
       $cart_data=json_decode($cookie_data,true);
   }
   else{
       $cart_data=array();
   }
   $item_id_list=array_column($cart_data,'item_id');
   if(in_array($productid,$item_id_list)){
       foreach($cart_data as $keys=>$values){
           if($cart_data[$keys]['item_id']==$productid){
               echo '<script language="javascript">';
                 echo 'alert("This product is already in cart")';
                 echo '</script>';
               $error=true;
           }
       }
   }
   else{
       $item_array=array("item_id" => $productid,"item_quantity"=> $quantity);
       $cart_data[] = $item_array;
   }
   $item_data=json_encode($cart_data);
   setcookie('cartitem',$item_data,time()+ (86400 * 30));
   ob_end_flush();
   if(!$error){
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
    <link rel="stylesheet" href="../script/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background-image: linear-gradient(to bottom right , #f7f7f7 , #faeee7);">

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

                ?>
                    <h1><?php echo $row['product_name']; ?></h1>
                <?php } ?>
                <div class="ratings">

                    <i style="color:orangered;" class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>


                </div>

                <?php
                $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM PRODUCT WHERE PRODUCTID=$pid");
                while ($row = mysqli_fetch_assoc($query)) {
                    $productid = $row['productid'];
                ?>
                    <p class="product-description"><?php echo $row['description']; ?>
                    </p>

                    <p class="price"><?php echo "Price: £" . $row['price']; ?> </p>
                    <p class="price"><?php echo "Total Items :  " . $row['quantity']; ?> </p>

                <?php
                }
                ?>

                <form action="productdescription.php" method="POST">
                    <input type="hidden" name="pid" value="<?php echo $productid ?>">
                    <label for="quantity">Quantity</label>
                    <input id="quantity" type="text" name="quantity" value=1>
                    <input class="adding-cart" type="submit" name="submit" value="Add to Cart">



                    <!--<div style="margin-top:100px;width:520px;" class="row">
					<div class="profile-reviews tab">
                        <h1>Your Activity</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus voluptate ab odio sapiente quibusdam excepturi animi, 
                         </p>
                    </div>
					</div>	
					-->
            </div>

            <div class="col-xl-10 col-lg-10 col-md-10 bar">
                <div class="row">
                    <?php

                    $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM PRODUCT WHERE PRODUCTID=$pid");
                    while ($row = mysqli_fetch_assoc($query)) {

                    ?>
                        <div class="col-xl-1 col-md-6 show-image">
                            <?php echo "<img style=height:50px; class=img-fluid  src=../Images/" . $row['image'] . ">"; ?>
                        </div>
                        <div class="col-xl-4 show-image">
                        <?php echo $row['product_name']; ?>
                        </div>
                        <div class="col-xl-2 col-md-1 price-show">
                            <?php echo "£." . $row['price']; ?>
                        </div>

                    <?php
                    }
                    ?>
                    <div class="col-xl-3 col-md-1  cart-add float-right">
                        <input class="addsubmit" type="submit" name="submit" value="Add to Cart">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--<div class="row rating">
				<i  class="fa fa-star" data-index="0"></i>
				<i class="fa fa-star" data-index="1"></i>
				<i class="fa fa-star" data-index="2"></i>
				<i class="fa fa-star" data-index="3"></i>
				<i  class="fa fa-star" data-index="4"></i>
			</div>
						-->


    </div>

    </div>

    <?php include "footer.php"; ?>
    <script src="../JS/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="../script/js/Faq.js"></script>

</html>