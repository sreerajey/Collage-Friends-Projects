<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';
include('SellerHeader.php')
?>

<section class="ftco-section contact-section"><br><br>
    <center>
        <H1>Add Cars</H1>
    </center><br><br>
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-8 block-9 mb-md-5" style="margin-left: 18%;">

                <form method="post" class="bg-light p-5 contact-form" enctype="multipart/form-data">

                    <div class="form-group">
                        <input type="file" class="form-control" placeholder="Your Name" name="cphoto" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Car Name" name="cname" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Car Model" name="cmodel" required>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="cfuel">
                            <option selected="true" disabled="disabled">--- Select Fuel ---</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Petrol">Petrol</option>
                            <option value="CNG">CNG</option>
                            <option value="EV">EV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Price" name="cprice" required>
                    </div>

                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" class="form-control" placeholder="Description" name="cdesc" required></textarea>
                    </div><br>
                    <center>
                        <div class="form-group">
                            <input type="submit" value="Add" name="add" class="btn btn-primary py-3 px-5">
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

if (isset($_REQUEST['add'])) {

    $Cname = $_REQUEST['cname'];
    $Cmodel = $_REQUEST['cmodel'];
    $Cfuel = $_REQUEST['cfuel'];
    $Cprice = $_REQUEST['cprice'];
    $Cdescription = $_REQUEST['cdesc'];

    $filename = $_FILES["cphoto"]["name"];
    $tempname = $_FILES["cphoto"]["tmp_name"];
    $folder = "image/" . $filename;

    if (move_uploaded_file($tempname, '../assets/image/' . $filename)) {
        $qryCheck = "SELECT COUNT(*) AS cnt FROM `car` WHERE `cname` = '$pname' OR `cprice` = '$price'";

        $qryOut = mysqli_query($conn, $qryCheck);

        $fetchData = mysqli_fetch_array($qryOut);

        if ($fetchData['cnt'] > 0) {
            echo "<script>alert('Already exist ');
             window.location = 'AddCars.php';
            </script>";
        } else {

            $qryReg = "INSERT INTO car(`cphoto`,`cname`,`cmodel`,`cfuel`,`cprice`,`cdesc`)VALUES('$filename','$Cname','$Cmodel','$Cfuel','$Cprice','$Cdescription')";

            echo $qryReg . "&& ";

            if ($conn->query($qryReg) == TRUE) {
                echo "<script>alert(' Success');window.location = 'ViewCars.php';</script>";
            } else {
                echo "<script>alert(' Failed');window.location = 'AddCars.php';</script>";
            }
        }
    }
}
?>

<!-- ================ Code section end ================= -->