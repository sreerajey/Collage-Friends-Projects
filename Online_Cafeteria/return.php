
<?php

include('dbConnection.php');
$id=$_REQUEST['ids'];
$qry = "delete from cart WHERE cid='" . $id. "' and paid='yes'";

  //  echo $qry;
   if (($conn->query($qry) == TRUE)){
    echo "<script>alert('Cancel The Orders and remove from the Cart List...');window.location='viewcards.php'</script>";
}else{
    echo "<script>alert('Data Failed');window.location='usermybooking.php'</script>";
}
?>