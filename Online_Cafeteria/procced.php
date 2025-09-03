<?php
session_start();

include("Header_Seller.php");
include("dbConnection.php");
$amt=$_REQUEST['amout'];
$ids=$_REQUEST['ids'];
$centerid = $_SESSION['userregid'];

?>


<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Expert Home</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>Payment</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- contact block -->
    <!-- contact block -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase"></p>
                <h3 class="title-style">Payment</h3>
            </div>
            <div class="row contact-block">
                <div class="col-md-7 contact-right">
                    <form action="" class="signin-form">
                    <div class="input-grids">
                            <div class="row">
                                <img src="images/dataget.jpg"><br>
                                <div class="col-sm-6">
                                <input type="hidden" name="iddd" value="<?php echo $ids ?>" />
                                    <input type="text" name="cname" id="w3lName" placeholder="Card Holder Name"
                                        class="contact-input" required="" maxlength="16"/>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="cno" id="w3lSender" placeholder="Card Number"
                                        class="contact-input" required="" maxlength="16"/>
                                </div>
                            </div>
                            <input type="text" name="cvv" id="w3lSubect" placeholder="cvv"
                                class="contact-input" required="" maxlength="3"/>
                          
                        </div>
                      
                        <input type="number" name="amount" id="w3lWebsite" placeholder="" value="<?php  echo $amt/4 ?>" readonly
                                class="contact-input" required="" />
                        <div class="text-start">
                            <button class="btn btn-style btn-style-3" type="submit" name="regbtn">Proceed</button>
                        </div>
                    </form>
                    <?php

if (isset($_REQUEST['regbtn'])) {
    $pdid = $_REQUEST['iddd'];

    $uname = $_REQUEST['cname'];
    $cno = $_REQUEST['cno'];
    $uaddress = $_REQUEST['cvv'];
    $ucontact = $_REQUEST['amount'];
$DATA="insert into payment(pdid,puid,cname,cno,cvv,amount,type)values('$pdid','$centerid','$uname','$cno','$uaddress','$ucontact','seller')";
    if ($conn->query($DATA)==TRUE) {
      
        echo "<script>alert('Paid Suucessful')</script>";
        echo "<script>window.location.href='Othersitems.php';</script>";
    }
}

?>
                </div>
                <div class="col-md-5 ps-lg-5 mt-md-0 mt-5">
                    <div class="contact-left"><br><br><br>
                      <h3 style="color:red">Product Amount : <?php echo $amt; ?>/- </h3><br>
                      <h5 > Discount : 40% </h5><br>
                      <h3 style="color:green">Total  Amount : <?php echo $amt/4; ?>/- </h3>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    

<?php
include("footer.php");
?>