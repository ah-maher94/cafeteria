<?php
session_start();

include 'userClass.php';

$user= new user();
$user->database_con();

if(isset($_GET['id'])){
    
    $id=$_GET['id'];
    $items=$user->specificproduct($id);
   
  
   foreach($items as $item)
        $name=$item['productName'];
        $id=$item['productId'];
        $price=$item['productPrice'];
      
  
        
  
  
    $chartArray=array(
      $id=>array(
     
         'name'=>$name,
         'id'=>$id,
         'price'=>$price,
       
     ));
   
  
  
       
     if(empty($_SESSION['b'])){
  
      $_SESSION['b']=array();
      array_push($_SESSION['b'],$id);
  
    
     }
   
     if(empty($_SESSION['shopping_cart']) ){
              
               
             
                $_SESSION['shopping_cart']=$chartArray;
             
               
          }
        
           else{
            
              if(in_array($id,$_SESSION['b']))
                     {
                       
                     }
  
              else{
                   
                    
                    array_push($_SESSION['b'],$id);
                   
                    $_SESSION['shopping_cart']=array_merge($_SESSION['shopping_cart'],$chartArray);
                 
              }
          }      
  
         
    
    //  unset($_SESSION['shopping_cart']);
    //  unset($_SESSION['b']);
  


  //   // remove item from bill
  //   if ( isset($_GET['action']) && $_GET['action']=="remove"){
         

  //   $check=in_array($_GET['id'],$_SESSION['b']);
   
  //     if($check){
  //       unset($_SESSION['b'][$_GET['id']]);
  //     }

    
  // if(!empty($_SESSION["shopping_cart"])) {
  
  //     foreach($_SESSION["shopping_cart"] as $key => $value) {
     
      
  //       $values = (array_values($_SESSION["shopping_cart"])[$key]);

  //       if((array_values($_SESSION["shopping_cart"])[$key]['id']) ==$_GET["id"]){
  //         unset( array_values($_SESSION["shopping_cart"])[$key]['id'] );
          
            
  //       }

      
  //       if(empty($_SESSION["shopping_cart"]))
  //       unset($_SESSION["shopping_cart"]);
  //       }
       
  // }


  //   }
    

 echo    '<table class="table homeUser-products">';
 


    $totalprice=0;
    
  if(isset($_SESSION['shopping_cart'])){
    foreach($_SESSION['shopping_cart'] as $key => $value) {

      $price = $value['price'];
      echo "<tr>  ";
      echo "<td>"  . $value['name']."</td>";
      echo "<td> EGP" . $price."</td>";
      echo "<td> <img class='decQuantity' onClick='decreaseQuantity($price)' id='".$value['id']."' src='minus.png' width='20px' height='20px' /></td>";
      echo "<td> <input type='number' name='quantity' min='1' value='1' > </td>";
      echo "<td> <img class='addQuantity' onClick='increaseQuantity($price)' id='".$value['id']."' src='plus.jpg' width='20px' height='20px' /></td>";
      echo "<td> <img class='remove' id='".$value['id']."'  onClick='delete_row(this)' src='delete.png' width='20px' height='20px' /></td>";   
 
    
     
      echo "</tr>";
      if(empty($_GET['quantity'])){
        $_GET['quantity']=0;
      }
    //   $totalprice+=$_GET['price']*$_GET['quantity'];
      }
    

  } 
    
  ///
 
  // echo $totalprice;
        
     
echo   "</table>";
    
}

?>
<script>

function delete_row(e)
{
    e.parentNode.parentNode.remove(e.parentNode);
}

// var count = 0;
// function increaseQuantity(price){
//  count +=1;
//  var total = price*count;
//  return total;
 

// }






</script>