<?php 
    function getQuery($category,$searchtxt){
        require_once "../backend/db_connect.php";
        $db = new Connection();
        if ($category == "author") {
            $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE author like '%$searchtxt%'");
        } else if ($category == "title") {
            $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE product_name like '%$searchtxt%'");
        }else if($category=="category"){
            $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE category like '%$searchtxt%'");
        } else {
            $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE upper(product_name) like '%$searchtxt%' OR upper(description) like '%$searchtxt%' OR upper(category) like '%$searchtxt%' OR upper(author) like '%$searchtxt%'");
        }
        return $query;
    }

    function sortingQuery($value,$searchtxt,$keywordcat){
        require_once "../backend/db_connect.php";
        $db = new Connection();
        $query="";
        
        if ($keywordcat == "title"){
            if($value=="popularity"){   
                $query = mysqli_query($db->getConnection(), " SELECT * FROM PRODUCT p,rating r WHERE p.productid=r.fk2_productid AND category like '%$searchtxt%' ORDER BY r.rating_number DESC");
            }
            if($value=="low"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE product_name like '%$searchtxt%' ORDER BY price ASC");
            }
            if($value=="high"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE product_name like '%$searchtxt%' ORDER BY price DESC");
            }
        }

        if ($keywordcat == "author"){
            if($value=="popularity"){   
                $query = mysqli_query($db->getConnection(), " SELECT * FROM PRODUCT p,rating r WHERE p.productid=r.fk2_productid AND category like '%$searchtxt%' ORDER BY r.rating_number DESC");
            }
            if($value=="low"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE author like '%$searchtxt%' ORDER BY price ASC");
            }
            if($value=="high"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE author like '%$searchtxt%' ORDER BY price DESC");
            }
        }
      

        if ($keywordcat == "category"){
            if($value=="popularity"){   
                $query = mysqli_query($db->getConnection(), " SELECT * FROM PRODUCT p,rating r WHERE p.productid=r.fk2_productid AND category like '%$searchtxt%' ORDER BY r.rating_number DESC");
            }
            if($value=="low"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE category like '%$searchtxt%' ORDER BY price ASC");
            }
            if($value=="high"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE category like '%$searchtxt%' ORDER BY price DESC");
            }
        }

       
        if ($keywordcat == "keyword"){
            if($value=="popularity"){   
                $query = mysqli_query($db->getConnection(), " SELECT * FROM PRODUCT p,rating r WHERE p.productid=r.fk2_productid AND category like '%$searchtxt%' ORDER BY r.rating_number DESC");
            }
            if($value=="low"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE upper(product_name) like '%$searchtxt%' OR upper(description) like '%$searchtxt%' OR upper(category) like '%$searchtxt%' ORDER BY price ASC");
            }
            if($value=="high"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE upper(product_name) like '%$searchtxt%' OR upper(description) like '%$searchtxt%' OR upper(category) like '%$searchtxt%' ORDER BY price DESC");
            }
        }
        return $query;
    }
?>