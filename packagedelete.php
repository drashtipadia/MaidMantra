<?php
include("./connection.php");
$id = $_GET['packid'];
$query="DELETE FROM packagebooking WHERE pb_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Your selectd package cancel'); window.location='./userBookinProfile.php'; </script>");
}

?>