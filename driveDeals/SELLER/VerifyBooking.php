<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';

$id = $_REQUEST['id'];
$status = $_REQUEST['status'];

if ($status == 'not paid') {
    $query = "UPDATE `car` SET `cstatus`='$status' WHERE `cid`='$id'";
    $result = mysqli_query($conn, $query);
    // echo $query;
    if ($result == TRUE) {
        echo "<script type = \"text/javascript\">
        				alert(\"Approved\");
                        window.location = (\"ViewBookings.php\")
                        </script>";

        // echo $query;
    }
} else {
    $query = "UPDATE `car` SET `cstatus`='$status' WHERE `cid`='$id'";
    $result = mysqli_query($conn, $query);
    // echo $query;
    if ($result == TRUE) {
        echo "<script type = \"text/javascript\">
        				alert(\"Rejected\");
                        window.location = (\"ViewCars.php\")
                        </script>";

        echo $query;
    }
}
