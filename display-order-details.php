<?php
session_start();
    
require_once("config.php");

if(isset($_GET["id"])){
    $orderId = $_GET["id"];
    $cancelOrder = "select `productImage`, `productName`, `productPrice` from productorder po, product p where po.orderId=? and po.productId = p.productId";
    $stmt = $db->prepare($cancelOrder);
    $res = $stmt->execute(array($orderId));
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<div class='row justify-content-between'>";

    foreach($rows as $col){

        echo "<div class='col-6 col-sm-4 col-md-2'><div class='row'><img src='img/product/".$col['productImage']."' height='100px'/></div><div class='row'>".$col['productName']."</div><div class='row'>".$col['productPrice']."$</div></div>";

    }

    echo "</div>";

}

?>