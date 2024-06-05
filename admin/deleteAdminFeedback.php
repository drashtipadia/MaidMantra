<?php
include("../connection.php");
$id = $_GET['feedbackuser_id'];
//echo ('you have selected' . $id);
$query="DELETE FROM feedback WHERE feed_id=$id";
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('Delete feedback'); window.location='./adminuserfeedback.php'; </script>");
}

?>