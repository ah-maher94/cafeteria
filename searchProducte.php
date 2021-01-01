<?php
require_once('ORMclass.php');
$users=new ORM();
$query="select * from product where productId=".$_POST['displaysearch'];
$connect=$users ->connect('cafateria','3306','root','sayed771995');
$res=$users -> executeQuery($query);
$records=$res -> fetchAll(PDO::FETCH_ASSOC);
    echo "<div class='row justify-content-between'>";
      echo "<div class='col-6 col-sm-4 col-md-4 wrapperAll align-items-end justify-content-center'>
      <div class='card productCard homeUser-products text-center'  style='width: 70%; height: 100%'>
      <input type='hidden' name='id' value='".$records[0]['productId']."' />
      <img class='card-img-top buy' id='".$records[0]['productId']."' height='65%' src='img/product/".$records[0]['productImage']."' alt='Product'>
      <div class='card-title'>
          <h4><span class='badge badge-pill badge-light'>".$records[0]['productName']."</span></h4>
      </div>
      </div>
      <span class='label'><span name='".$records[0]['productPrice']."'>".$records[0]['productPrice']." EGP</span></span>
  </div>";
?>