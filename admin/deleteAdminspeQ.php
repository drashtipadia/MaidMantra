<?php
include("../connection.php");
//echo("hello");
$id = $_GET['speQid'];

$query="DELETE FROM specificquestion WHERE speQ_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete Reocrd'); window.location='./adminspecificQlist.php'; </script>");
}

?>