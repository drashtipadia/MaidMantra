<?php
include("../connection.php");
$id=$_POST['SQ_id'];
$speque=$_POST['SQ_name'];
$speval=$_POST['SQ_value'];
$speser=$_POST['SQ_service'];

$query="UPDATE specificquestion SET speQ_name='".$speque."',speQ_value='".$speval."',service_Id='$speser' WHERE speQ_id='$id'";
//echo $query;
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('record update successfully'); window.location = './adminspecificQlist.php'; </script>");
}
else
{
    echo(mysqli_error($con));
}



?>