<?php
include '../CONNECTION/DbConnection.php';
$status = $_REQUEST['status'];
$tid = $_REQUEST['testid'];

$qry = "UPDATE `test_drive` SET `status`='$status' WHERE `tid`='$tid'";
$result = mysqli_query($conn, $qry);

if ($result) {
    echo "<script type=\"text/javascript\">alert(\"$status\");
    window.location=(\"viewTestDriveRequests.php\");</script>";
}
