<?php
session_start();

include("Header_Seller.php");
include("dbConnection.php");
$centerid = $_SESSION['userregid'];
$payid=$_REQUEST['ids'];

?>
<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Seller Token Creation</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>Order Verify and Token Create</li>
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
                <h3 class="title-style">Token Creation</h3>
            </div>
            <div class="row contact-block">
                <div class="col-md-7 contact-right">
                    <form action="" class="signin-form">
                    <div class="input-grids">
                    Payment ID :
                            <input type="text" name="subject" id="w3lSubect" placeholder="Subject"
                                class="contact-input" required="" value="<?php echo $payid ?>" readonly />
                                
                        </div>
                        <div class="form-input">
                            <textarea name="address" id="w3lMessage" placeholder="Token Number !!"
                                required=""></textarea>
                        </div>
                        <div class="text-start">
                            <button class="btn btn-style btn-style-3" type="submit" name="regbtn">Proceed</button>
                        </div>
                    </form>
                    <?php

if (isset($_REQUEST['regbtn'])) {

    $uname = $_REQUEST['subject'];
    $date = date('d-m-y h:i:s');

    $ucontact = $_REQUEST['address'];

$DATA="insert into token(sid,payid,tokenno,dates)values('$centerid','$uname','$ucontact','$date')";
$up="update payment set token='yes' where payid=$uname";
echo $up;
if (($conn->query($DATA)==TRUE) && ($conn->query($up))) {  
        echo "<script>alert('add Token Number')</script>";
        echo "<script>window.location.href='sellermybooking.php';</script>";
    }else{
        echo "<script>alert('add Token failed')</script>";
        echo "<script>window.location.href='sellermybooking.php';</script>";
    }
}

?>
                </div>
                <div class="col-md-5 ps-lg-5 mt-md-0 mt-5">
                    <div class="contact-left"><br><br><br>
                      
                    </div>
                </div>
            </div>
        </div>
    </section> 
    

<?php
include("footer.php");
?>