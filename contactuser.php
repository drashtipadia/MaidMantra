<?php
include("./connection.php");
$c_name=$_POST['cname'];
$c_number=$_POST['cnumber'];
$location=$_POST['locationid'];
$services=$_POST['cservices'];
$time=$_POST['ctime'];


$query="INSERT INTO contactuser(con_name,con_number,con_location,con_time,service_Id) VALUES('$c_name','$c_number','$location','$time','$services')";

$res=mysqli_query($con,$query);
echo $res;
if($res)
{
        echo("<script> alert('thank you for Contact'); window.location='./contact.php'; </script>");
}
else
{
        echo("<script> alert('something wrong'); window.location='./index.php'; </script>");
       // echo mysqli_error($con);
        //
}
?>