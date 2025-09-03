<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';
include('SellerHeader.php')
?>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">View</span>
                <h2 class="mb-2">History</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $res = mysqli_query($conn, "SELECT * FROM `book`,`car`,`user` WHERE `book`.`cid`=`car`.`cid` AND `book`.`uid` = `user`.`uid` AND `car`.`cstatus` ='sold' ORDER BY `book`.`bid` DESC");
            while ($rs = mysqli_fetch_array($res)) {
                $cid = $rs['cid'];
            ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end" style="background-image: url(../assets/image/<?php echo $rs['cphoto'] ?>);">
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="#"><?php echo $rs['cname'] ?></a></h2>
                            <div class="d-flex mb-3">
                                <span class="cat"><?php echo $rs['cmodel'] ?></span>
                                <p class="price ml-auto">&#8377;<?php echo $rs['cprice'] ?> <span></span></p>
                            </div>
                            <p>
                                Desc: <span style="color: black; font-weight: bolder;"><?php echo $rs['cdesc'] ?></span>
                            </p>

                            <p>
                                Purchased By: <span style="color: black; font-weight: bolder;"><?php echo $rs['uname'] ?></span>
                            </p>

                            <p>
                                Purchased Date: <span style="color: black; font-weight: bolder;"><?php echo $rs['bdate'] ?></span>
                            </p>

                            <p>
                                Delivery Date: <span style="color: black; font-weight: bolder;"><?php echo $rs['deliverydate'] ?></span>
                            </p>

                            <p>
                                Address: <span style="color: black; font-weight: bolder;"><?php echo $rs['uaddress'] ?></span>
                            </p>

                            <p>
                                Status: <span style="color: green; font-weight: bolder; font-size: x-large;"><?php echo strtoupper($rs['cstatus']) ?></span>
                            </p>

                            <!-- <p class="d-flex mb-0 d-block"><a href="VerifyBooking.php?id=<?php echo $cid ?>&status=sold" class="btn btn-primary py-2 mr-1">Approve</a> 
                            <a href="VerifyBooking.php?id=<?php echo $rs['cid'] ?>&status=rejected" class="btn btn-danger py-2 ml-1">Reject</a></p> -->
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
</section>


<?php
include('../COMMON/CommonFooter.php')
?>