<?php
 require_once('ORMclass.php');
 
if(isset($_POST['Name']))
 {
     if($_POST['Name']=='totalAmount')
     {
        getUserNameId();
     }
 }
 if(isset($_POST['Name']))
 {
     if($_POST['Name']=='username')
     {
        $users=new ORM();
        $connect=$users ->connect('cafateria','3306','root','sayed771995');
        $res=$users -> select('users','userName,userId');
        $records=$res -> fetchAll(PDO::FETCH_ASSOC);
        for($i=0;$i<count($records);$i++)
        {
            echo $records[$i]['userName'].'<br>';
        }
        for($i=0;$i<count($records);$i++)
        {
            echo $records[$i]['userId'].'</t>';
        }
     }
    
 }
//  isset($_POST['username'])
 if(isset($_POST['userid']))
 {
     if(isset($_POST['dateFrom']) && isset($_POST['dateTo']))
     {
        if($_POST['dateFrom']!=0 && $_POST['dateTo']==0)
        {
            $print=1;
            $date='"'.$_POST['dateFrom'].'"';
            $users=new ORM();
            $connect=$users ->connect('cafateria','3306','root','sayed771995');
            ordersDateForUser('select orderId,orderDate,orderTotalPrice from orders where userId='.$_POST['userid'].' and orderDate > '.$date.' order by orderDate desc ',$users);
            // echo 'select orderDate,orderTotalPrice from orders where userId='.$_POST['userid'].' and orderDate > '.$date,$users;
        }  
        if($_POST['dateFrom']==0 && $_POST['dateTo']!=0)
        {
            $print=1;
            $date='"'.$_POST['dateTo'].'"';
            $users=new ORM();
            $connect=$users ->connect('cafateria','3306','root','sayed771995');
            ordersDateForUser('select orderId,orderDate,orderTotalPrice from orders where userId='.$_POST['userid'].' and orderDate < '.$date.' order by orderDate desc ',$users);
            // echo 'select orderDate,orderTotalPrice from orders where userId='.$_POST['userid'].' and orderDate > '.$date,$users;
        }  
        if($_POST['dateFrom']!=0 && $_POST['dateTo']!=0)
        {
            $print=1;
            $dateFrom='"'.$_POST['dateFrom'].'"';
            $dateto='"'.$_POST['dateTo'].'"';
            $users=new ORM();
            $connect=$users ->connect('cafateria','3306','root','sayed771995');
            ordersDateForUser('select orderId,orderDate,orderTotalPrice from orders where userId='.$_POST['userid'].' and orderDate between '.$dateFrom.' and '.$dateto.' order by orderDate desc ',$users);
            // select orderDate from orders where userId=2 and orderDate between '2020-8-26' and '2020-11-25';
        }  
        else if(!isset($print))
        {
            $users=new ORM();
            $connect=$users ->connect('cafateria','3306','root','sayed771995');
            ordersForUser($users);
         }
     }
     
 }
//  if(isset($_POST['dateFrom']))
//  {
//     if(isset($_POST['dateTo']))
//     {
//         $users=new ORM();
//         $connect=$users ->connect('cafateria','3306','root','sayed771995');
//         ordersDateForUser('select orderDate,orderTotalPrice from orders where userId='.$userid.' and orderDate > '.$_POST['dateFrom']. ' order by orderDate desc',$users);
//     } 
//  }
 function getUserNameId()
 {
     global $userName;
     global $n_users;

    $users=new ORM();
    $connect=$users ->connect('cafateria','3306','root','sayed771995');
    $res=$users -> select('users');
    $records=$res -> fetchAll(PDO::FETCH_ASSOC);
    $n_users=count($records);
    for($i=0;$i<count($records);$i++)
    {
        $user_id=$records[$i]['userId'];
        echo '<tr>
        <td>'.$records[$i]['userName'].'</td>';
        $userName[$i]=$records[$i]['userName'].' ';
        totalAmountForUser($users,$user_id);
    //    lastOrderForUser($users,$user_id);
    }
    // $res=$users -> executeQuery('select orderTotalPrice from orders where orderDate=(
    //     select max(orderDate)  from orders where userId="1")');
    //     $records=$res -> fetchAll(PDO::FETCH_ASSOC);
    //     var_dump($records);
 }
 
function totalAmountForUser($user,$userID)
{
    $total=0;
    $arr=[];
    $res=$user -> select('orders','orderTotalPrice','userId',$userID);
    $records=$res -> fetchAll(PDO::FETCH_ASSOC);
    for($i=0; $i<count($records);$i++)
    {
        $arr=array_values($records[$i]);
        $total+=$arr[0];
    }
    echo '<td>'.$total.'</td>
    </tr>';
}
function lastOrderForUser($user,$userID)
{
    $res=$user -> select('orders','max(orderDate)','userId',$userID);
    $records=$res -> fetchAll(PDO::FETCH_ASSOC);
    $lastOrderDate=array_values($records[0])[0];
    var_dump($lastOrderDate);
}
function ordersForUser($user)
{
    $userid= $_POST['userid'];
    $query='select orderId,orderDate,orderTotalPrice from orders where userId='.$userid.' order by orderDate desc ';
    $res=$user -> executeQuery($query);
    $records=$res -> fetchAll(PDO::FETCH_ASSOC);
    $lastOrderDate=array_values($records[0])[0];
    for($i=0;$i<count($records);$i++)
    {
        echo '<tr id='.$records[$i]['orderId'].' class= orderrow'.'>
        <td>'.$records[$i]['orderDate'].'</td>'.'<td>'.$records[$i]['orderTotalPrice'].'</td>';
    }
     echo '</tr>';
}
function ordersDateForUser($query,$user)
{
    $res=$user -> executeQuery($query);
    $records=$res -> fetchAll(PDO::FETCH_ASSOC);
    if($res -> rowCount() !=0)
    {
        $lastOrderDate=array_values($records[0])[0];
        for($i=0;$i<count($records);$i++)
        {
            echo '<tr id='.$records[$i]['orderId'].' class= orderrow'.'>
            <td>'.$records[$i]['orderDate'].'</td>'.'<td>'.$records[$i]['orderTotalPrice'].'</td>';
        }
        echo '</tr>';
        // echo $records[$i]['orderId'].$records[$i]['orderTotalPrice'];
    }
}

// select   from orders where userId='1';
// select orderTotalPrice from orders where userId='1';
//  Define("USER","root");
//  Define("PASSWORD","sayed771995");
