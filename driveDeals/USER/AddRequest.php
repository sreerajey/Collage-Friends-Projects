<?php
session_start();
$uid = $_SESSION['uid'];
include('UserHeader.php')
?>

<section class="ftco-section contact-section"><br><br>
    <center>
        <H1>Add Accessories</H1>
    </center><br><br>
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-8 block-9 mb-md-5" style="margin-left: 18%;">

                <form method="post" class="bg-light p-5 contact-form">

                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" class="form-control" placeholder="Add Accessories" name="request" required></textarea>
                    </div><br>
                    <center>
                        <div class="form-group">
                            <input type="submit" value="Submit" name="register" class="btn btn-primary py-3 px-5">
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>
    
</section>

<?php
include('../COMMON/CommonFooter.php')
?>

<!-- ================ Code section Start ================= -->

<?php
include '../CONNECTION/DbConnection.php';

if (isset($_REQUEST['register'])) {

    $Request = $_REQUEST['request'];
    $bid = $_REQUEST['bid'];

    $qryReg = "UPDATE `book` SET `accessories`='$Request' WHERE `bid`='$bid' AND `usertype`='USER'";

    // echo $qryReg . "&& " . $qryLog;

    if ($conn->query($qryReg) == TRUE) {
        echo "<script>alert('Added SuccessFully');window.location = 'ViewBooking.php';</script>";
    } else {
        echo "<script>alert('Registration Failed');window.location = 'ViewCars.php';</script>";
    }
}


?>

<!-- ================ Code section end ================= -->