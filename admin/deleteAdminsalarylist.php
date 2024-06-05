<?php
include("../connection.php");
$id = $_GET['salary_id'];

$query="DELETE FROM salary WHERE sal_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete Reocrd'); window.location='./adminSalarylist.php'; </script>");
}

?>