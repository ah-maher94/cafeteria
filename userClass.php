<?php

require_once("checkCookies.php");


  class user{

    public $db;
    // public $data=array();


    function  __constructor(){
        $this->db=$db;
    }


    

    // connect to database
    function database_con(){
        
        $dsn="mysql:dbname=cafateria;dbhost=127.0.0.1;dbport=3306";
         Define("DB_USER","root");
         Define("DB_PASS","sayed771995");
         $this->db= new PDO($dsn,DB_USER,DB_PASS);
 
         try{
             return  true;
         }
         catch(PDOException $exception){
             die('ERROR: ' . $exception->getMessage());
         }
 
       }
       function showLatestProductroduct()
       {
        $data=array();
        if($_COOKIE['userRole'] == 'user'){
          $selectQry='select `productImage`, `productName`, `productPrice`, `quantity` 
          from productorder po, product p, orders o where po.orderId=o.orderId and po.productId = p.productId 
          and po.orderId= (select `orderId` from orders where userId = ? order by orderDate desc limit 1)';
          $selectstmt=$this->db->prepare($selectQry);
          $selectstmt->execute([$_COOKIE['userID']]);
        }else{
          $selectQry='select `productImage`, `productName`, `productPrice`, `quantity` 
          from productorder po, product p, orders o where po.orderId=o.orderId and po.productId = p.productId 
          and po.orderId= (select `orderId` from orders order by orderDate desc limit 1)';
          $selectstmt=$this->db->prepare($selectQry);
          $selectstmt->execute();
        }

        $rows=$selectstmt->fetchAll(PDO::FETCH_ASSOC);


/*         $selectOrder = "select `productImage`, `productName`, `productPrice`, `quantity` 
        from productorder po, product p, orders o where po.orderId=o.orderId and po.productId = p.productId 
        and po.orderId= (select `orderId` from orders where userId = 2 order by orderDate desc limit 1)";
        $stmt = $db->prepare($selectOrder);
        $res = $stmt->execute([2]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);  */

        

         $data=$rows;

        return $data;
      }


      function showproducts(){
        $data=array();
        $selectQry='select * from product where productAvailability = 1';
        $selectstmt=$this->db->prepare($selectQry);
        $selectstmt->execute();
        $rows=$selectstmt->fetchAll(PDO::FETCH_ASSOC);

        

         $data=$rows;

        return $data;
      }



      // return specific product in home user

      function specificproduct($id){


               $selQry="select * from product where `productId`=:sid";
               $stmt=$this->db->prepare($selQry);
               $stmt->bindParam(":sid",$id);
               $stmt->execute();
               $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
               $num = $stmt->rowCount();
         
        if($num==1) 
        {
           return $items;
          return true;
        }
       

       
      }


      function get_room_in_check_box(){
        $data=array();
        $selectQry='select roomNumber from room';
        $selectstmt=$this->db->prepare($selectQry);
        $selectstmt->execute();
        $rows=$selectstmt->fetchAll(PDO::FETCH_ASSOC);

        

         $data=$rows;

        return $data;
      }

      
function showAllRooms(){
  $selectRooms = "select * from room";
$stmt = $this->db->prepare($selectRooms);
$stmt->execute();
$roomRows=$stmt->fetchAll(PDO::FETCH_ASSOC); 

return $roomRows;
}
    

function showAllUsers(){
  $selectUsers = "select * from users";
$stmt = $this->db->prepare($selectUsers);
$stmt->execute();
$userRows=$stmt->fetchAll(PDO::FETCH_ASSOC); 

return $userRows;
}
      
    //  }
     



    

     

  }


?>