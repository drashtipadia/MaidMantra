<?php
include("./connection.php");
session_start();
$maidid=$_POST['maidsid'];
//echo $maidid;
$query="UPDATE packagebooking SET maid_id=$maidid WHERE ID=".$_SESSION['u_id']." ORDER BY p_id DESC LIMIT 1";
$result=mysqli_query($con,$query);
if(isset($result))
{
    echo ("<script> alert('Thank you for Package Booking');  window.location='./index.php';</script>");
}
else{
     echo mysqli_error($con);
}
?>