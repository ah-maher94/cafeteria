<?php

    
    require_once("config.php");
    require_once("checkCookies.php");

    
    if(isset($_GET["id"])){
        $productId = $_GET["id"];
        $selectProduct = "select `productId`, `productName` from product where productId = ?";
        $stmt = $db->prepare($selectProduct);
        $res = $stmt->execute(array($productId));
        $rows= $stmt->fetch(PDO::FETCH_ASSOC);

        echo "Are you sure you want to delete <h4 style='display:inline'><span class='badge badge-primary '>".$rows['productName']."</span></h4>?<input type='hidden' name='productId' id='product-id' value='".$rows['productId']."'>";

    }    



?>