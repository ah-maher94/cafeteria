<?php

session_start();
    
require_once("config.php");

if(isset($_POST["productName"])){
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productPicture = $_FILES["profilePic"]["name"];
    $productAvailability = $_POST["availability"];
    $productCategory = $_POST["category"];

    // Upload Image
    $file_tmp = $_FILES['profilePic']['tmp_name'];
    move_uploaded_file($file_tmp, "img/product/".$productPicture);

    // Insert New Product
    $selectProduct = "insert into product (productName, productPrice, productImage, productAvailability, categoryId) 
                        values (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($selectProduct);
    $res = $stmt->execute([$productName, $productPrice, $productPicture, $productAvailability, $productCategory]);

    var_dump ($res);
    if($res){
        header('location: ./add-product.php');
    }
}



?>
