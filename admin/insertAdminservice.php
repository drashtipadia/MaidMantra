<?php
include("../connection.php");

$service=$_POST['newservice'];

$query="INSERT INTO service(service_name) VALUES ('$service')";
//echo $query;
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('record inserted successfully'); window.location = './adminservice.php'; </script>");
}
else
{
    echo(mysqli_error($con));
}



?>