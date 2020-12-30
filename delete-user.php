<?php

    
require_once("config.php");
require_once("checkCookies.php");

if(isset($_POST["deleteUser"])){

    $userId = $_POST["userId"];
    $selectUser = "delete from users where userId = ?";
    $stmt = $db->prepare($selectUser);
    $res = $stmt->execute(array($userId));

    if($res){
        header('Location: ./view-users.php');
     }else{
     }
}


?>