<?php
include("../connection.php");
$id=$_POST['salaryid'];
$hour=$_POST['edithours'];
$salary=$_POST['editsalary'];


$query="UPDATE salary SET hours='".$hour."',Salary='$salary' WHERE sal_id='$id'";
echo $query;
$res=mysqli_query($con,$query);
if($res)
{
    echo("<script> alert('record Update'); window.location='./adminSalarylist.php'</script>");
    
}
else
{
    echo("<script> alert('record not update');</script>");
}





?>