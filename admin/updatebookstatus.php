<?php 
include("../connection.php");
$id=$_POST['id'];
$status=$_POST['status'];
$query="UPDATE booking SET status='".$status."' WHERE b_id=$id";
//echo $query;
$res=mysqli_query($con,$query);
if(isset($res))
{
    echo "<script> alert('Service apporved'); window.location='./adminBookingdetail.php';</script>";
}
else
{
    echo mysqli_error($con);
}
?>