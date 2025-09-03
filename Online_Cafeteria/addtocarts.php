
<?php
session_start();
include('dbConnection.php');
$id=$_REQUEST['ids'];
$uid = $_SESSION['userregid'];
$date = date('d-m-y h:i:s');

$qry = "insert into cart(pid,uid,paid,date)values('$id','$uid','no','$date')";

  //  echo $qry;
   if (($conn->query($qry) == TRUE)){
    echo $uid;
   echo "<script>alert('Item Add to cart...');window.location='viewcards.php'</script>";
}else{
    echo "<script>alert('Data Failed');window.location='viewproductitems.php'</script>";
}
?>