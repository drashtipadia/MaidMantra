<?php
include("../connection.php");
$id = $_GET['m_id'];
//echo ('you have selected' . $id);
 $query="DELETE FROM maids WHERE maid_id=$id";
 //echo $query;
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete Maid'); window.location='./adminMaidlist.php'; </script>");
}

?>