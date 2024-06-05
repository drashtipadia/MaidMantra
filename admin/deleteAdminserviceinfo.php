<?php
include("../connection.php");
$id = $_GET['id'];

$query="DELETE FROM information WHERE info_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete Information'); window.location='./adminServicesinfo.php'; </script>");
}

?>