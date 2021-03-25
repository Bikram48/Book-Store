<?php
      require_once("db_connect.php");
    class Cart{
        private $connection;
       private $productid;    
       private $quantity;
       private $userid;
       public function __construct($productid,$quantity,$userid)
       {
            $this->productid=$productid;
            $this->quantity=$quantity;
            $this->userid=$userid;
            $this->connection=new Connection();
       }

       public function insertItem(){
           $query=mysqli_query($this->connection->getConnection(),"INSERT INTO cart(quantity,fk1_userid,fk1_productid) VALUES($this->quantity,$this->userid,$this->productid)");
            if($query){
                return true;
            }
       }
   }
?>