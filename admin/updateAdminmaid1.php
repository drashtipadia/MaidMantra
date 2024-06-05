<?php
include("../connection.php");
$id=$_POST['maidid'];
$m_name=$_POST['m_name'];
$m_age=$_POST['m_age'];
$m_gen=$_POST['gender'];
$m_sta=$_POST['status'];
$m_number=$_POST['m_number'];
$m_image = '';

if($_FILES["image1"]["name"] !==""){
    move_uploaded_file($_FILES["image1"]["tmp_name"],"../images/".$_FILES["image1"]["name"]);
    $m_image = $m_image . $_FILES['image1']['name'];//image1.jpeg
}
else
{
        $m_image=$_POST['image'];   
}
$m_ser=$_POST['Service'];

$query="UPDATE maids SET maid_name='".$m_name."',maid_age='".$m_age."',maid_gender='".$m_gen."',maid_number='".$m_number."',maid_picture='".$m_image."',maid_status='".$m_sta."',service_Id='$m_ser' WHERE maid_id='$id'";
//echo ($query);
$res=mysqli_query($con,$query);
if($res)
{
    echo("<script> alert('record Update'); window.location='./adminMaidlist.php'</script>");
    echo ("hello");
}
else
{
    echo("<script> alert('record not update');</script>");
}
?>