<?php
session_start();
    
$dsn="mysql:dbname=cafeteria-php-project;dbhost=127.0.0.1;dbport=3306";
Define("DB_USER","root");
Define("DB_PASS","1894");

$db= new PDO($dsn,DB_USER,DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_GET["cancel"])){
    $orderId = $_GET["cancel"];
    $cancelOrder = "delete from orders where orderId =?";
    $stmt = $db->prepare($cancelOrder);
    $res = $stmt->execute(array($orderId));
    header('Location: ./view-orders.php');
}

?>