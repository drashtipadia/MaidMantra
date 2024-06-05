<?php
include("../connection.php");
$name=$_POST['newadminname'];
$password=$_POST['newadminpassword'];
$query="INSERT into admin(name,password) VALUES('".$name."','".$password."')";
$result=mysqli_query($con,$query);
if($result)
{
    echo "<script> alert('new admin add successfully..'); window.location='./adminprofile.php';</script>";
}
else
{
    echo mysqli_error($con);
}
?>