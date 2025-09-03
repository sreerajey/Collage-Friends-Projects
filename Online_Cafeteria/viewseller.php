<?php
include("Header_Admin.php");
include("dbConnection.php");
?>

<br><br><br><br>    <br><br>

    <!-- home 4grids block -->
    <section class="services-w3l-block py-5" id="features">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h3 class="title-style">Existing Expert</h3>
            </div>      <br><br>

            <div class="row">
            <?php
$qry = "SELECT *from tb_center_register";
$result = mysqli_query($conn, $qry);
      if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                    <div class="icon-box icon-box-clr-1">
                        <div class="icon"><i class="fas fa-user-friends"></i></div>
                        <h4 class="title"><a href="#about"><?php echo  $row['centername'] ?></a></h4>
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