<?php
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/categorisedproduct.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <?php
        include "../backend/db_connect.php";
        $db = new Connection();
        $count = 0;
        require_once "../backend/search_query.php";
     
        

        ?>

            <div class="row sorting-part">
                <div class="col-xl-12 col-sm-12">
                    <form action="sorting.php" method="POST">
                        <select class="sort" name="Sorting_value" id="">
                            <option value='option'>Sorting Option</option>
                            <option value='low'>Price Low To High</option>
                            <option value='high'>Price High To Low</option>
                        </select>
                        <input type="submit" name="submit" value="SORT">
                    </form>
                </div>
            </div>

        <div class="row">
            <?php
             if (isset($_SESSION['searchtxt'])) {
                $searchtxt = $_SESSION['searchtxt'];
            }
            if(isset($_SESSION['keywordcat'])){
                $keywordcat=$_SESSION['keywordcat'];
            }
            if (isset($_POST['sorting'])) {
                $sorting = $_POST['sorting_value'];
            
        
          $query=sortingQuery($sorting,$searchtxt,$keywordcat);
            while ($row = mysqli_fetch_assoc($query)) {
                $productid = $row['productid'];
            ?>

                <div class="card" style="width: 18rem;">
                    <div class="hide">
                        <button type="button"><?php echo "<a style=color:white;text-decoration:none; href='productdescription.php?productid=$productid'>PRODUCT DETAILS</a>" ?></button>
                    </div>
                    <?php echo "<img class='card-img-top' src=../images/" . $row['image'] . " alt='Card image cap'>"; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                        <p class="card-text"><?php echo substr($row['description'], 0, 50); ?></p>
                        <p class="price"><?php echo "£ " . $row['price']; ?></p>
                    </div>
                </div>

            <?php
            }
        }

            ?>


        </div>
    </div>


</body>

</html>
<?php include "footer.php" ?>