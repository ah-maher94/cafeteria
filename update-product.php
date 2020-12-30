<?php

    
require_once("config.php");
require_once("checkCookies.php");


if(isset($_POST["productId"])){
    try{
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

        header('Location: ./products.php');

    }catch(PDOException $e){
        header('Location: ./update-product-error.php');
    }

}





?>