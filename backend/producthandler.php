<?php
    require_once("db_connect.php");
    class ProductCrud{
        private $connection;
        function __construct()
        {
            $this->connection=new Connection();
        }

        public function addProduct($name,$price,$description,$category,$quantity,$image){
            $query=mysqli_query($this->connection->getConnection(),"INSERT INTO product(product_name,description,category,quantity,price,image) VALUES('$name','$description','$category',$quantity,$price,'$image')");
            if(!$query){
                return false;
            }
            return true;
        }

        public function updateProduct($name,$price,$description,$category,$quantity,$image,$productid){
            $query=mysqli_query($this->connection->getConnection(),"UPDATE product SET product_name='$name',description='$description',category='$category',quantity=$quantity,price=$price,image='$image' WHERE productid=$productid");
            if($query){
                return true;
            }
            return false;
        }
    }
?>