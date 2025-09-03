<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online-restaurants</title>
    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!-- header -->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.html">                    
                      <img src="assets/images/icon-2.png" alt="" class="img-fluid">
                    Online_Restaurants  
                </a><i class="fal fa-pizza fa-pulse"></i>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addsellers.php">Add Expert</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="adddelivery.php">Add delivery</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customerRegistration.php">Customer</a>
                        </li>
                    </ul>
                    <!-- search-right -->
                  
                    <!--//search-right-->
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
<?php
include("dbConnection.php");
?>


<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Admin</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Delivery</a></li>
                    <li class="active"><i class="fas fa-angle-right">Add Delivery man</i></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->
 

    <!-- contact block -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase"></p>
                <h3 class="title-style">Add Delivery man</h3>
            </div>
            <div class="row contact-block">
                <div class="col-md-7 contact-right">
                    <form action="" class="signin-form">
                    <div class="input-grids">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="uname" id="w3lName" placeholder="Your Name"
                                        class="contact-input" required="" />
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" name="email" id="w3lSender" placeholder="Your Email"
                                        class="contact-input" required="" />
                                </div>
                            </div>
                            <input type="text" name="contact" id="w3lSubect" placeholder="Phone Number"
                                class="contact-input" required="" />
                          
                        </div>
                        <div class="form-input">
                            <textarea name="address" id="w3lMessage" placeholder="Address"
                                required=""></textarea>
                        </div>
                        <input type="password" name="upass" id="w3lWebsite" placeholder="Password"
                                class="contact-input" required="" />
                        <div class="text-start">
                            <button class="btn btn-style btn-style-3" type="submit" name="regbtn">Added</button>
                        </div>
                    </form>
                    <?php

if (isset($_REQUEST['regbtn'])) {

    $uname = $_REQUEST['uname'];
    $uemail = $_REQUEST['email'];
    $uaddress = $_REQUEST['address'];
    $ucontact = $_REQUEST['contact'];
    $upass = $_REQUEST['upass'];

    $res = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM `tb_login` WHERE `uphone`='$ucontact'");

    $rs = mysqli_fetch_array($res);

    if ($rs['cnt'] > 0) {
        echo "<script>alert('Contact Already Exists')</script>";
        echo "<script>window.location.href='customerRegistration.php';</script>";
    } else {
        mysqli_query($conn, "INSERT INTO `delivery` (`name`,`email`,`address`,`contact`,`password`)VALUES('$uname','$uemail','$uaddress','$ucontact','$upass')");
        $QRY2 = "INSERT INTO `tb_login` (`reg_id`,`user_type`,`uphone`,`upass`,`status`)values((SELECT max(`did`) from `delivery`),'delivery','$ucontact','$upass','ACTIVE')";

        // echo $QRY2;
        mysqli_query($conn, $QRY2);
        echo "<script>alert('adddelivery Added')</script>";
        echo "<script>window.location.href='adddelivery.php';</script>";
    }
}

?>
                </div>
                <div class="col-md-5 ps-lg-5 mt-md-0 mt-5">
                    <div class="contact-left">
                      
                    </div>
                </div>
            </div>
        </div>
    </section> 
    
    <!-- home 4grids block -->

<?php
include("footer.php");
?>