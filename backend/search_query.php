<?php 
    function getQuery($category,$searchtxt){
        require_once "../backend/db_connect.php";
        $db = new Connection();
        if ($category == "author") {
            $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE author like '%$searchtxt%'");
        } else if ($category == "title") {
            $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE product_name like '%$searchtxt%'");
        } else {
            $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE upper(product_name) like '%$searchtxt%' OR upper(description) like '%$searchtxt%' OR upper(category) like '%$searchtxt%'");
        }
        return $query;
    }

    function sortingQuery($value,$searchtxt,$keywordcat){
        require_once "../backend/db_connect.php";
        $db = new Connection();
        $query="";
        if ($keywordcat == "title"){
            if($value=="low"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE product_name like '%$searchtxt%' ORDER BY price ASC");
            }
            if($value=="high"){
                $query = mysqli_query($db->getConnection(), "SELECT * FROM PRODUCT WHERE product_name like '%$searchtxt%' ORDER BY price DESC");
            }
        }
      
        if ($keywordcat == "keyword"){
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