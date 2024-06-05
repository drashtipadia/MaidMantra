<?php
session_start();
include("../connection.php"); 
$name=$_POST['adminname'];
$pass=$_POST['adminpass'];
$query="SELECT * FROM admin WHERE name='".$name."' and password='".$pass."'";
$res=mysqli_query($con,$query);
if(mysqli_num_rows($res)==1)
{
    $_SESSION['admin']=$name;
     header("Location:./index.php");
}
else
{
    echo("<script> alert('Inavlid name and password'); window.location='./adminlogin.php';</script>");
}

 
?>