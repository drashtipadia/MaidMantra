<?php
include("../connection.php");
session_start();
$checkquery="SELECT * FROM admin WHERE name='".$_SESSION['admin']."' and password ='".$_POST['adminoldpassword']."'";
$checkRes=mysqli_query($con,$checkquery);
if(mysqli_num_rows($checkRes)===1)
{
        $query="UPDATE admin SET password='".$_POST['adminnewpassword']."' WHERE name='".$_SESSION['admin']."'";
        $result=mysqli_query($con,$query);
        if($result)
        {
                echo("<script> alert('Password Updated Succeddfully'); window.location='./adminprofile.php';</script>");
        }
}
else{
        echo("<script> alert('Old Password Wrong...'); window.location='./adminprofile.php';</script>");
}

?>