<?php
include("../connection.php");
$id = $_GET['pid'];

$query="DELETE FROM package WHERE p_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete Package'); window.location='./adminpackage.php'; </script>");
}

?>