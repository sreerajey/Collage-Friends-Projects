
<?php

include('dbConnection.php');
$delid=$_REQUEST['ids'];
$payid=$_REQUEST['pay'];
$date = date('d-m-y h:i:s');

$qry = "insert into assigndelivery(deliveryid,payid,dates,type)values('$delid','$payid','$date','assign')";
  // echo $qry;
  
   if (($conn->query($qry) == TRUE)){
    echo "<script>alert('Assigned...');window.location='assigndelivery.php'</script>";
}else{
    echo "<script>alert(' Failed');window.location='assigndelivery.php'</script>";
}
?>