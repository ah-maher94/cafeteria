<?php

    
require_once("config.php");
require_once("checkCookies.php");

if(isset($_POST["deleteProduct"])){

    $productId = $_POST["productId"];
    $selectProduct = "delete from product where productId = ?";
    $stmt = $db->prepare($selectProduct);
    $res = $stmt->execute(array($productId));

    if($res){
        header('Location: ./products.php');
     }else{
        header('Location: ./products.php');
     }
}


?>