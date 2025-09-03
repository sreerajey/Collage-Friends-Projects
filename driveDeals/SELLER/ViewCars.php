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
                <h2 class="mb-2">Cars</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $res = mysqli_query($conn, "SELECT * FROM `car` WHERE `cstatus`!='sold'");
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
                                <p class="price ml-auto">&#8377; <?php echo $rs['cprice'] ?></p>
                            </div>
                            <p>
                                Desc: <span style="color: black; font-weight: bolder;"><?php echo $rs['cdesc'] ?></span>
                            </p>
                            <p class="d-flex mb-0 d-block"><a href="UpdateCar.php?id=<?php echo $cid ?>" class="btn btn-primary py-2 mr-1">Update</a>
                                <a href="RemoveCar.php?id=<?php echo $rs['cid'] ?>" class="btn btn-danger py-2 ml-1">Delete</a>
                            </p>
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