<?php

    
require_once("config.php");
require_once("checkCookies.php");

    

    // $productName = $_POST["productName"];
    // $productPrice = $_POST["productPrice"];
    // $productPicture = $_FILES["profilePic"]["name"];
    // $productAvailability = $_POST["availability"];
    // $productCategory = $_POST["category"];

    // // Upload Image
    // $file_tmp = $_FILES['profilePic']['tmp_name'];
    // move_uploaded_file($file_tmp, "img/product/".$productPicture);

    // Insert New Product

    if(  isset( $_POST['quantity'] )  )
    {


        $productId = $_POST['productId'];
        $prdoctQuantity= $_POST['quantity'];
        $notes = $_POST['notes'];
        $roomId = $_POST['userRoom'];
        if($_COOKIE['userRole'] == 'admin'){
            $userId = $_POST['user-order-name'];
        }
        // var_dump ($productId);

        try{

            $db->beginTransaction();

            $selectProduct = "insert into orders (orderStatus, orderDate, orderNotes, orderTotalPrice, userId, adminId) 
            values (?, now(), ?, ?, ?, ?)";
            $stmt = $db->prepare($selectProduct);
            if($_COOKIE['userRole'] == 'user'){
                $res = $stmt->execute(['Processing', $notes, 500, $_COOKIE['userID'], 1]);
            }else{
                $res = $stmt->execute(['Processing', $notes, 500, $userId, 1]);
            }

            $selectProduct = "insert into userroomorder (userId, roomId, orderId) 
            values (?, ?, LAST_INSERT_ID())";
            $stmt = $db->prepare($selectProduct);
            if($_COOKIE['userRole'] == 'user'){
                $res = $stmt->execute([$_COOKIE['userID'], $roomId]);
            }else{
                $res = $stmt->execute([$userId, $roomId]);
            }

            for($eachProduct = 0; $eachProduct < count($productId); $eachProduct++){
                $insertProducts = "insert into productOrder (productId, orderId, quantity) 
                values ( ?, LAST_INSERT_ID(), ?)";
                $insertProductsStmt = $db->prepare($insertProducts);
                $insertProductRes = $insertProductsStmt->execute([ $productId[$eachProduct] ,$prdoctQuantity[$eachProduct] ]);
            }

            $db->commit();
            if($_COOKIE['userRole'] == 'user'){
                header('location: ./user-shop.php');
            }else{
                header('location: ./main-shop.php');
            }
        }catch(Throwable $e){

            $db->rollback();
            throw $e;
            // header('location: ./add-product.php');
        }



    }






?>
