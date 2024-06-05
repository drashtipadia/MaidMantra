<?php
include("../connection.php");
$id = $_GET['packbookid'];

$query="DELETE FROM packagebooking WHERE pb_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete package Booking'); window.location='./adminPackagebookingdetail.php'; </script>");
}


?>