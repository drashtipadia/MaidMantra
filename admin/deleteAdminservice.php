<?php
include("../connection.php");
$id = $_GET['ser_id'];

$query="DELETE FROM service WHERE service_Id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete Reocrd'); window.location='./adminservice.php'; </script>");
}

?>