<?php
    function checkFileExtension($file){
        $filename=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];

        $fileExt=explode('.',$filename);
        $fileActualExt=strtolower(end($fileExt));

        $allowedExt=array('jpg','jpeg','png');
        if(in_array($fileActualExt,$allowedExt)){
            return true;
        }
        else{
            return false;
        }
    }

    function uploadFile($file){
        $filename=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];
        
        $fileExt=explode('.',$filename);
        $fileActualExt=strtolower(end($fileExt));
        $filename=str_replace(" ","-",$filename);
        $filePath="../avatars/".$filename;
        move_uploaded_file($fileTmpName,$filePath);
        return $filename;
    }

    function uploadProductImage($file){
        $filename=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];
        
        $fileExt=explode('.',$filename);
        $fileActualExt=strtolower(end($fileExt));
        $filename=str_replace(" ","-",$filename);
        $filePath="../images/".$filename;
        move_uploaded_file($fileTmpName,$filePath);
        return $filename;
    }
?>