<?php
      require_once("db_connect.php");
    class Cart{
        private $dbconnection;
       private $productid;    
       private $quantity;
       private $userid;
      
       public function __construct($productid,$quantity,$userid)
       {
            $this->productid=$productid;
            $this->quantity=$quantity;
            $this->userid=$userid;
            $this->dbconnection=new Connection();
       }

       public function insertItem(){
           $query=mysqli_query($this->dbconnection->getConnection(),"INSERT INTO cart(quantity,fk1_userid,fk1_productid) VALUES($this->quantity,$this->userid,$this->productid)");
            if($query){
                return true;
            }
       }

       public function checkProductExistence(){
           $query=mysqli_query($this->dbconnection->getConnection(),"SELECT * FROM cart WHERE fk1_productid=$this->productid AND fk1_userid=$this->userid");
           $fetch=mysqli_fetch_assoc($query);
           $row=mysqli_num_rows($query);
            return $row;
       }

       public function removeProduct(){
           $query=mysqli_query($this->dbconnection->getConnection(),"DELETE FROM cart WHERE fk1_productid=$this->productid AND fk1_userid=$this->userid");
           if($query){
               return true;
           }
           return false;
       }

       public function updateCart($cartid){
           $query=mysqli_query($this->dbconnection->getConnection(),"UPDATE cart SET quantity=$this->quantity WHERE cart_id=$cartid");

       }
   }
?>