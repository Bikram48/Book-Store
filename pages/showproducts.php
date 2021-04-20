<?php
require_once "navbar.php";
require_once "../backend/db_connect.php";
require_once "../backend/image_handler.php";
require_once '../backend/producthandler.php';
$connection = new Connection();
$productHandler = new ProductCrud();
if (isset($_GET['pid'])) {
    $productid = $_GET['pid'];
    $query = mysqli_query($connection->getConnection(), "DELETE FROM product WHERE productid=$productid");
    if ($query) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Product has been successfully deleted...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
}

if (isset($_POST['update_btn'])) {
    $imageName = "";
    $pid = $_POST['pid'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $defaultImageName = $_POST['image_name'];
    $file = $_FILES['file'];
    if ($_FILES['file']['size'] == 0) {
        $imageName = $defaultImageName;
    }
    if (checkFileExtension($file) == true) {
        $imageName = uploadProductImage($file);
    }
    if ($productHandler->updateProduct($product_name, $price, $product_description, $category, $quantity, $imageName, $pid) == true) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Product has been successfully updated...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }
}
require_once "../backend/discounthandler.php";
if (isset($_POST['discount_btn'])) {
    $pid = $_POST['pid'];
    $discount_percentage = $_POST['discount_percentage'];
    if (checkexisted_discount($pid) > 0) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Discount on this porduct already exists!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php } else {
        addDiscount($discount_percentage, $pid);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/566b302374.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">ProductName</th>
                    <th scope="col">Price</th>
                    <th style="width:30%;" scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($connection->getConnection(), "SELECT * from product");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['productid']; ?></th>
                        <td><img width="150" height="150" src="../images/<?php echo $row['image']; ?>"></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><a style="color:black;" href="javascript:;" data-id="<?php echo $row['productid'] ?>" data-image="<?php echo $row['image'] ?>" data-name="<?php echo $row['product_name'] ?>" data-description="<?php echo $row['description'] ?>" data-price="<?php echo $row['price'] ?>" data-quantity="<?php echo $row['quantity'] ?>" data-toggle="modal" data-target="#exampleModal"><i style="font-size: 30px;" class="fas fa-edit"></i></a>
                            <a style="color:black;" href="javascript:;" data-id="<?php echo $row['productid'] ?>" data-toggle="modal" data-target="#discountModal"><i style="font-size: 30px;" class="fas fa-tags"></i></a><a style="color:black;" href="showproducts.php?pid=<?php echo $row['productid'] ?>"><i style="font-size: 30px;" class="fas fa-times-circle"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="position:absolute;left:40%;font-weight:bolder;" class="modal-title" id="exampleModalLabel">EDIT PRODUCT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="showproducts.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="productid" name="pid">
                        <input type="hidden" id="image" name="image_name">
                        <div class="form-group">
                            <label for="product-name" class="col-form-label">ProductName:</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Product Description:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="product-name" class="col-form-label">Price:</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="product-name" class="col-form-label">Quantity:</label>
                                <input type="text" class="form-control" id="quantity" name="quantity">
                            </div>
                        </div>
                        <label for="select_category" class="form-label">Select Category</label>
                        <select name="category" class="form-control form-control-lg">
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
                        </select><br>
                        <label for="formFileLg" class="form-label">Choose Image</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="file" />

                </div>
                <div class="modal-footer">
                    <button style="width: 50%;background-color:#0A061D;border:none;font-weight:bolder;" type="submit" name="update_btn" class="btn btn-primary">UPDATE</button>
                    <button style="width: 50%;background-color:#0A061D;border:none;font-weight:bolder;" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="discountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="position:absolute;left:40%;font-weight:bolder;" class="modal-title" id="exampleModalLabel">ADD DISCOUNT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="showproducts.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="productid" name="pid">
                        <div class="form-group">
                            <label for="product-name" class="col-form-label">Discount Percentage:</label>
                            <input type="text" class="form-control" id="product_discount" name="discount_percentage">
                        </div>
                </div>
                <div class="modal-footer">

                    <button style="width: 50%;background-color:#0A061D;border:none;font-weight:bolder;" type="submit" name="discount_btn" class="btn btn-primary">ADD DISCOUNT</button>

                    <button style="width: 50%;background-color:#0A061D;border:none;font-weight:bolder;" type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var description = button.data('description')
            var price = button.data('price')
            var quantity = button.data('quantity')
            var image = button.data('image')
            var modal = $(this)
            modal.find('#productid').val(id)
            modal.find('#product_name').val(name)
            modal.find('#description').val(description)
            modal.find('#price').val(price);
            modal.find('#quantity').val(quantity)
            modal.find('#image').val(image)
        })

        $('#discountModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('#productid').val(id)
        })
    </script>
</body>

</html>