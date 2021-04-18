<?php include "navbar.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/addproduct.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "../backend/image_handler.php";
    require_once "../backend/producthandler.php";
    require_once "../backend/image_handler.php";
    $error1 = $error2 = $error3 = $error4 = $error5 = "";
    if (isset($_POST['submit'])) {
        $product_name = $_POST['productName'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $author=$_POST['author'];
        $quantity = $_POST['quantity'];
        $image = $_FILES['file'];
        $obj = new ProductCrud();
        if (checkFileExtension($image) == false) {
            $error5 = "Invalid file. Only jpg,jpeg and png are allowed";
        } else {
            $image_name=uploadProductImage($image);
            if ($obj->addProduct($product_name, $price, $description, $category,$author, $quantity,$image_name)) {
                //echo "Product has been added successfully";
            } else {
                echo "Error occured";
            }
        }
    }
    ?>
    <div class="container" style="margin-bottom: 80px;">
        <h2 id="headerText">Add Product</h1><br><br>
            <div class="row login-section">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <form method="POST" action="addproduct.php"  enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Product Name</label>
                                <input type="text" name="productName" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Description</span>
                            </div>
                            <textarea name="description" class="form-control" aria-label="With textarea" required></textarea>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Author</label>
                            <input style="width: 100%;" type="text" name="author" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Category</label>
                                <select name="category" id="inputState" class="form-control">
                                    <option disabled selected>Choose...</option>
                                    <option value="engineering">Engineering</option>
                                    <option value="computer_science">Computer Science</option>
                                    <option value="nursing">Nursing</option>
                                    <option value="maths">Mathematics</option>
                                    <option value="english">English</option>
                                    <option value="business">Business</option>
                                    <option value="arts">Arts</option>
                                    <option value="agriculture_science">Agriculture Science</option>
                                    <option value="college_materials">College Materials</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="psychology">Psychology</option>
                                    <option value="radiology">Radiology</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="inputCity" required>
                            </div>

                        </div>
                        <br>
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                            <small id="error" class="form-text text-muted">
                                <p class="error-text"><?php if (isset($error5)) {
                                                            echo $error5;
                                                        } ?></p>
                            </small>
                        </div>
                        <br><br><br>
                        <button type="submit" name="submit" class="btn">ADD PRODUCT</button>
                    </form>
                </div>
                <div class="col-xl-3"></div>
            </div>
    </div>
</body>

</html>