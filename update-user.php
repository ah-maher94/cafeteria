<?php

    
require_once("config.php");
require_once("checkCookies.php");


if(isset($_POST["userId"])){

    $userId = $_POST["userId"];
    $userName = $_POST["userName"];
    $userRoom = $_POST['userRoom'];

    // echo $userRoom;

    $userExt = $_POST["userExt"];

    $updateUser = "update users set userName = ?, roomId = ?, userExt = ? where userId = ?";
    $stmt = $db->prepare($updateUser);
    $res = $stmt->execute([$userName, $userRoom, $userExt, $userId]);

    header('Location: ./view-users.php');

}

?>