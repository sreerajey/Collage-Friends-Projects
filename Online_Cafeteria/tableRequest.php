
<?php
session_start();
                                        $centerid = $_SESSION['userregid'];

include('dbConnection.php');
$id=$_REQUEST['ids'];
$qry = "insert into request(uid,tid)values('$centerid','$id')";

  //  echo $qry;
   if (($conn->query($qry) == TRUE)){
    echo "<script>alert('Send Table Request');window.location='viewtables.php'</script>";
}else{
    echo "<script>alert('Data Failed');window.location='viewtables.php'</script>";
}
?>