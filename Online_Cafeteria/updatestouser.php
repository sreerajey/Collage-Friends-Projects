<?php
session_start();

include("Header_Seller.php");
include("dbConnection.php");

$centerid = $_SESSION['userregid'];

?>


<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">SellerHome</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>Updates</li>
                </ul>
            </div>
        </div>
    </section>
    
    
    <!-- contact block -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase"></p>
                <h3 class="title-style">Change Seller Account to Customer</h3>
            </div>
            <div class="row contact-block">
                <div class="col-md-7 contact-right">
                    <form action="" class="signin-form">
                    <div class="input-grids">
                    <input type="hidden" name="iddd" value="<?php echo $centerid ?>" />

                          <br><br><br><br>
                        </div>
                        <div class="text-start">
                            <button class="btn btn-style btn-style-3" type="submit" name="regbtn">Change to User Account ?</button>
                        </div>
                    </form>
                    <?php

if (isset($_REQUEST['regbtn'])) {
    $pdid = $_REQUEST['iddd'];

$DATA="update tb_login set user_type='CUSTOMER' where reg_id='$centerid'";
    if ($conn->query($DATA)==TRUE) {
      
        echo "<script>alert('Updated Sucessful,Page will Exist Login again')</script>";
        echo "<script>window.location.href='login.php';</script>";
    }
}

?>
                </div>
                <div class="col-md-5 ps-lg-5 mt-md-0 mt-5">
                    <div class="contact-left"><br><br><br>
                      <h3 style="color:green">Once Update Here, You cannot Access Your Seller Account!!<br><br>
                    it Will Turn to New Customer Account</h3>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    
    

<?php
include("footer.php");
?>