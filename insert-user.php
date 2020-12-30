<?php

    
require_once("config.php");
require_once("checkCookies.php");

try{
if(isset($_POST["insertUser"])){
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $userRoomNum = $_POST["userRoomNum"];
    $userExt = $_POST["userExt"];
    $productPicture = $_FILES["profilePic"]["name"];

    // Upload Image
    $file_tmp = $_FILES['profilePic']['tmp_name'];
    move_uploaded_file($file_tmp, "img/users/".$productPicture);

    // Insert New Product
    $selectProduct = "insert into users (userName, userEmail, userPassword, userExt, userImage, roomId) 
                        values (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($selectProduct);
    $res = $stmt->execute([$userName, $userEmail, md5($userPassword), $userExt, $productPicture, $userRoomNum]);

    var_dump ($res);
        header('location: ./add-user.php');
    }

    }catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            header('location: ./add-user-error.php');
        } else {
           
        }
}



?>
