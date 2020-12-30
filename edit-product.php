<?php

    
require_once("config.php");
require_once("checkCookies.php");


if(isset($_GET["id"])){
    $productId = $_GET["id"];
    $selectProduct = "select `productId`, `productName`, `productPrice`, `productAvailability` from product where productId = ?";
    $stmt = $db->prepare($selectProduct);
    $res = $stmt->execute(array($productId));
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $col){
        ?>
        <div class='form-group'>
            <input type='hidden' class='form-control' name='productId' id='edit-product-id' value=' <?php echo $col["productId"]?> '>
        </div>
        <div class='form-group'>
            <label for='product-name' class='col-form-label'>Product Name</label>
            <input type='text' class='form-control' name='productName' id='edit-product-name' value=' <?php echo $col["productName"]?> '>
            <div class="valid-feedback">
            Looks good!
            </div>
            <div class="invalid-feedback">
            Please enter a valid name.
            </div>
        </div>
        <div class='form-group'>
            <label for='product-price' class='col-form-label'>Product Price</label>
            <input type='text' class='form-control' name='productPrice' id='edit-product-price' value=' <?php echo $col["productPrice"]?> '>
            <div class="valid-feedback">
            Looks good!
            </div>
            <div class="invalid-feedback">
            Please enter a valid price.
            </div>
        </div>
        <div class='form-group'>
            <label for='product-availability' class='col-form-label'>Product Availability</label><br>

        <?php
            if($col['productAvailability'] == 1){
                echo "<label class='radio-inline pr-5'><input type='radio' class='availability' name='productAvailability' value='Available' checked> Available</label>
                      <label class='radio-inline'><input type='radio' class='availability' name='productAvailability' value='Unavailable'> Unavailable</label>";
            }else{
                echo "<label class='radio-inline pr-5'><input type='radio' class='availability' name='productAvailability' value='Available'> Available</label>
                      <label class='radio-inline'><input type='radio' class='availability' name='productAvailability' value='Unavailable' checked> Unavailable</label>";
            }

       echo "</div>";

    }



}



?>
