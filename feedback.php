<?php
include("./connection.php");
$f_name=$_POST['feedname'];
$f_email=$_POST['femail'];
$feedbackmsg=$_POST['feedback'];
//echo ($f_name.$f_email.$feedbackmsg);
$query="INSERT INTO feedback(feed_name,feed_email,feedback) VALUES('$f_name','$f_email','$feedbackmsg')";
//echo $query;
$res=mysqli_query($con,$query);
if($res)
{
        echo("<script> alert('thank you for feedback'); window.location='./index.php'; </script>");
}
// else
// {
//         echo("<script> alert('something wrong'); window.location='./index.php';</script>");
// }
?>