<?php include "navbar.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/index.css">
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
                    <button class="shop-btn">Shop now</button>
                </div>
                <div class="banner-image">
                    <img class="bg-image img-fluid" src="../images/bg1.jpg" alt="Background Image">
                </div>
            </div>
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <div class="about-container">
                    <!--img-->
                    <img src="../images/model.png" />
                    <!--about-me-text-->
                    <div class="about-text">
                        <p>About Us</p>
                        <p>Buy book online</p>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia commodi facere sequi eum, aut odit deserunt nobis corporis vitae quia beatae asperiores et, voluptas exercitationem labore maxime quis, neque alias!</p>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis aut esse laborum libero nam alias autem nulla, reiciendis officiis ipsum! Commodi, quo velit? Dolores itaque voluptates voluptate doloribus, inventore quaerat.</p>
                        <button>Contact Us</button>
                        <button>Shop now</button>
                    </div>
                </div>

            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 style="text-align:left" class="header">Genre</h2>
            </div>
        </div>
        <div style="margin-bottom: 100px;" class="row genre-row">
            <div class="col-xl-2">
                <p class="genre">Horror</p>
                <img style="width:100%;height:200px;" src="../images/horror.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2">
                <p class="genre">History</p>
                <img style="width:100%;height:200px;" src="../images/history.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2">
                <p class="genre">Romance</p>
                <img style="width:100%;height:200px;" src="../images/romance.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2">
                <p class="genre">Inspirational</p>
                <img style="width:100%;height:200px;" src="../images/inspiration.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2">
                <p class="genre">Fantasy</p>
                <img style="width:100%;height:200px;" src="../images/fantasy.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2">
                <p class="genre">Religion</p>
                <img style="width:100%;height:200px;" src="../images/religion.jpg" alt="horror genre">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 col-sm-0"></div>
            <div class="col-xl-8">
                <h2 class="header">Week's Picks</h2>
            </div>
            <div class="col-xl-2"></div>
        </div>
        <div class="row">
            <div class="col-xl-1 col-md-0 col-sm-0"></div>
            <div class="col-xl-3 col-md-3 col-lg-3 col-sm-3">
                <div class="card border-0 first-card" style="width: 18rem;">
                    <img height="200" class="card-img-top" src="../images/book1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Subtle art of not</h5>
                        <p class="card-text">$47.0</p>
                        <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-lg-3 col-sm-3">
                <div class="card border-0 second-card" style="width: 18rem;">
                    <img height="200" class="card-img-top" src="../images/steve.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Steve Jobs</h5>
                        <p class="card-text">$47.0</p>
                        <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-3 col-lg-3 col-sm-3">
                <div class="card border-0 third-card" style="width: 18rem;">
                    <img height="200" class="card-img-top" src="../images/book3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Think and grow rich</h5>
                        <p class="card-text">$47.0</p>
                        <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-0"></div>
        </div>
        <div class="row">
            <button class="viewmore-btn">View More</button>
        </div>
    </div>
</body>

</html>