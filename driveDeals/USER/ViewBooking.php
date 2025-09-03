<?php
session_start();
$uid = $_SESSION['uid'];
// echo $uid;
include '../CONNECTION/DbConnection.php';
include('UserHeader.php')
?>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">View</span>
                <h2 class="mb-2">Cars</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $res = mysqli_query($conn, "SELECT * FROM `book`,`car`,`user` WHERE `book`.`uid`='$uid' AND `book`.`cid`=`car`.`cid` AND `book`.`uid` = `user`.`uid`");
            while ($rs = mysqli_fetch_array($res)) {
                $cid = $rs['cid'];
                $bid = $rs['bid'];
            ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end" style="background-image: url(../assets/image/<?php echo $rs['cphoto'] ?>);">
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="#"><?php echo $rs['cname'] ?></a></h2>
                            <div class="d-flex mb-3">
                                <span class="cat"><?php echo $rs['cmodel'] ?></span>
                                <p class="price ml-auto">&#8377;<?php echo $rs['cprice'] ?> </p>
                            </div>
                            <p>
                                Desc: <span style="color: black; font-weight: bolder;"><?php echo $rs['cdesc'] ?></span>
                            </p>
                            <center>
                                <!-- <p class="d-flex mb-0 d-block"> -->
                                <?php if ($rs['status'] == "Requested") {
                                ?>
                                    <p class="d-flex mb-0 d-block">
                                        <a href="CreditCardForm.php?id=<?php echo $rs['cid'] ?>&bid=<?php echo $bid ?>&price=<?php echo $rs['cprice'] ?>" class="btn btn-primary py-2 mr-1">Pay Now</a>
                                        <a href="CancelCar.php?id=<?php echo $rs['cid'] ?>&bid=<?php echo $rs['bid'] ?>" class="btn btn-danger py-2 ml-1">Cancel</a>
                                    </p>
                                <?php } else if ($rs['status'] == "Paid") { ?>
                                    <p class="btn btn-success"><?php echo $rs['status'] ?></p>
                                <?php } else { ?>
                                    <a href="CancelCar.php?id=<?php echo $rs['cid'] ?>&bid=<?php echo $rs['bid'] ?>" class="btn btn-danger py-2 ml-1">Cancel</a>
                                <?php } ?>
                                <!-- </p> -->
                            </center>
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