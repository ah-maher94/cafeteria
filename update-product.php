<?php

session_start();
    
require_once("config.php");


if(isset($_POST["updateProduct"])){

    $productId = $_POST["productId"];
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productAvailability = 1;
    if(($_POST["productAvailability"])=='Available'){
        $productAvailability = 1;
    }else{
        $productAvailability = 0;
    }
    
    $updateProduct = "update product set productName= '$productName', productPrice= '$productPrice', productAvailability= '$productAvailability' where productId = ?";
    $stmt = $db->prepare($updateProduct);
    $res = $stmt->execute(array($productId));

    if($res){
       header('Location: ./products.php');
    }else{
       header('Location: ./products.php');
       
    }
}





?>