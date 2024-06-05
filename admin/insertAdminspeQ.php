<?php
include("../connection.php");

$que=$_POST['question'];
$value=$_POST['questionvalue'];
$service=$_POST['service'];

$query="INSERT INTO specificquestion(speQ_name,speQ_value,service_Id) VALUES ('$que','$value',$service)";
//echo $query;
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('record inserted successfully'); window.location = './adminspecificQlist.php'; </script>");
}
else
{
    echo(mysqli_error($con));
}



?>