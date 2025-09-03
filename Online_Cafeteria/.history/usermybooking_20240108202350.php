<?php
session_start();

include("Header_User.php");
include("dbConnection.php");


?>


<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
            <h4 class="inner-text-title pt-5">Customer -All My Orders</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i></li>
                </ul>
            </div>
        </div>
    </section>
    
    
    <!-- courses section -->
    <div class="w3l-grids-block-5 home-course-bg py-5" id="courses">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase">My Items</p>
                <h3>My Bookings</h3>
            </div>
            <div class="row justify-content-center">

            <?php
                                        $centerid = $_SESSION['userregid'];

$qry = "SELECT `tb_product`.*,`token`.*,`payment`.`token` FROM `token` ,`tb_product`,`payment`,`cart` WHERE `token`.`payid`=`payment`.`payid` 
AND `payment`.`token`='yes'  AND `payment`.`pdid`=`tb_product`.`productcode` AND `cart`.`paid`='yes' AND `cart`.`pid`=`payment`.`pdid`
AND `cart`.`uid`='$centerid'";
$result = mysqli_query($conn, $qry);
echo "<h1>".$qry."</h1>";
      if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>

                <div class="col-lg-4 col-md-6">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">

                        <?php
                          echo "<img src='./". $row['image']. "'/>";
                            ?>
                        <div class="meta-list">
                            </div>
                        </div>
                        <div class="content-main-top">
                            <div class="content-top mb-4 mt-3">
                                <ul class="list-unstyled d-flex align-items-center justify-content-between">
                                    <li> <i class="fas fa-book-open"></i>Warranty  : <?php echo  $row['features'] ?> </li>
                                    <li> <i class="fas fa-book-open"></i>Brand   : <?php echo  $row['brand'] ?> </li>
                                </ul>
                                <hr>
                            </div>
                            <h4><a href="courses.html"><?php echo  $row['productname'] ?> </a></h4>
                            <p>Category : <?php echo  $row['category'] ?> </p>
                            <div class="top-content-border d-flex align-items-center justify-content-between mt-4 pt-4">
                                <h6>Rs.<?php echo  $row['price'] ?> </h6>
                                <hr>
                                <h6><?php echo  $row['warranty'] ?> </h6>

                                </div><br>
                                <h6>Verify Status :<?php echo  $row['token'] ?> </h6>
<br>
<hr>
                                <?php         
                                
                                if($row['token']=="yes"){

                                    ?>
                                    
                                    <h3 style="color: green;">Token Number  :<?php echo  $row['tokenno'] ?> </h3>

                                    <?php
                                }else{?>
                                    <h3 style="color: red;">Pending Verification</h3>
        <?php
                                }
            //    echo "
            //    <a href='return.php?ids=" . $row['cid'] . " '>  
            //    <button type='submit'  class='btn btn-success btn-lg'  style='padding-left: 2.5rem; radius:240px; padding-right: 2.5rem;background-color: #14b38b;float:right' name='login'>
            // Cancel Order</button ></a>";
            //   ?>
                        </div>
                    </div>
                </div>
                <?php
                }
} else {
    echo "bjkhfvdkjv";
    echo "<h1>".$centerid."</h1>";
    echo "  <center> <h2 style='color: red;'>.... No Data Found ...</h2></center> ";
}
?>

             


            </div>
          
        </div>
    </div>
    <!-- //courses section -->

<?php
include("footer.php");
?>