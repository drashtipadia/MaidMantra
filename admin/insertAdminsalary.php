<?php
include("../connection.php");

$sal_hour=$_POST['hour'];
$salary=$_POST['newsalary'];

$query="INSERT INTO salary(hours,Salary) VALUES ('$sal_hour',$salary)";
//echo $query;
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('record inserted successfully'); window.location = './adminSalarylist.php'; </script>");
}
else
{
    echo(mysqli_error($con));
}



?>