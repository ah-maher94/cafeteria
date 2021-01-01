<?php
session_start();
// Include config file
require_once "ORMclass.php";
 
$message = "";  

$username = $password = "";
$name_err =$password_err =$userType_err= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!isset($_POST['costmer']))
    {
        $userType_err="Please choose one";
    }
    $username = trim($_POST["username"]);
    // $username = trim($_POST["username"]);

    if(empty($username)){
        $name_err = "Please enter your email.";

    } else{
        $name_err = "";
    }

    $password = trim($_POST["password"]);
    if(empty($password)){
        $password_err = "Please enter your password.";

    } else{
        $password_err = "";
    }
    // $username = trim($_POST['username']);
    // $password = trim($_POST['password']);
    if(isset($_POST['submitBtnLogin'])) {
    
    if($username != "" && $password != ""  && empty($name_err) && empty($password_err) && empty($userType_err)) {
        try {
            $costmer = $_POST['costmer'];  
        if ($costmer == "1") {          
            $query = "select * from `users` where `userEmail`='".$username."' and `userPassword`='".md5($password)."'";
        }
        else {
            $query = "select * from `admin` where `adminName`='".$username."' and `adminPassword`='".$password."'";
        } 
        $users=new ORM();
        
        $connect=$users ->connect('cafateria','3306','root','sayed771995');
        $res=$users -> executeQuery($query);
        $records=$res -> fetchAll(PDO::FETCH_ASSOC);
        // var_dump($records);
        $count = $res->rowCount();
        if($count == 1 && !empty($records)) {
            // session_start();
            setcookie('login','true');
            setcookie('userID',$records[0]['userId']);
            if(isset($_POST['remember']))
            {
                
            }
            if($costmer == "1")
            {
                setcookie('userRole','user');
            }
            else if($costmer == "2")
            {
                setcookie('userRole','admin');
            }
            $_POST = array();
            header ('location: index.php');
            exit;
            $username ="";
            $password ="" ;
            /******************** Your code ***********************/
            // $_SESSION['sess_user_id']   = $row['uid'];
            // $_SESSION['sess_user_name'] = $row['userName'];
            // $_SESSION['sess_name'] = $row['userPassword'];
        
        } else {
            // header ('location: ./login.html');
            $name_err = "Invalid Email Address!";
            $password_err = "Invalid password!";
        
        }
        } catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
        }
    } 
    }  

}
?>



<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->
    <link rel="stylesheet" href="css/merna_style.css" type="text/css">

    <style>
        .help-block{
            color:red;
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
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                            <div class="group-input <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label for="username">Email address *</label>
                                <input type="text" id="username" name="username"  value="<?php echo $username; ?>" >
                                <span class="help-block"><?php echo $name_err;?></span>
                               
                            </div>
                            <div class="group-input  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="password" value="<?php echo $password; ?>" >
                                <span class="help-block"><?php echo $password_err;?></span>
                              
                            </div>
                            <div class="my-4">        
                                
                                <input type="radio" id="user" name="costmer" value="1"> User
                                <input type="radio" class="ml-3" id="admin" name="costmer" value="2"> Admin
                                <span class="help-block"><?php echo $userType_err;?></span>
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Remember me
                                        <input type="checkbox" id="save-pass" name="remember">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="./reset-password.php" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn" name="submitBtnLogin">Sign In</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

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
</body>

</html>