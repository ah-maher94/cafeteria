<?php


include 'userClass.php';
require_once("checkCookies.php");


$user= new user();
$user->database_con();



?>



<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
      <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/orders-users.css" type="text/css">
    <link rel="stylesheet" href="css/products.css" type="text/css">

    <style>
    #productcontainer{
        padding-top:100px;
        padding-bottom:100px;
    }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        hello.colorlib@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right">
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-1.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.html">Home</a></li>
                        <li><a href="./shop.html">Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./check-out.html">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                                <li><a href="./register.html">Register</a></li>
                                <li><a href="./login.html">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

                
    
  
  


<!-- products -->

<div class="container" id="productcontainer">

<form method="POST" action="insert-orders.php" id="order-form">
 <div class="row">
   <div class="col-sm-12 col-md-7 " >

   <!-- <form method="GET" id="bill"> -->




<div class="make-order-table">


<table id="bill">
<tbody>




</tbody>
</table>


</div>




   <?php


  ?>

<div class="form-group">
    <h5><span class='badge badge-primary mb-2 mt-5' id="orderNotes">Order Notes</span></h5>
    <textarea class="form-control col-8" id="exampleFormControlTextarea1" rows="3" name="notes"></textarea>
  </div>




<?php

echo "<h5><span class='badge badge-primary mb-3'>Room Number</span></h5>";
$rows=$user->showAllRooms();


echo "<label for='edit-user-room'>Room</label>
<select class='custom-select col-6' id='edit-user-room' name='userRoom' aria-describedby='validationServer04Feedback' required>
  <option disabled value=''>Choose...</option>";

       foreach($rows as $row){

            echo "<option value='".$row['roomId']."'>".$row['roomNumber']."</option>";
       }

echo "</select>
<div id='validationServer04Feedback' class='invalid-feedback'>
  Please select a valid Room Number..
</div>";

?>

<div class="col-11 mt-3 align-items-end">Total Price <span class="badge badge-secondary totalPrice"></span>
</div>

<div class="col-6"><button type="submit" name='add-order' id="add-order" class="btn btn-success col-6 mt-5">Submit</button></div>



</form>


   </div>







   <div class="col-sm-12 col-md-5" >



   <?php
echo "<div class='row justify-content-around mt-3 mb-3'>";

$rows=$user->showAllUsers();


echo "<h4><span for='select-user' class='badge badge-primary'>User Name</span></h4>
    <select class='custom-select col-6' id='select-user' name='user-order-name' aria-describedby='validationServer04Feedback' required>
  <option disabled value=''>Choose...</option>";

       foreach($rows as $row){

            echo "<option value='".$row['userId']."'>".$row['userName']."</option>";
       }

echo "</select>
<div id='validationServer04Feedback' class='invalid-feedback'>
  Please select a valid User..
</div></div>";

?>





<?php 

$rows=$user->showLatestProductroduct();
echo "<h3><span class='badge badge-primary'>Latest Order</span></h3>";

echo "<div class='row justify-content-around mt-3'>";
  foreach($rows as $row){
   

    echo 
    "<div class='col-6 col-sm-4 col-md-3 wrapperLatest align-items-end justify-content-center'>
        <div class='card productCard text-center' style='width: 70%; height: 100%'>
        <img class='card-img-top' height='65%' src='img/product/".$row['productImage']."' alt='Card image cap'>
        <div class='card-title'>
            <h5><span class='badge badge-pill badge-light'>".$row['productName']."</span></h5>
        </div>
        </div>
    </div>";

    
}

echo "</div>";


?>

   <hr style='bprder:2px solid #000;'>


      <?php


$rows=$user->showproducts();

echo "<div class='row justify-content-between'>";

  foreach($rows as $row){


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
      </div>    
   </div>
 </div>
</div>



     


    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>orderNotes: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>




    $(document).ready(function(){

        
  
        // Prevent Duplication
        $('.buy').click(function (){
            
/*             console.log(orderProducts);
            console.log(orderProducts.includes($(this).attr('id'))); */

            var orderProducts = [];
            $("#bill tr").each(function(){
                orderProducts.push($(this).attr("id"));
            })
            if(orderProducts.includes($(this).attr('id'))){
                alert("You have already added this item");
            }else{

                orderProducts.push($(this).attr('id'));
                $.ajax({
                    type : 'GET',
                    url : "add-home-user.php",
                    data : 'id='+$(this).attr('id'),
                    success : function(response) {
                    $('#bill').append(response);

        }
     
        });
        
        var totalOrder = 0;
            $(".order-product-quantity-input").each(function(){
              totalOrder += $(".order-product-quantity-input").next().val() * $(".order-product-quantity-input").val();
              console.log($(".order-product-quantity-input").next().val());
              console.log($(".order-product-quantity-input").val());
            })
            $(".totalPrice").html(totalOrder +  " EGP");
            console.log( $(this).parent().parent().children('span :eq(2)').html() );
    }

    
	});


    $("#add-order").click(function(event){
        event.preventDefault();
        var count = 0;
        $(".rowParent").each(function(){
            count ++;
        })

        if(count > 0){
            $("#order-form").submit();
        }else{
            alert("No Products Selected");
        }

    });

    $(".order-product-quantity-input").on('input',function(){
            var totalPrice = parseInt($(this).next().val()) * $(this).val();
            $(".total-price").html(totalPrice  );
            console.log(totalPrice);


    });






    // Increase Quantity







  
//////////////////////////




	
});


  </script>
 
 <script src="js/orders-users.js"></script>


    
</body>

</html>