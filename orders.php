<?php
 require_once('ORMclass.php');
 
 if(isset($_POST['userId']))
 {
        // $ID=$_COOKIE['userID'];
        $users=new ORM();
        $connect=$users ->connect('cafateria','3306','root','sayed771995');
        $query="select od.orderDate,un.userName,roomNumber,ue.userExt,od.orderStatus
        from orders od,users un ,room rn,users ue
        where od.userId=un.userId and un.roomId=rn.roomId and ue.userId= od.userId and od.userId=un.userId 
        ";
        $res=$users -> executeQuery($query);
        $records=$res -> fetchAll(PDO::FETCH_ASSOC);
        $idQuery='select orderId
        from orders';  
        $idres=$users -> executeQuery($idQuery);
        $idrecords=$idres -> fetchAll(PDO::FETCH_ASSOC);
        for($i=0;$i<count($records);$i++)
        {
            echo '<div class="container">     
            <table class="table  table-dark table-hover table-bordered">
              <thead>
                <tr>
                  <th>Order Date</th>
                  <th>Name</th>
                  <th>Room</th>
                  <th>Ext</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="orders" id='.$idrecords[$i]['orderId'].'>
                    <td>'.$records[$i]['orderDate'].'</td>
                    <td>'.$records[$i]['userName'].'</td>
                    <td>'.$records[$i]['roomNumber'].'</td>
                    <td>'.$records[$i]['userExt'].'</td>
                    <td>'.$records[$i]['orderStatus'].'</td>
                 </tr>
              </tbody>
            </table>
           </div>
           <section>
                <div class="container mb-5" id="selectedOrder'.$idrecords[$i]['orderId'].'">
                   
                </div>
            </section>
           ';
        }
        // var_dump($records);    
 }
//  select orderDate,userName,roomNumber
?>