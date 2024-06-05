<?php
include("../connection.php");
$id = $_GET['us_id'];
//echo ('you have selected' . $id);
$query="DELETE FROM user WHERE ID=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete record'); window.location='./adminregsiteruser.php'; </script>");
}

?>