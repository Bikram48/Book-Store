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
            <div class="col-xl-12 title-head">
                    <h1>Most Popular Books</h1>
            </div>
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="about-container">
                    <div class="card" style="width: 14rem;">
                        <img class="card-img-top" style="width: 100%;height:100%" src="../images/computer5.png" alt="Card image cap">
                        
                    </div>
                    <div class="card" style="width: 14rem;">
                        <img class="card-img-top"  style="width: 100%;height:100%"  src="../images/computer3.png" alt="Card image cap">
                    
                    </div>
                    <div class="card" style="width: 14rem;">
                        <img class="card-img-top"  style="width: 100%;height:100%"  src="../images/computer1.png" alt="Card image cap">
                     
                    </div>
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