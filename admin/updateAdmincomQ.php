<?php
include("../connection.php");
$id=$_POST['cq_id'];
$que_name=$_POST['cq_name'];
$que_value=$_POST['cq_value'];
$que_type=$_POST['cq_type'];

$query="UPDATE commonquestion SET que_description='".$que_name."',que_value='".$que_value."',que_val_type='".$que_type."' WHERE que_id='$id'";

$res=mysqli_query($con,$query);
if($res)
{
    echo("<script> alert('record Update'); window.location='./admincommonQlist.php'</script>");
    
}
else
{
    echo("<script> alert('record not update');</script>");
}





?>