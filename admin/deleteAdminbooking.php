<?php
include("../connection.php");
$id = $_GET['bookingid'];

$query="DELETE FROM booking WHERE b_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete Booking'); window.location='./adminBookingdetail.php'; </script>");
}


?>