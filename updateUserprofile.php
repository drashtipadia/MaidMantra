<?php
include("./connection.php");
session_start();
$name=$_POST['user_name'];
$number=$_POST['user_number'];
$gender=$_POST['gender'];


$query="UPDATE user SET name='".$name."',number='".$number."',gender='".$gender."' WHERE ID=".$_SESSION['u_id'];
//echo ($query);
$res=mysqli_query($con,$query);
if($res)
{
    echo("<script> alert('record Update'); window.location='./userprofile.php'</script>");
    
}
else
{
    echo("<script> alert('record not update');</script>");
}





?>