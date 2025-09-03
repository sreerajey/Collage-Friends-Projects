<?php
session_start();
include '../CONNECTION/DbConnection.php';
$id=$_GET['id'];

$query="DELETE FROM `car` WHERE `cid`='$id'";
// echo $query;
$result=mysqli_query($conn,$query);
// echo $result;
//  echo $query;
if($result){
    echo "<script type=\"text/javascript\">
         alert(\"Deleted\");
         window.location=(\"AddCars.php\");
    </script>";
}