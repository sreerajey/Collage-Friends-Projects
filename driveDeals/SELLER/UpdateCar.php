<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';
include('SellerHeader.php')
?>

<section class="ftco-section contact-section"><br><br>
    <center>
        <H1>Update Cars</H1>
    </center><br><br>
    <?php
    $id = $_GET['id'];
    $a = "SELECT *FROM `car` WHERE `cid`='$id'";
    $qry = mysqli_query($conn, $a);
    if (mysqli_num_rows($qry) < 1) {
        echo "<script>alert('No Data')";
    } else {
    ?>
        <?php
        while ($row = mysqli_fetch_array($qry)) {
        ?>

            <div class="container">
                <div class="row d-flex mb-5 contact-info">
                    <div class="col-md-8 block-9 mb-md-5" style="margin-left: 18%;">

                        <form method="post" class="bg-light p-5 contact-form" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['cname'] ?>" placeholder="Car Name" name="cname" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['cmodel'] ?>" placeholder="Car Model" name="cmodel" required>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="cfuel">
                                    <option selected="true" disabled="disabled"><?php echo $row['cfuel'] ?></option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="CNG">CNG</option>
                                    <option value="EV">EV</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['cprice'] ?>" placeholder="Price" name="cprice" required>
                            </div>

                            <div class="form-group">
                                <textarea id="" cols="30" rows="7" class="form-control" placeholder="Description" name="cdesc" required><?php echo $row['cdesc'] ?></textarea>
                            </div><br>
                            <center>
                                <div class="form-group">
                                    <input type="submit" value="Update" name="add" class="btn btn-primary py-3 px-5">
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>

</section>

<?php
include('../COMMON/CommonFooter.php')
?>

<!-- ================ Code section Start ================= -->

<?php

if (isset($_REQUEST['add'])) {

    $Cname = $_REQUEST['cname'];
    $Cmodel = $_REQUEST['cmodel'];
    $Cfuel = $_REQUEST['cfuel'];
    $Cprice = $_REQUEST['cprice'];
    $Cdescription = $_REQUEST['cdesc'];

    $qryAdd = "UPDATE `car`SET `cname`='$Cname',`cmodel`='$Cmodel',`cfuel`='$Cfuel',`cprice`='$Cprice',`cdesc`='$Cdescription' WHERE `cid`='$id'";
    //echo $qryAdd;

    if ($conn->query($qryAdd) == TRUE) {
        echo "<script>alert('Successfully Updated'); window.location = 'ViewCars.php';</script>";
        // echo $qryAdd;
    } else {
        echo "<script>alert('Failed'); window.location = 'ViewCars.php';</script>";
        // echo $qryAdd;
    }
}
?>

<!-- ================ Code section end ================= -->