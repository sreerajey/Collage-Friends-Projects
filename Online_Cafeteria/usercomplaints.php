<?php
session_start();

include("Header_User.php");
include("dbConnection.php");
$centerid = $_SESSION['userregid'];

?>


<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Customer Home</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>Complaints</li>
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
                <h3 class="title-style">Complaints</h3>
            </div>
            <div class="row contact-block">
                <div class="col-md-7 contact-right">
                    <form action="" class="signin-form">
                    <div class="input-grids">
                          
                            <input type="text" name="subject" id="w3lSubect" placeholder="Subject"
                                class="contact-input" required="" />
                                
                        </div>
                        <div class="form-input">
                            <textarea name="address" id="w3lMessage" placeholder="Description"
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

$DATA="insert into complaint(uid,subject,des,dates)values('$centerid','$uname','$ucontact','$date')";
if ($conn->query($DATA)==TRUE) {
      
        echo "<script>alert('add usercomplaints')</script>";

        echo "<script>window.location.href='usercomplaints.php';</script>";
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