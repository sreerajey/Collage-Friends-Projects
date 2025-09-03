<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';

$cid = $_REQUEST['id'];

$countQry = "SELECT `scount` FROM `car` WHERE `cid`='$cid'";
$res = $conn->query($countQry);
$row = mysqli_fetch_array($res);
$count = $row['scount'];
$updatedCount = $count + 1;
$newDate = date('Y-m-d', strtotime('+7 days'));

$qryCheck = "SELECT COUNT(*) AS cnt FROM `book` WHERE `cid` = '$cid' AND `uid` = '$uid' AND `status`='Requested'";
$qryOut = mysqli_query($conn, $qryCheck);

$fetchData = mysqli_fetch_array($qryOut);

if ($fetchData['cnt'] > 0) {
    echo "<script>alert('Already Booked');window.location = 'ViewCars.php';</script>";
} else {

    $qryReg = "INSERT INTO `book`(`uid`,`cid`,`bdate`,`deliverydate`,`usertype`) VALUE ('$uid','$cid',CURDATE(),'$newDate','USER')";
    $update = "UPDATE `car` SET `cstatus` = 'request',`scount`='$updatedCount' WHERE `cid` ='$cid'";
}
if ($conn->query($qryReg) == TRUE && $conn->query($update) == TRUE) {
    echo "<script>alert('Requested Successfully');
                    window.location = 'ViewBooking.php';</script>";
} else {
    echo "<script>alert('Something Went Wrong....');window.location = 'ViewCars.php';</script>";
}
