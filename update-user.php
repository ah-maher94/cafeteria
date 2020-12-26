<?php

session_start();
    
require_once("config.php");


if(isset($_POST["userId"])){

    $userId = $_POST["userId"];
    $userName = $_POST["userName"];

    $retrieveRoomNum = "select roomId from room where roomNumber = ?";
    $stmt = $db->prepare($retrieveRoomNum);
    $userRoom = $stmt->execute(array($_POST["userRoom"]));

    echo $userRoom;

    $userExt = $_POST["userExt"];

    $updateUser = "update users set userName = ?, roomId = ?, userExt = ? where userId = ?";
    $stmt = $db->prepare($updateUser);
    $res = $stmt->execute([$userName, $userRoom, $userExt, $userId]);

    header('Location: ./view-users.php');

}

?>