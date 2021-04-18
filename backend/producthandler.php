<?php
    require_once("db_connect.php");
    class ProductCrud{
        private $connection;
        function __construct()
        {
            $this->connection=new Connection();
        }

        public function addProduct($name,$price,$description,$category,$author,$quantity,$image){
            $name=mysqli_real_escape_string($this->connection->getConnection(),$name);
            $author=mysqli_real_escape_string($this->connection->getConnection(),$author);
            $description=mysqli_real_escape_string($this->connection->getConnection(),$description);
            $query=mysqli_query($this->connection->getConnection(),"INSERT INTO product(product_name,description,author,category,quantity,price,image) VALUES('$name','$description','$author','$category',$quantity,$price,'$image')");
            if(!$query){
                return false;
            }
            return true;
        }

        public function updateProduct($name,$price,$description,$category,$quantity,$image,$productid){
            $name=mysqli_real_escape_string($this->connection->getConnection(),$name);
           // $author=mysqli_real_escape_string($this->connection->getConnection(),$author);
            $description=mysqli_real_escape_string($this->connection->getConnection(),$description);
            $query=mysqli_query($this->connection->getConnection(),"UPDATE product SET product_name='$name',description='$description',category='$category',quantity=$quantity,price=$price,image='$image' WHERE productid=$productid");
            if($query){
                return true;
            }
            return false;
        }
    }
?>