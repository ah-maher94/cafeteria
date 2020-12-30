<?php
    
require_once("config.php");
require_once("checkCookies.php");

if(isset($_GET["cancel"])){
    $orderId = $_GET["cancel"];
    $cancelOrder = "delete from orders where orderId =?";
    $stmt = $db->prepare($cancelOrder);
    $res = $stmt->execute(array($orderId));
    header('Location: ./view-orders.php');
}

?>