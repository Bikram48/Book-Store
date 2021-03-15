<?php include "navbar.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomos Watch</title>
    <link rel="stylesheet" href="../styles/productdescription.css">
</head>
<body>
    <div class="container">
    <?php 
        require_once "../backend/db_connect.php";
        $db=new Connection();
        if(isset($_GET['productid'])){
            $productid=$_GET['productid'];
        }
            $query=mysqli_query($db->getConnection(),"SELECT * FROM product WHERE productid=$productid");
            while($row=mysqli_fetch_assoc($query)){
        
    ?>
        <div class="cardsss">
            <div class="images">
                <h2><?php echo $row['product_name'] ?></h2>
                <div class="slider"><img id="big-image" src="../images/<?php echo $row['image']?>" alt=""></div>
            </div>
            <div class="infos">
                <h5><?php echo $row['product_name'] ?></h5>
                <h6><i><?php echo $row['category'] ?></i></h6>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price">
                    <h3><?php echo $row['price']; ?>$</h3>
                </div>
                <div id="more-infos">
                    <h5 class="choose">Description</h5>
                </div>
                <div id="info-content">
                    <p  class="paragraph" style="display: block;"><?php echo $row['description'] ?></p>
                </div>
                <div class="quantity">
                    <h3>QUANTITY</h3>
                <input type="number" name="items" id="counter" min="1" value="1">
            </div>
                <div class="buttons">
                    <a href="addtocart.php"><button id="add-to-cart"><i class="fas fa-shopping-cart"></i>ADD TO CART</button></a>
                    <button>BUY NOW</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</body>
</html> 

<?php include "footer.php" ?>