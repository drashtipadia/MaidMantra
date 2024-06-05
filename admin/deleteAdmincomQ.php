<?php
include("../connection.php");
$id = $_GET['Cque_id'];
//echo ('you have selected' . $id);
$query="DELETE FROM commonquestion WHERE que_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete Question'); window.location='./admincommonQlist.php'; </script>");
}

?>