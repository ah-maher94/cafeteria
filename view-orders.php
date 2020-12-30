<?php
            require_once("config.php");
            require_once("checkCookies.php");

            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $startOrder = ($page -1) * 3;
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Orders</title>

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
                        ahmed.maher0094@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        01020214736
                    </div>
                </div>
                <div class="ht-right">
                    <a href="#" class="login-panel logout"><i class="fa fa-user"></i>Logout</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="img/egypt-flag-icon.png" data-imagecss="flag yu"
                                data-title="Arabic">Arabic </option>
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

                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All Departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Espresso</a></li>
                            <li><a href="#">Hot Drinks</a></li>
                            <li><a href="#">Coffee</a></li>
                            <li><a href="#">Tea</a></li>
                            <li><a href="#">Cold Drinks</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.html">Home</a></li>
                        <li><a href="./shop.html">My Orders</a></li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./check-out.html">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <span>My Orders</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->


    <!-- Filter By Date Section Begin -->

    <div class="container mt-5" style="width:80%">

            <div class="row justify-content-center">
            
                <div class="col-8 col-md-4">
                    <input type="text" class="form-control" id="from-date" name="from-date"  placeholder="from ...">
                    <div class="invalid-feedback">
                    Please select date.
                    </div>
                </div>

                <div class="col-8 col-md-4">
                    <input type="text" class="form-control" id="to-date" name="to-date" placeholder="to ...">
                    <div class="invalid-feedback">
                        Please select date.
                    </div>
                </div>

                <div class="col-5 col-md-2">
                    <button type="button" class="btn btn-info" id="filter-orders">Search</button>
                </div>

            
            </div>


    </div>
    <!-- Filter By Date Section End -->

    <!-- User Orders Section Begin -->
    <section class="shopping-cart spad">
        <div class="container orders-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">

                    
                    <table>
                            <thead style="margin-bottom:30px;">
                                <tr>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Total Price</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            


                    <?php
                            

                                $selectAll="select `orderId`, `orderDate`, `orderStatus`, `orderTotalPrice` from orders where userId=? order by orderStatus desc limit $startOrder,3";
                                $selectAllStmt=$db->prepare($selectAll);
                                $res=$selectAllStmt->execute([$_COOKIE['userID']]);
                                $numrows=$selectAllStmt->rowCount();
                                
                                $rows=$selectAllStmt->fetchAll(PDO::FETCH_ASSOC);
                                
                                $totalOrders = 0;
                                echo "<tbody id='order-table-body'>";
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

                    ?>

                            </tbody>
                        </table>


                    <div class="row justify-content-around mt-3">
                    <div class="col-lg-6 text-center">

                        <?php 
                        $selectAll="select * from orders where userId=?";
                        $selectAllStmt=$db->prepare($selectAll);
                        $res=$selectAllStmt->execute([$_COOKIE['userID']]);
                        $rowsNum=$selectAllStmt->rowCount();
                               
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

                        
                        ?>


                        </div>

                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="cart-total">This Page Orders <span><?php echo $totalOrders."$"?></span></li>
                                </ul>
                                <a href="#" class="proceed-btn">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Orders Section End -->




    <!-- Display Selected Order Start-->
    <section>
        <div class="container mb-5" id="selectedOrder">



        </div>
    </section>
    <!-- Display Selected Order End-->

    
    
    
    
    
    
    <!-- Partner Logo Section Begin -->
<!--     <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Partner Logo Section End -->

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
                            <li>Address: Cairo, Egypt</li>
                            <li>Phone: 01020214736</li>
                            <li>Email: ahmed.maher0094@gmail.com</li>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">ITI TEAM</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <!-- <img src="img/payment-method.png" alt=""> -->
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
    <script src="js/orders-users.js"></script>

</body>

</html>