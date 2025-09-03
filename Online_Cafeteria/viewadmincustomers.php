<?php
include("Header_Admin.php");
include("dbConnection.php");
?>

<style>
#hel{

    box-shadow: green 0px 22px 70px 4px;margin:10px;
}

</style>
<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Admin</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Customers</a></li>
                    <li class="active"><i class="fas fa-angle-right">View Customers</i></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->
 


    <!-- home 4grids block -->
    <section class="services-w3l-block py-5" id="features">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h3 class="title-style">Customers List</h3>
            </div>
            <div class="row">
            <?php
$qry = "SELECT *from tb_user_register";
$result = mysqli_query($conn, $qry);
      if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>

<div class="col-md-6 col-lg-3 d-flex align-items-stretch mt-lg-0 mt-4" >
<div class="icon-box icon-box-clr-4" id="hel">
                        <div class="icon"><i class="fas fa-user-friends"></i></div>
                        <h4 class="title"><a href="#about"><?php echo  $row['username'] ?></a></h4>
                        <p><?php echo  $row['email'] ?></p>
                        <hr>
                        <p><?php echo  $row['address'] ?></p>
                        <hr>
                        <p><?php echo  $row['contact'] ?></p>

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