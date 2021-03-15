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
            $db=new Connection();
            $count=0;
             if(isset($_GET['genre'])){
                 $category=$_GET['genre'];
                 $_SESSION['category']=$category;
             }
             
             $query=mysqli_query($db->getConnection(),"SELECT * FROM product WHERE category='$category'");
                 while($row=mysqli_fetch_assoc($query)){
                     $_SESSION['search_product']=$row['productid'];
                     $count++;
                 }
                
        
        ?>
      
      <h1><?php echo $count ?> Items Found </h1>
      <?php if($count>0){?>
       <div class="row sorting-part">
       <div class="col-xl-12 col-sm-12">
            <form action="sorting.php" method="POST">
                 <select class="sort"  name="Sorting_value" id="">
                    <option value='option'>Sorting Option</option>
                    <option value='popularity'>Popularity</option>
                    <option value='low'>Price Low To High</option>
                    <option value='high'>Price High To Low</option>
                 </select>
                 <input type="submit" name="submit" value="SORT">
            </form>
        </div>
        </div>
      <?php } ?>
        <div class="row">
            <?php
              
                $query=mysqli_query($db->getConnection(),"SELECT * FROM product WHERE category='$category'");
                 while($row=mysqli_fetch_assoc($query)){
                    $productid=$row['productid'];
            ?>
       
            <div class="card" style="width: 18rem;">
                <div class="hide">
                <button type="button"><?php echo "<a style=color:white;text-decoration:none; href='productdescription.php?productid=$productid'>PRODUCT DETAILS</a>" ?></button>
                </div>
                <?php echo "<img class='card-img-top' src=../images/".$row['image']." alt='Card image cap'>";?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                    <p class="card-text"><?php echo substr($row['description'],0,50);?></p>
                    <p class="price"><?php echo "£ ".$row['price']; ?></p>
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