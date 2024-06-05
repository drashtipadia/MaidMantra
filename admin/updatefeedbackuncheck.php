<?php
include("../connection.php");
$id=$_GET['fid'];
$query="UPDATE feedback SET feed_status='' WHERE feed_id=$id";
//echo $query;
$result=mysqli_query($con,$query);
if($result)
{
    echo "<script> alert('feedback remove on client side'); window.location='./adminuserfeedback.php';</script>";
}
else
{
    echo mysqli_error($con);
}

?>