<?php
    
require_once("config.php");
require_once("checkCookies.php");

if(isset($_GET["id"])){
    $orderId = $_GET["id"];
    $selectOrder = "select `productImage`, `productName`, `productPrice`, `quantity` from productorder po, product p where po.orderId=? and po.productId = p.productId";
    $stmt = $db->prepare($selectOrder);
    $res = $stmt->execute(array($orderId));
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='row justify-content-between'>";

    foreach($rows as $col){

        echo 
        "<div class='col-6 col-sm-4 col-md-3 wrapper align-items-end justify-content-center'>
            <div class='card productCard text-center' style='width: 70%; height: 100%'>
            <img class='card-img-top' height='70%' src='img/product/".$col['productImage']."' alt='Card image cap'>
            <div class='card-body'>
                <h3><span class='badge badge-pill badge-light'>".$col['productName']."</span></h3>
                <h4><span class='badge badge-pill badge-light'>".$col['productPrice']*$col['quantity']."</span></h4>
            </div>
            </div>
            <span class='label'><span>".$col['productPrice']." EGP</span></span>
        </div>";

        
    }

    echo "</div>";

}


?>

