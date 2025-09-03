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
    <title>Online-cafeteria</title>
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
                      Online-cafeteria                </a><i class="fal fa-pizza fa-pulse"></i>
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
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Sign In</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>Login</li>
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
                <h3 class="title-style">Login</h3>
            </div>
            <div class="row contact-block">
                <div class="col-md-7 contact-right">
                    <form action="" class="signin-form">
                        <div class="input-grids">
                           
                            <input type="text" name="uphone" id="w3lSubect" placeholder="Phone Number"
                                class="contact-input" required="" maxlength="10" />
                            <input type="password" name="upass" id="w3lWebsite" placeholder="Password"
                                class="contact-input" required="" />
                        </div>
                     
                        <div class="text-start">
                            <button class="btn btn-style btn-style-3" type="submit" name="loginbtn">Login</button>
                        </div>
                    </form>
                    <?php

if (isset($_REQUEST['loginbtn'])) {
    include("dbConnection.php");
session_start();
    $uphone = $_REQUEST['uphone'];
    $upass = $_REQUEST['upass'];


    $st="ACTIVE";
	$qry = "SELECT * FROM tb_login WHERE `uphone` = '$uphone' AND `upass` = '$upass' AND `status`='$st'";
	$result = mysqli_query($conn, $qry);
	if ($result->num_rows > 0) {
		$data = $result->fetch_assoc();
		$uid = $data['reg_id'];
		$type = $data['user_type'];
		$_SESSION['userregid'] = $uid;
		$_SESSION['type'] = $type;
        echo $qry;
		echo "<script>alert('Login Success')</script>";
		if ($type == 'admin'){
			echo "<script>window.location='SellerHome.php'</script>";
		} else  if ($type == 'CUSTOMER'){
			echo "<script>window.location='UserHome.php'</script>";
		}
	   }
    else {
		echo "<script>alert('Invalid email and password');
		window.location='login.php';</script>";
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
    <!-- map -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317718.69319292053!2d-0.3817765050863085!3d51.528307984912544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2spl!4v1562654563739!5m2!1sen!2spl"
            width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen=""></iframe>
    </div>
    <!-- //contact block -->
<?php
include_once("footer.php");
?>