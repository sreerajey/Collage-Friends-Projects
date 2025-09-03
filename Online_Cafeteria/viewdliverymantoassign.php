


<?php

include("Header_Admin.php");
include("dbConnection.php");
$payid=$_REQUEST['ids'];

?>


<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">SellerHome</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i></li>
                </ul>
            </div>
        </div>
    </section>
    

    <!-- home 4grids block -->
    <section class="services-w3l-block py-5" id="features">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h3 class="title-style">Existing Sellers</h3>
            </div>
            <div class="row">
            <?php
$qry = "SELECT *from delivery";
$result = mysqli_query($conn, $qry);
      if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="icon-box icon-box-clr-3">
                                            <div class="icon"><i class="fas fa-user-friends"></i></div>
                        <h4 class="title"><a href="#about"><?php echo  $row['name'] ?></a></h4>
                        <p><?php echo  $row['email'] ?></p>
                        <hr>
                        <p><?php echo  $row['address'] ?></p>
                        <hr>
                        <p><?php echo  $row['contact'] ?></p>
                        <?php              
               echo "
               <a href='assignednew.php?ids=" . $row['did'] . "&pay=".$payid."'>  
               <button type='submit'  class='btn btn-success btn-lg'  style='padding-left: 2.5rem; radius:240px; padding-right: 2.5rem;background-color: #14b38b;float:right' name='login'>
            Assign</button ></a>";
              ?>
                    </div>
              
                </div>
                <?php
                }
} else {
    echo "  <center> <h2 style='color: red;'>.... No Data Found ...</h2></center> ";
}
?>


            </div>
        </div>
    </section>
    <!-- home 4grids block -->
    
<?php
include("footer.php");
?>