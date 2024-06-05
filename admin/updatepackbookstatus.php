<?php 
include("../connection.php");
$id=$_POST['id'];
$status=$_POST['pstatus'];
$query="UPDATE packagebooking SET p_status='".$status."' WHERE pb_id=$id";
//echo $query;
$res=mysqli_query($con,$query);
if(isset($res))
{
    echo "<script> alert('Package apporved'); window.location='./adminPackagebookingdetail.php';</script>";
}
else
{
    echo mysqli_error($con);
}
?>