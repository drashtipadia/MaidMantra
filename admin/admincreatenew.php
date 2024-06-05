<?php
session_start();
include("../connection.php");
$newadminname=$_POST['newadminname'];
$newadminpassword=$_POST['newadminpassword'];
//echo ($newadminname.$newadminpassword);

$selectQuery ="SELECT * FROM admin WHERE name='$newadminname'";
$selectResult=mysqli_query($con,$selectQuery);
if(mysqli_num_rows($selectResult) == 1)
{
      echo("Admin name is already exits");
//     header("Location:./adminprofile.php");
 }
else
{
    $query="INSERT INTO admin(name,password) VALUES('$newadminname','$newadminpassword')";
    $result=mysqli_query($con,$query);
    if($result)
    {
        echo("<script> alert('Admin Crated'); window.location='./adminprofile.php';</script>");  
    }
    else
    {
        echo("<script> alert('Error Genrate not admin create'); window.location='./adminprofile.php';</script>");
    }  
}
?>