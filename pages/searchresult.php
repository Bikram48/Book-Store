<?php
require_once "navbar.php";
require_once "../backend/discounthandler.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/booklist.css">
    <link rel="stylesheet" href="../styles/categorisedproduct.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <?php
        require_once "../backend/db_connect.php";
        $db = new Connection();
        $count = 0;
        require_once "../backend/search_query.php";
        if (isset($_POST['submit'])) {
            $_SESSION['keywordcat'] = $_POST['keyword_cat'];
            $_SESSION['searchtxt'] = $_POST['searchtxt'];
        }
        $query=getQuery($_SESSION['keywordcat'],$_SESSION['searchtxt']);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
            $_SESSION['search_product'] = $row['productid'];
            $count++;
        }
    


        ?>

        <h1><?php if($count>0){ echo $count;} else{ echo "No ";} ?> Items Found </h1>
        <?php if ($count > 0) { ?>
            <div class="row sorting-part">
                <div class="col-xl-12 col-sm-12">
                    <form action="sorting.php" method="POST">
                        <select class="sort" name="sorting_value" id="">
                            <option value='option'>Sorting Option</option>
                            <option value='popularity'>Popularity</option>
                            <option value='low'>Price Low To High</option>
                            <option value='high'>Price High To Low</option>
                        </select>
                        <input type="submit" name="sorting" value="SORT">
                    </form>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <?php
               if (isset($_POST['submit'])) {
                $_SESSION['keywordcat'] = $_POST['keyword_cat'];
                $_SESSION['searchtxt'] = $_POST['searchtxt'];
            }
            $query=getQuery($_SESSION['keywordcat'],$_SESSION['searchtxt']);
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
                    <?php if (checkexisted_discount($productid) > 0) { ?>
                        <p style="font-weight: bolder;"><del>$<?php echo $row['price']; ?></del> $<?php echo priceafterdiscount($productid); ?></p>
                    <?php } else { ?>
                        <p style="font-weight: bolder;">$<?php echo $row['price']; ?></p>
                    <?php } ?>
                   
                    <div class="description">
                        <p><?php echo $row['description']; ?></p>
                    </div>
                    <form method="POST" action="booklist.php">
                        <input type="hidden" name="pid" value="<?php echo $productid ?>">
                        <button class="addtocart"><?php echo "<a style=color:white;text-decoration:none; href='productdescription.php?productid=$productid'>PRODUCT DETAILS</a>" ?></button>
                    </form>
                </div>
            </div>
            <?php
            }

            ?>


        </div>
    </div>


</body>

</html>
<?php include "footer.php" ?>