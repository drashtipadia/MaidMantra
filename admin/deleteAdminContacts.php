<?php
include("../connection.php");
$id = $_GET['contactuser_id'];
//echo ('you have selected' . $id);
$query="DELETE FROM contactuser WHERE con_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete Contact'); window.location='./adminusercontactus.php'; </script>");
}

?>