<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';

$cid = $_REQUEST['id'];
// $sid = $_REQUEST['sid'];
// $status = $_REQUEST['status'];
$qryCheck = "SELECT COUNT(*) AS cnt FROM `compare` WHERE `cid` = '$cid'";

$qryOut = mysqli_query($conn, $qryCheck);

$fetchData = mysqli_fetch_array($qryOut);

if ($fetchData['cnt'] > 0) {
    echo "<script>alert('Already exists');window.location = 'ViewCars.php';</script>";
} else {

    $qryReg = "INSERT INTO `compare`(`uid`,`cid`) VALUE ('$uid','$cid')";

    // echo "HELLLLLLLLLLLLLLLLLLLLLLLLLOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO" . $qryReg;
    if ($conn->query($qryReg) == TRUE) {
        echo "<script>alert('Added Successfully');
                    window.location = 'ViewCompareCars.php';</script>";
    } else {
        echo "<script>alert('Something Went Wrong....');window.location = 'ViewCars.php';</script>";
    }
}
