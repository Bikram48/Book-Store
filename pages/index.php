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
                    <a href="booklist.php"><button class="shop-btn">Shop now</button></a>
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
                        <p style="margin-top:20px;">About Us</p>
                        <p>Buy book online</p>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia commodi facere sequi eum, aut odit deserunt nobis corporis vitae quia beatae asperiores et, voluptas exercitationem labore maxime quis, neque alias!</p>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis aut esse laborum libero nam alias autem nulla, reiciendis officiis ipsum! Commodi, quo velit? Dolores itaque voluptates voluptate doloribus, inventore quaerat.</p>
                        <button>Contact Us</button>
                        <a href="booklist.php"><button>Shop now</button></a>
                    </div>
                </div>

            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 style="margin-bottom:40px;" class="header">Genre</h2>
            </div>
        </div>
        <div class="row genre-row">
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <p class="genre">Horror</p>
                <img style="width:100%;height:200px;" src="../images/horror.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <p class="genre">History</p>
                <img style="width:100%;height:200px;" src="../images/history.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <p class="genre">Romance</p>
                <img style="width:100%;height:200px;" src="../images/romance.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <p class="genre">Inspirational</p>
                <img style="width:100%;height:200px;" src="../images/inspiration.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <p class="genre">Fantasy</p>
                <img style="width:100%;height:200px;" src="../images/fantasy.jpg" alt="horror genre">
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 col-6 mt-2">
                <p class="genre">Religion</p>
                <img style="width:100%;height:200px;" src="../images/religion.jpg" alt="horror genre">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 col-sm-0"></div>
            <div class="col-xl-8">
                <h2 style="margin-top:80px;" class="header">Week's Picks</h2><br><br>
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
        <div style="margin-top: 50px;" class="row">
            <button class="viewmore-btn">View More</button>
        </div>
        <div style="margin-top:200px;margin-bottom:50px;" class="row justify-content-center">
            <h2 class="text-center">OUR TEAM</h2>
        </div>
        <div class="row mt-6">
            <div class="col-xl-3 text-center">
                <div class="team mx-auto">
                    <img class="img-fluid rounded-circle z-depth-1" src="../images/asim.jpg" alt="group member">
                </div>
                <div class="content">
                    <h5 class="font-weight-bold mt-4 mb-3">Asim Prakash Oli</h5>
                    <p class="text-uppercase blue-text"><strong>Member</strong></p>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 text-center">
                <div class="team mx-auto">
                    <img class="img-fluid rounded-circle z-depth-1" src="../images/asim.jpg" alt="group member">
                </div>
                <div class="content">
                    <h5 class="font-weight-bold mt-4 mb-3">Rajib Rijal</h5>
                    <p class="text-uppercase blue-text"><strong>Member</strong></p>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 text-center">
                <div class="team mx-auto">
                    <img class="img-fluid rounded-circle z-depth-1" src="../images/saroj.jpg" alt="group member">
                </div>
                <div class="content">
                    <h5 class="font-weight-bold mt-4 mb-3">Saroj Khanal</h5>
                    <p class="text-uppercase blue-text"><strong>Member</strong></p>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 text-center">
                <div class="team mx-auto">
                    <img class="img-fluid rounded-circle z-depth-1" src="../images/gopal.jpg" alt="group member">
                </div>
                <div class="content">
                    <h5 class="font-weight-bold mt-4 mb-3">Gopal Thapa</h5>
                    <p class="text-uppercase blue-text"><strong>Member</strong></p>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-fb">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                    <a type="button" class="btn-floating btn-sm mx-1 mb-0 btn-tw">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>

        <div style="margin-top:200px;margin-bottom:50px;" class="row justify-content-center">
            <h2 class="text-center">TESTIMONIALS</h2>
        </div>
        <div class="row text-center">
            <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
                <div class="card testimonial-card">
                    <div class="card-up info-color"></div>
                    <div class="avatar mx-auto white">
                        <img style="width:70%;" src="../images/asim.jpg" class="rounded-circle img-fluid">
                    </div>
                    <div class="card-body">
                        <h4 class="font-weight-bold mb-4">Asim</h4>
                        <hr>
                        <p class="dark-grey-text mt-4"><i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet eos
                            adipisci, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                <div class="card testimonial-card">
                    <div class="card-up blue-gradient">
                    </div>
                    <div class="avatar mx-auto white">
                        <img style="width:70%;" src="../images/gopal.jpg" class="rounded-circle img-fluid">
                    </div>
                    <div class="card-body">
                        <h4 class="font-weight-bold mb-4">Saroj</h4>
                        <hr>
                        <p class="dark-grey-text mt-4"><i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet eos
                            adipisci, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card testimonial-card">
                    <div class="card-up indigo"></div>
                    <div class="avatar mx-auto white">
                        <img style="width:70%;" src="../images/saroj.jpg" class="rounded-circle img-fluid">
                    </div>
                    <div class="card-body">
                        <h4 class="font-weight-bold mb-4">Rajib</h4>
                        <hr>
                        <p class="dark-grey-text mt-4"><i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet eos
                            adipisci, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:200px;">
        <?php include "footer.php" ?>
    </div>
</body>

</html>