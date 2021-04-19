<?php include "navbar.php";
require_once "../backend/db_connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container main">
        <div class="row image-cover">
            <div class="col-xl-12">
                <div class="text-container">
                    <p>Hello,</p>
                    <p>HOW CAN WE HELP YOU?</p>
                    <p>We are the best book provider <br> in the market</p>
                    <a href="shopallproducts.php"><button class="shop-btn">Shop All Products</button></a>
                </div>
                <div class="banner-image">
                    <img class="bg-image img-fluid" src="../images/bg1.jpg" alt="Background Image">
                </div>
            </div>
            <div class="col-xl-12 title-head">
                <h1>Most Popular Books</h1>
            </div>
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="about-container">
                    <?php
                    $db_connection = new Connection();
                    $query = mysqli_query($db_connection->getConnection(), "SELECT * FROM product p, rating r where p.productid=r.fk2_productid ORDER BY r.rating_number DESC LIMIT 3");
                    while ($row = mysqli_fetch_assoc($query)) {
                        $image = $row['image'];
                        $pid = $row['fk2_productid'];
                    ?>
                        <div class="card" style="width: 14rem;">
                            <a href="productdescription.php?productid=<?php echo $pid ?>"><img class="card-img-top" style="width: 100%;height:100%" src="../images/<?php echo $image; ?>" alt="Card image cap"></a>

                        </div>
                    <?php } ?>

                </div>

            </div>
            <div class="col-xl-1"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 style="margin-bottom:40px;" class="header">Department</h2>
            </div>
        </div>
        <div class="row genre-row">
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=engineering">
                    <p class="genre">Engineering</p>
                    <img style="width:100%;height:200px;" src="../images/engineering1.jpg" alt="engineering genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=computer_science">
                    <p class="genre">Computer <br> Science</p>
                    <img style="width:100%;height:200px;" src="../images/cs.jpg" alt="cs genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=nursing">
                    <p class="genre">Nursing</p>
                    <img style="width:100%;height:200px;" src="../images/nursing.jpg" alt="nursing genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=maths">
                    <p class="genre">Mathematics</p>
                    <img style="width:100%;height:200px;" src="../images/math.jpg" alt="maths genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=english">
                    <p class="genre">English</p>
                    <img style="width:100%;height:200px;" src="../images/english.jpg" alt="english genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=business">
                    <p class="genre">Business</p>
                    <img style="width:100%;height:200px;" src="../images/business.jpg" alt="business genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=arts">
                    <p class="genre">Arts</p>
                    <img style="height:200px;" class="img-fluid" src="../images/arts.jpg" alt="engineering genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=agriculture_science">
                    <p class="genre">Agriculture <br> Science</p>
                    <img style="width:100%;height:200px;" src="../images/agriculture.jpg" alt="cs genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=college_materials">
                    <p class="genre">College <br> Materials</p>
                    <img style="width:100%;height:200px;" src="../images/collegematerials.jpg" alt="nursing genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=marketing">
                    <p class="genre">Marketing</p>
                    <img style="width:100%;height:200px;" src="../images/margketing.jpg" alt="maths genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=psychology">
                    <p class="genre">Psychology</p>
                    <img style="width:100%;height:200px;" src="../images/psychology.jpg" alt="english genre">
                </a>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <a href="booklist.php?genre=radiology">
                    <p class="genre">Radiology</p>
                    <img style="width:100%;height:200px;" src="../images/radiology.jpg" alt="business genre">
                </a>
            </div>
        </div>

    </div>
    <div class="container-fluid img-box">
        <?php
        $query = mysqli_query($db_connection->getConnection(), "SELECT COUNT(*) as total_product FROM product");
        $result = mysqli_fetch_assoc($query);
        $totalitems = $result['total_product'];
        ?>
        <div class="row">
            <div style="height:300px;width:100%;" class="col-xl-12">
                <div style="width: 100%;" class="contents">
                    <h1>We have <?php echo $totalitems; ?> titles to choose from</h1><br>
                    <a href="shopallproducts.php"><button class="explore-btn">EXPLORE NOW</button></a>
                </div>
                <img style=" width: 100%; height: 100%;object-fit:cover;" src="../images/bg-1.jpg">
            </div>
        </div>
    </div>
    <!-- Reference from: https://bestjquery.com/tutorial/testimonial/demo64/ -->
    <div class="container">
        <h2>Testimonials</h2><br><br><br><br>
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carousel">
                    <div class="testimonial">
                        <div class="pic">
                            <img src="../images/asim.jpg">
                        </div>
                        <div class="testimonial-profile">
                            <h3 class="title">Asim</h3>
                            <span class="post">United States</span>
                        </div>
                        <p class="description">
                        Couldn’t be happier with this group of highly skilled industry professionals!. Top notch service and a virtual shoulder to lean on, when needed.
                        </p>
                    </div>
                    <div class="testimonial">
                        <div class="pic">
                            <img src="../images/gopal.jpg">
                        </div>
                        <div class="testimonial-profile">
                            <h3 class="title">Gopal</h3>
                            <span class="post">United States</span>
                        </div>
                        <p class="description">
                            I want to say thank you!! Your bargains have introduced me to some great books and authors. This site is amazing!!
                        </p>
                    </div>
                    <div class="testimonial">
                        <div class="pic">
                            <img src="../images/saroj.jpg">
                        </div>
                        <div class="testimonial-profile">
                            <h3 class="title">Saroj</h3>
                            <span class="post">United States</span>
                        </div>
                        <p class="description">
                        Oh my gosh. I believe I have found the best book site for my Kindle and I think I have gone to heaven. Thanks for such a wonderful web site.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:200px;">
        <?php include "footer.php" ?>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#testimonial-slider").owlCarousel({
                items: 2,
                itemsDesktop: [1000, 2],
                itemsDesktopSmall: [979, 2],
                itemsTablet: [768, 1],
                pagination: false,
                navigation: true,
                navigationText: ["", ""],
                autoPlay: true
            });
        });
    </script>
</body>

</html>