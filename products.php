<?php
            
            require_once("config.php");
            
            
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $startProduct = ($page -1) * 3;


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
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a>
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
                        <li><a href="./home.html">Home</a></li>
                        <li><a href="./products.html">Products</a></li>
                        <li><a href="./blog.html">Users</a></li>
                        <li><a href="./contact.html">Manual Order</a></li>
                        <li><a href="./contact.html">Checks</a></li>
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
                        <span>Products</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->



    <!-- Edit Product Modal Begin -->

    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="productModalLabel">Edit Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- Product Info -->
        <form method="POST" action="update-product.php">
        <div class="modal-body editProductModalBody">



        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="updateProduct btn btn-primary" name="updateProduct">Update</button>
        </div>
        </form>
        </div>
    </div>
    </div>


    <!-- Edit Product Modal End -->


    <!-- Confirm Delete Product Modal Begin -->

    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteProductModalLabel">Confirm Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="delete-product.php">
        <div class="modal-body deleteProductModalBody">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="Submit" class="deleteProduct btn btn-danger" name="deleteProduct">Delete</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!-- Confirm Delete Product Modal End -->





    <!-- Products Table Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">

            <div class="row justify-content-end mb-5">
                <button type="button" class="btn btn-primary">Add New Product</button>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                    <table>
                            <thead style="margin-bottom:30px;">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>


                    <?php

                            $selectAll="select `productId`, `productName`, `productPrice`, `productImage`, `productAvailability` from product limit $startProduct,3";
                            $selectAllStmt=$db->prepare($selectAll);
                            $res=$selectAllStmt->execute();
                            
                            $rows=$selectAllStmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach($rows as $col){

                                // Insert Data Into Table
                                echo "<tr><td class='product-name'>".$col['productName']."</td>
                                <td class='product-price'>".$col['productPrice']." EGP</td>
                                <td class='product-image'><img height='80px' src='img/product/".$col['productImage']."' /></td>";
                                
                                if($col['productAvailability'] == 1){
                                    echo "<td class='available pr-4'>Available</td>";
                                }
                                else{
                                    echo "<td class='available pr-4'>Unavailable</td>";
                                }
                                
                                // Action Buttons
                                echo "<td class='actions'><button type='button' class='editProduct btn btn-success' id='".$col['productId']."'>Edit</button>
                                                          <button type='button' class='confirmDeleteProduct btn btn-danger' id='".$col['productId']."'>Delete</button></td>";

                                echo "</tr>";

                            }

                    ?>

                            </tbody>
                        </table>


                    <div class="row justify-content-around mt-3">
                    <div class="col-lg-6 text-center">

                        <?php 
                        $selectAll="select * from product";
                        $selectAllStmt=$db->prepare($selectAll);
                        $res=$selectAllStmt->execute();
                        $rowsNum=$selectAllStmt->rowCount();
                               
                        // Previous Button
                        if($page > 1){
                             echo "<a href='products.php?page=".($page-1)."' class='pageNum btn btn-secondary'>Previous</a>";
                        }
                        // Page Numbers
                        for($pageNum = 1; $pageNum <= ceil($rowsNum/3); $pageNum++){
                            ?> <a href="products.php?page= <?php echo $pageNum ?>" class="pageNum btn btn-primary"> <?php echo $pageNum ?> </a> <?php
                        }
                        // Next Button
                        if($pageNum-1 > $page){
                            echo "<a href='products.php?page=".($page+1)."' class='pageNum btn btn-secondary'>Next</a>";
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
                                <a href="#" class="proceed-btn">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Products Table Section End -->
    
    
    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
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
    </div>
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
    <script src="js/orders-users.js"></script>

</body>

</html>