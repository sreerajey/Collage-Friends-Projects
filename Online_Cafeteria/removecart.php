
<?php

include('dbConnection.php');
$id=$_REQUEST['ids'];
$qry = "delete from cart WHERE cid='" . $id. "' and paid='no'";

  //  echo $qry;
   if (($conn->query($qry) == TRUE)){
    echo "<script>alert('item is removed...');window.location='viewcards.php'</script>";
}else{
    echo "<script>alert('Data Failed');window.location='viewcards.php'</script>";
}
?>