<?php
require_once('ORMclass.php');
$users=new ORM();
$query="select productId,productName from product where productName like '%".$_POST['search']."%'";
$connect=$users ->connect('cafateria','3306','root','sayed771995');
$res=$users -> executeQuery($query);
$records=$res -> fetchAll(PDO::FETCH_ASSOC);
for($i=0;$i<count($records);$i++)
{
    echo '<a href="#" class="list-group-item list-group-item-action product-list" id='.$records[$i]['productId'].'>'.$records[$i]['productName'].'</a>';
}
// var_dump($records);
?>