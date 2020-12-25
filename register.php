<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

// Include config file
require_once "connection.php";

 
// Define variables and initialize with empty values
$name = $email = $password = $ext  = $image = $room = $input_confirm_password = "";
$name_err = $email_err = $password_err = $ext_err = $image_err = $room_err = $confirm_password_err = "" ;
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter your name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name without any special character.";
    } else{
        $name = $input_name;
    }

    
    // Validate email
    $input_email = trim($_POST["email"]);
    $query = $pdo->prepare( "SELECT `userEmail` FROM `users` WHERE `userEmail` = ?" );
    $query->bindValue( 1, $email );
    $query->execute([$input_email]);

    if( $query->rowCount() > 0 ) { # If rows are found for query
        $email_err = "this email is exist.";
    }
    else {
        if(empty($input_email)){
            $email_err = "Please enter your email.";     
        } elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9a-zA-Z]+([0-9a-zA-Z]*[-._+])*[0-9a-zA-Z]+@[0-9a-zA-Z]+([-.][0-9a-zA-Z]+)*([0-9a-zA-Z]*[.])[a-zA-Z]{2,6}$/")))){
            $email_err = "Please enter a valid email without any special character.";
        }else{
            $email = $input_email;
        }
    }
    
    // Validate password
    $input_password =trim($_POST["password"]);

    if(empty($input_password)){
        $password_err = "Please enter your password.";     
    }elseif(!filter_var($input_password, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z0-9@*#]{8,30})$/")))){
        $password_err = " Password length between 8-30 char, able only special char [@ * #]";
    }else{
        $password = $input_password;
        // $password = md5($input_password);
    }
//  Validate confirm password
    $input_confirm_password = trim($_POST["confirm_password"]);
    if($input_confirm_password != $input_password ){
        $confirm_password_err = "not matching";
    }

   
     // Validate ext
     $input_ext = trim($_POST["ext"]);
     if(empty($input_ext)){
         $ext_err = "Please enter a ext number.";
     } 
     elseif(!filter_var($input_ext, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([0-9]{1})$/")))){
         $ext_err = "please enter a ext floor from 1 to 9 .";
     } else{
         $ext = $input_ext;
     }
      // Validate image
      $input_image = trim($_FILES["image"]["name"]);
      if(empty($input_image)){
        $image_err = "Please enter an image.";
    //   } 
    //   elseif(!filter_var($input_ext, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(0|[1-9][0-9]*)$/")))){
    //     $ext_err = "this field is valid only a number.";
      } else{
          $image = $input_image;
      }
         // Validate room number
         $input_room = trim($_POST["room"]);
         if(empty($input_room)){
           $room_err = "Please enter an image.";
       //   } 
       //   elseif(!filter_var($input_ext, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(0|[1-9][0-9]*)$/")))){
       //       $ext_err = "this field is valid only a number.";
         } else{
             $room = $input_room;
         }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($password_err) && empty($ext_err) && empty($image_err) && empty($room_err) && empty($confirm_password_err)){
        // Prepare an insert statement
        // $sql = "INSERT INTO users (userName, userEmail, userPassword,userExt ) VALUES (:name, :email, :password, :ext)";
        /* Password. */
        // $password = '***************';
        /* Secure password hash. */
        // $param_password = password_hash($password, PASSWORD_DEFAULT);
        /* Values array for PDO. */
        // $password = md5($password);
        $sql = "INSERT INTO users (userName, userEmail, userPassword,userExt,userImage,roomId) VALUES (:name, :email, password, :ext, :image, :room)";
        
        // $values = [ ':password' => $hash];

        //opload image to server :)
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp, "./".$image);

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":email", $param_email);
            $stmt->bindParam(":password", $param_password);
            $stmt->bindParam(":ext", $param_ext);
            $stmt->bindParam(":image", $param_image);
            $stmt->bindParam(":room", $param_room);

            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_password = $password;
            $param_ext = $ext;
            $param_image = $image;
            $param_room = $room;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: aa.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
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
    <title>Fashi | Template</title>

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
    <style>
        .help-block{
            color:red;
        }
        .form-select{
            padding:3px 5px;
            height:50px;
            width:inherit;
            border:1px solid #ebebeb
        }
        .form-select:hover{
            cursor:pointer;
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

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
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
                    <div class="register-form">
                        <h2>Register</h2>
                        <p>Please fill this form and submit to create your account.</p>
                        <form   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <div class="group-input <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label for="name">Name *</label>
                                <input type="text" id="name" name="name" value="<?php echo $name; ?>"  autocomplete="off"> 
                                <span class="help-block"><?php echo $name_err;?></span>
                            </div>
                            <div class="group-input <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                <label for="email"> email address *</label>
                                <input type="text" id="email" name="email" value="<?php echo $email; ?>"  autocomplete="off">
                                <span class="help-block"><?php echo $email_err;?></span>
                            </div>
                            <div class="group-input <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="password" value="<?php echo $password; ?>"  autocomplete="off">
                                <span class="help-block"><?php echo $password_err;?></span>
                            </div>
                            <div class="group-input <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?> ">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="con-pass" name="confirm_password"  value="<?php echo $input_confirm_password; ?>"  autocomplete="off">
                                <span class="help-block"><?php echo $confirm_password_err;?></span>
                            </div>
                            <!-- <div class="group-input">
                                <label for="roomNo">Room Number *</label>
                                <input type="text" id="roomNo" name="room">
                            </div> -->
                            <div class="group-input <?php echo (!empty($room_err)) ? 'has-error' : ''; ?>">
                            <label>Room Number *</label> 
                            <select name="room" class="form-select <?php echo $image; ?>" aria-label="Default select example">
                                
                                <option selected disabled value="" >Choose your room number</option>
                                <option value="1">room 1000</option>
                                <option value="2">room 1002</option>
                                <option value="3">room 1003</option>
                                
                            </select>

                            
                            <span class="help-block"><?php echo $room_err;?></span>
                        </div>
                            <div class="group-input <?php echo (!empty($ext_err)) ? 'has-error' : ''; ?>">
                                <label for="Ext">Ext *</label>
                                <input type="text" id="Ext" name="ext" value="<?php echo $ext; ?>">
                                <span class="help-block"><?php echo $ext_err;?></span>
                            </div>
                            <div class="group-input <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                                <label for="Ext">Profile picture *</label>
                                <input type="file"  name="image" value="<?php echo $image; ?>">
                                <span class="help-block"><?php echo $image_err;?></span>
                            </div>

                                <button type="submit" class="site-btn register-btn">REGISTER</button>
                
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
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
                            <li>Address: 60-49 Road 11378 New York</li>
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
</body>

</html>