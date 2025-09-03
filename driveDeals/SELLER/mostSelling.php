<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';
include('SellerHeader.php')
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            $res = mysqli_query($conn, "SELECT * FROM `car` ,`seller` WHERE `scount`!='0' AND `seller`.`sid`=`car`.`sid` ORDER BY `scount` DESC");
            while ($rs = mysqli_fetch_array($res)) {
                $cid = $rs['cid'];
            ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end" style="background-image: url(../assets/image/<?php echo $rs['cphoto'] ?>);">
                            <!-- Add a badge image here -->
                            <h3 class="ml-2" style="color: white;"><?php echo $rs['scount'] ?></h3>
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="#"><?php echo $rs['cname'] ?></a></h2>
                            <div class="d-flex mb-3">
                                <span class="cat"><?php echo $rs['cmodel'] ?></span>
                                <p class="price ml-auto">&#8377;<?php echo $rs['cprice'] ?> <span>/day</span></p>
                            </div>
                            <p>
                                <span style="font-size:20px; color: black;">Info</span> <i class="fa fa-info-circle" aria-hidden="true" style="font-size:20px; color: blue;"></i> : <span style="color: black; font-weight: bolder;"><?php echo $rs['cdesc'] ?></span><br>
                                <i class="fa fa-map-marker" aria-hidden="true" style="font-size:20px; color: red;"></i> <span style="color: black; font-weight: bolder;"><?php echo $rs['sdistrict'] ?></span><br>
                                <i class="fa fa-map-marker" aria-hidden="true" style="font-size:20px; color: red;"></i> <span style="color: black; font-weight: bolder;"><?php echo $rs['sname'] ?></span><br>
                                <i class="fa fa-phone" aria-hidden="true" style="font-size:20px; color: red;"></i> <span style="color: black; font-weight: bolder;"><?php echo $rs['sphone'] ?></span>
                            </p>
                            <!-- <p class="d-flex mb-0 d-block"><a href="UpdateCar.php?id=<?php echo $cid ?>" class="btn btn-primary py-2 mr-1">Update</a>
                                <a href="RemoveCar.php?id=<?php echo $rs['cid'] ?>" class="btn btn-danger py-2 ml-1">Delete</a>
                            </p> -->
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