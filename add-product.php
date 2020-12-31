<?php
            
            require_once("config.php");
            require_once("checkCookies.php");

            if($_COOKIE['userRole'] == 'user'){
                header('Location: ./index.php');
            }

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>

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
                        cafeteria.iti@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        01010101010
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
                            <a href="./index.php">
                            <i class="fa fa-coffee fa-3x"  style="color:black" aria-hidden="true"></i>
                            </a>
                                <p class='typewriter'>.
                                <span class='typewriter-text' data-text='[ " World&#39;s #0 Cafeteria. ", "Coffee <br> ", "ITI Cafeteria. " ]'></span>
                                </p>
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
                        <span>All Products</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="./products.php">Espresso</a></li>
                            <li><a href="./products.php">Hot Drinks</a></li>
                            <li><a href="./products.php">Coffee</a></li>
                            <li><a href="./products.php">Tea</a></li>
                            <li><a href="./products.php">Cold Drinks</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./view-orders.php">My Orders</a></li>
                        <li><a href="./view-users.php">Users</a></li>
                        <li><a href="./main-shop.php">Manual Order</a></li>
                        <li><a href="./checks.php">Checks</a></li>
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
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="">Products</a>
                        <span>Add Product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
            


    <!-- Add Category Start -->


    <div class="modal fade" id="insertCategoryModal" tabindex="-1" role="dialog" aria-labelledby="insertCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="insertCategoryModalLabel">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body insertCategoryModalBody">
                    <label for="new-category-name">Category Name</label>
                    <input type="text" name="categoryName" id="new-category-name">
                    <label class="valid-feedback-new-category">Enter valid name</label>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" id="insertCategory" class="insertCategory btn btn-primary" name="insertCategory">Add</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Add Category End -->


    <!-- Add Product Form Begin -->
      <div class="container mt-5">  
            <form autocomplete="off" method="POST" id="addProductForm" action="insert-product.php"  enctype="multipart/form-data">
            <!-- <form autocomplete="off" enctype="multipart/form-data"> -->


            <div class="row">


            <!-- Left Column Start -->

                <div class="col-6">

                 <div class="form-row mt-3">
                   <div class="col-8 mb-3">
                     <label for="new-product-name">Product Name</label>
                     <input type="text" class="form-control" name="productName" id="new-product-name" required>
                     <div class="valid-feedback">
                    Looks good!
                    </div>
                    <div class="invalid-feedback">
                    Please enter a valid name.
                    </div>
                   </div>
                </div>


                 <div class="form-row mt-3">
                    <div class="col-6 mb-3">
                        <label for="new-product-price">Price</label>
                        <input type="number" class="form-control" name="productPrice" id="new-product-price" min="1" required>
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                        <div class="invalid-feedback">
                        Please enter a valid price.
                        </div>
                    </div>
                    <div class="col-2 mb-3 pt-4 align-items-end text-center">
                        <h4 style="margin-top:10px"><span class="badge badge-secondary">EGP</span></h4>
                    </div>
                </div>

                <!-- Select All Categories -->
                <?php

                    $selectCategories = "select * from category";
                    $stmt = $db->prepare($selectCategories);
                    $res = $stmt->execute();
                    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

                ?>

                 <div class="form-row mt-3">
                   <div class="col-6 mb-3 categories">
                     <label for="new-product-category">Category</label>
                     <select class="custom-select" id="new-product-category" name="category" aria-describedby="validationServer04Feedback" required>
                       <option selected value="">Choose...</option>

                       <?php
                            foreach($rows as $row){
                                echo "<option value='".$row['categoryId']."'>".$row['categoryName']."</option>";
                            }
                       ?>

                     </select>
                     <div class="valid-feedback">
                        Looks good!
                        </div>
                        <div class="invalid-feedback">
                        Please select category.
                        </div>
                   </div>
                   <div class="col-4 mb-3 pt-4 align-items-end text-center">
                    <h4 style="margin-top:10px"><span style="cursor: pointer;" id="addCategory" class="addCategoryLabel badge badge-secondary">Add Category</span></h4>
                    </div>
                 </div>


                 <div class="form-row mt-3">
                   <div class="col-6 mb-3">
                     <label for="new-product-availability">Availability</label>
                     <select class="custom-select" id="new-product-availability" name="availability" aria-describedby="validationServer04Feedback" required>
                       <option selected value="">Choose...</option>
                       <option value="1">Available</option>
                       <option value="0">Unavailable</option>
                     </select>
                     <div class="valid-feedback">
                        Looks good!
                        </div>
                        <div class="invalid-feedback">
                        Please select a valid choice.
                        </div>
                   </div>
                 </div>



                 <div class="form-row mt-3">
                    <div class="col-4 mb-1">
                    <label for="new-product-pic">Product Picture</label>
                    </div>
                    <div class="col-8 mb-3 custom-file">
                        <input type="file" name="profilePic" id="new-product-pic" accept="image/*">
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                        <div class="invalid-feedback">
                        Please select a valid picture.
                        </div>
                    </div>
                 </div>


                 <div class="form-row mb-5 mt-5 justify-content-center">
                    <div class="col-4 col-lg-2">
                        <button class="btn btn-primary mr-3" id="insertProduct" type="submit">Save</button>
                    </div>
                    <div class="col-4 col-lg-2 ml-1">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </div>


                </div>
            <!-- Left Column End -->


            <!-- Right Column Start -->
            <div class="col-6">

                <div class="coffeeBigger" style="margin-top:200px;">
                    <div class="tasse">

                        <div class="smoke">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        </div>

                        <div class="fillin"></div>
                        <div class="griff"></div>
                        <div class="untertasse"></div>
                    </div>
                </div>

            </div>
            <!-- Right Column End -->




            </div>
                 </form>



                      
        </div>

    <!-- Add Product Form End -->



    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                        <a href="./index.php">
                            <i class="fa fa-coffee fa-3x"  style="color:white" aria-hidden="true"></i>
                            </a>
                                <p class='typewriter typeFooter'>.
                                <span class='typewriter-text typeFooterText' data-text='[ " World&#39;s #0 Cafeteria. ", "Coffee <br> ", "ITI Cafeteria. " ]'></span>
                                </p>
                        </div>
                        <ul>
                            <li>Address: Cairo, Egypt</li>
                            <li>Phone: 01010101010</li>
                            <li>Email: cafeteria.iti@gmail.com</li>
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
                            <li><a href="#">Services</a></li>
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