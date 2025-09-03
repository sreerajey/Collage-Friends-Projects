<?php
session_start();

include("Header_User.php");
include("dbConnection.php");
$ids=$_REQUEST['ids'];
$centerid = $_SESSION['userregid'];

?>


<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">SellerHome</h4>
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
                                        class="contact-input" required=""  maxlength="16"/>
                                </div>
                            </div>
                            <input type="text" name="cvv" id="w3lSubect" placeholder="cvv"
                                class="contact-input" required="" maxlength="3"/>
                                <input type="text" name="amount" id="w3lSubect" placeholder="Expiry date"
                                class="contact-input" required="" maxlength="4"/>
                          
                        </div>
                      
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

$DATA="insert into payment(pdid,puid,cname,cno,cvv,amount,type)values('$pdid','$centerid','$uname','$cno','$uaddress','$ucontact','user')";
$up="update cart set paid='yes' where cid='$pdid'";
if ($conn->query($DATA)==TRUE& $conn->query($up)==TRUE) {
      
        echo "<script>alert('Paid Suucessful')</script>";
        echo "<script>window.location.href='viewcards.php';</script>";
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