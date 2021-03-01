<?php include "navbar.php" ?>
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
        <?php for($i=0;$i<=5;$i++){ ?>
        <div class="row book-items">
            <div class="col-xl-1 col-lg-1 col-sm-3"></div>
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 image-box">
                <img class="img-fluid" src="../images/steve.jpg" alt="">
            </div>
            <div class="col-xl-7 col-lg-7 col-md-8 col-sm-6 book-contents">
                <h3>Steve Jobs</h3>
                <p>Morgan Rogers</p>
                <p>$16.99</p>
                <div class="description">
                    <p>Based on more than forty interviews with Steve Jobs conducted over two years - as well as interviews with more than a hundred family members, friends, adversaries, competitors, and colleagues - this is the acclaimed, internationally bestselling biography of the ultimate icon of inventiveness.</p>
                </div>
                <button class="addtocart">ADD TO CART</button>
            </div>
        </div>
        <?php }?>

    </div>
    <div style="margin-top:400px;">
        <?php include "footer.php" ?>
    </div>
</body>

</html>