<?php

    
require_once("config.php");
require_once("checkCookies.php");

if(isset($_POST["from-date"],$_POST["to-date"] )){
    $fromDate = $_POST["from-date"];
    $toDate = $_POST["to-date"];
    // $startOrder = ($page -1) * 3;
    $totalOrders = 0;

    if($_COOKIE['userRole'] == 'user'){
        $userId = $_COOKIE['userID'];
    }

    $selectAll="select `orderId`, `orderDate`, `orderStatus`, `orderTotalPrice` from orders where userId=? 
    and orderDate between '$fromDate' and '$toDate' order by orderDate desc";
    $selectAllStmt=$db->prepare($selectAll);
    $res=$selectAllStmt->execute([$userId]);
    $numrows=$selectAllStmt->rowCount();
    $rows=$selectAllStmt->fetchAll(PDO::FETCH_ASSOC);
    
/*     echo "f".$fromDate;
    echo "t".$toDate;
    var_dump($rows); */

    echo             "<div class='row'>
    <div class='col-lg-12'>
        <div class='cart-table'>

        
        <table>
                <thead style='margin-bottom:30px;'>
                    <tr>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Total Price</th>
                        <th><i class='ti-close'></i></th>
                    </tr>
                </thead>
                <tbody id='order-table-body'>";



    foreach($rows as $col){

        // Insert Data Into Table
        echo "<tr><td class='order-date'>".$col['orderDate']."<span class='displayOrder' id='$col[orderId]'><i class='fa fa-expand' aria-hidden='true'></i></span></td>
        <td class='order-status'><h5>".$col['orderStatus']."</h5></td>
        <td class='total-price'>".$col['orderTotalPrice']." EGP</td>";
        
        if($col['orderStatus'] == 'Processing'){
            echo "<td class='close-td'><a href='cancel-order-user.php?cancel=$col[orderId]'><i class='ti-close'></i></a></td>";
        }
        else{
            echo "<td class='close-td'></td>";
        }
        
        echo "</tr>";


        $totalOrders += $col['orderTotalPrice'];
        

    }

    echo "</tbody>
    </table>


<div class='row justify-content-around mt-3'>
<div class='col-lg-6 text-center'>";


/* 
    $selectAll="select `orderId`, `orderDate`, `orderStatus`, `orderTotalPrice` from orders where userId=? 
    and orderDate between '$fromDate' and '$toDate'";
    $selectAllStmt=$db->prepare($selectAll);
    $res=$selectAllStmt->execute([2]);
    $rowsNum=$selectAllStmt->rowCount(); */

/*            
    // Previous Button
    if($page > 1){
         echo "<a href='view-orders.php?page=".($page-1)."' class='pageNum btn btn-secondary'>Previous</a>";
    }
    // Page Numbers
    for($pageNum = 1; $pageNum <= ceil($rowsNum/3); $pageNum++){
        ?> <a href="view-orders.php?page= <?php echo $pageNum ?>" class="pageNum btn btn-primary"> <?php echo $pageNum ?> </a> <?php
    }
    // Next Button
    if($pageNum-1 > $page){
        echo "<a href='view-orders.php?page=".($page+1)."' class='pageNum btn btn-secondary'>Next</a>";
    }

    
 */


    echo "</div>

</div>
</div>
<div class='row'>
    <div class='col-lg-4'>
    </div>
    <div class='col-lg-4 offset-lg-4'>
        <div class='proceed-checkout'>
            <ul>
                <li class='cart-total'>This Page Orders <span>".$totalOrders."$</span></li>
            </ul>
            <a href='#' class='proceed-btn'>Continue Shopping</a>
        </div>
    </div>
</div>
</div>
</div>
</div>";

}

?>
