
<?php

include('dbConnection.php');
$delid=$_REQUEST['ids'];

$qry = "update assigndelivery set type='assigned' where agid='$delid'";
  // echo $qry;
  
   if (($conn->query($qry) == TRUE)){
    echo "<script>alert('Assigned...');window.location='existnotification.php'</script>";
}else{
    echo "<script>alert(' Failed');window.location='existnotification.php'</script>";
}
?>