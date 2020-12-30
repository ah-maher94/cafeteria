<?php
require_once("config.php");
require_once("checkCookies.php");


/* include 'userClass.php';

$user= new user();
$user->database_con(); */

/* if(isset($_GET['id'])){
    
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
 */

/* <!-- <script>

function delete_row(e)
{
    e.parentNode.parentNode.remove(e.parentNode);
} */

// var count = 0;
// function increaseQuantity(price){
//  count +=1;
//  var total = price*count;
//  return total;
 

// }


// </script> -->





if(isset($_GET['id'])){

  $productId = $_GET['id'];

  $selectProduct="select * from product where productId =?";
  $selectProductStmt=$db->prepare($selectProduct);
  $res=$selectProductStmt->execute([$productId]);

  $rows=$selectProductStmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($rows as $row){

      // Insert Data Into Table
      echo "<tr class='rowParent' id='".$row['productId']."'>
      <td><input type='hidden' name='productId[]' value='".$row['productId']."'></td>
      <td class='order-product-name'>".$row['productName']."</td>
      <td class='order-product-quantity'>
      <input type='number' min='1' name='quantity[]' class='order-product-quantity-input' value='1'>
      <input type='hidden' class='hidden-price' value='".$row['productPrice']."'></td>
      <td class='order-product-total'><span class='total-price'>".$row['productPrice']." EGP</span></td>
      <td class='order-product-delete'><i class='ti-close remove-product' id='".$row['productId']."'></i></a></td>
      </tr>";


      // <input type='hidden' class='hidden-price' value='".$row['productPrice']."'>

      // <button class='update-quantity'>Update</button>

}


}



?>


<script>
    $(document).ready(function(){

/*
             $('.anotherOne').click(function(){
              var currProduct = "productId"+
                $(this).next().val( parseInt($(this).next().val())+1 );
            });


        $('.reduceOne').click(function(){
          if( $(this).prev().val() >= 2 ){
            $(this).prev().val( parseInt($(this).prev().val())-1 );
          }else{
            alert("You can remove the item from delete button");
          }
          }); */


          $(".order-product-quantity-input").change(function(){
            var totalProduct = $(this).next().val() * $(this).val();
            $(this).parent().next().children('span').html(totalProduct + " EGP");
            var totalOrder = 0;
            $(".order-product-quantity-input").each(function(){
              totalOrder += $(this).next().val() * $(this).val();
            })
            $(".totalPrice").html(totalOrder + " EGP");
          });



/*           $(".update-quantity").click(function(event){
            event.preventDefault();
            var total = $(this).next().val() * $(this).prev().val();
            $(this).parent().next().children('span').html(total + " EGP");
          });
 */

          $(".remove-product").click(function(){
            $(this).parent().parent().remove();
            var totalOrder = 0;
            $(".order-product-quantity-input").each(function(){
              totalOrder += $(this).next().val() * $(this).val();
            })
            $(".totalPrice").html(totalOrder + " EGP");

          });


    });

</script>