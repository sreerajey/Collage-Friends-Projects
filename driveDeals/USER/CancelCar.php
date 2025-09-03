<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';

$cid = $_REQUEST['id'];
$bid = $_REQUEST['bid'];
// $status = $_REQUEST['status'];

$newDate = date('Y-m-d', strtotime('+7 days'));

$update = "UPDATE `car` SET `cstatus` = 'free' WHERE `cid` ='$cid'";
$dele = "DELETE FROM `book` WHERE `bid`='$bid'";

// echo "HELLLLLLLLLLLLLLLLLLLLLLLLLOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO" . $qryReg;
if ($conn->query($update) == TRUE && $conn->query($dele)) {
    echo "<script>alert('Cancelled Successfully');
                    window.location = 'ViewCars.php';</script>";
} else {
    echo "<script>alert('Something Went Wrong....');window.location = 'ViewCars.php';</script>";
}

    // ?id=$cid&sid=$sid