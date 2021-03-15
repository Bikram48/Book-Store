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
    }
?>