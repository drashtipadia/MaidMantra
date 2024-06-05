<?php
include("../connection.php");
$id=$_POST['pack_id'];
$title=$_POST['pack_uptitle'];
$information=$_POST['pack_upinfo'];
$service=$_POST['pack_upservice'];
$image = '';

if($_FILES["uppackimage"]["name"] !==""){
    move_uploaded_file($_FILES["uppackimage"]["tmp_name"],"../images/".$_FILES["uppackimage"]["name"]);
    $image = $image . $_FILES['uppackimage']['name'];
}
else
{
        $image=$_POST['image'];   
}

//echo $image;


$query="UPDATE package SET p_title='".$title."',p_info='".$information."',p_image='".$image."',service_Id='$service' WHERE p_id='$id'";
//echo ($query);
$res=mysqli_query($con,$query);
if($res)
{
    echo("<script> alert('Update Package Succesfully'); window.location='./adminpackage.php'</script>");
   
}
else
{
    echo("<script> alert('record not update');</script>");
    echo mysqli_error($con);
}
?>