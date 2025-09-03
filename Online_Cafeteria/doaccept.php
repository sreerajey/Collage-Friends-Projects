
<?php
session_start();
include('dbConnection.php');
$id=$_REQUEST['ids'];
$uid = $_SESSION['userregid'];
$date = date('d-m-y h:i:s');

$qry = "update request set status='yes' where rsid='$id'";

  //  echo $qry;
   if (($conn->query($qry) == TRUE)){
    echo $uid;
   echo "<script>alert('Accepted');window.location='viewalltablerequest.php'</script>";
}else{
    echo "<script>alert('Data Failed');window.location='viewproductitems.php'</script>";
}
?>