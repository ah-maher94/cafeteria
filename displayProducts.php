<?php
// $rows=$user->showproducts();
require_once('ORMclass.php');
$users=new ORM();
$query="select * from product";
$connect=$users ->connect('cafateria','3306','root','sayed771995');
$res=$users -> executeQuery($query);
$records=$res -> fetchAll(PDO::FETCH_ASSOC);
echo "<div class='row justify-content-between'>";

  foreach($records as $row){


    echo "<div class='col-6 col-sm-4 col-md-4 wrapperAll align-items-end justify-content-center'>
    <div class='card productCard homeUser-products text-center'  style='width: 70%; height: 100%'>
    <input type='hidden' name='id' value='".$row['productId']."' />
    <img class='card-img-top buy' id='".$row['productId']."' height='65%' src='img/product/".$row['productImage']."' alt='Product'>
    <div class='card-title'>
        <h4><span class='badge badge-pill badge-light'>".$row['productName']."</span></h4>
    </div>
    </div>
    <span class='label'><span name='".$row['productPrice']."'>".$row['productPrice']." EGP</span></span>
</div>";
}
?>