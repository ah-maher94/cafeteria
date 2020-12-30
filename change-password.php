<?php

    
require_once("config.php");

if(isset($_GET["emailCheck"])){
    $userEmail = $_GET["emailCheck"];

    // check Existance
    $selectEmail = "select * from users where userEmail = ?";
    $stmt = $db->prepare($selectEmail);
    $res = $stmt->execute([$userEmail]);
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); 

    echo count($rows);
    }

    if(isset($_GET["changedPassword"])){
        $userPassword = $_GET["changedPassword"];
        $userEmail = $_GET["email"];
    
        // check Existance
        $updatePassword = "update users set userPassword = ? where userEmail = ?";
        $stmt = $db->prepare($updatePassword);
        $res = $stmt->execute([md5($userPassword), $userEmail]);
    
        echo $res;
        }



?>
