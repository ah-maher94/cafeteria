<?php
  class user{

    public $db;
    // public $data=array();


    function  __constructor(){
        $this->db=$db;
    }


    

    // connect to database
    function database_con(){
        
        $dsn="mysql:dbname=cafeteria;dbhost=127.0.0.1;dbport=3306";
         Define("DB_USER","root");
         Define("DB_PASS","");
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
        $selectQry='select * from product order by productId DESC limit 1;';
        $selectstmt=$this->db->prepare($selectQry);
        $selectstmt->execute();
        $rows=$selectstmt->fetchAll(PDO::FETCH_ASSOC);

        

         $data=$rows;

        return $data;
      }


      function showproducts(){
        $data=array();
        $selectQry='select * from product';
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

    
    
      
    //  }
     



    

     

  }


?>