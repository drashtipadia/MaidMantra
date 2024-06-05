<?php
include("../connection.php");
$title=$_POST['info_title'];
$details=$_POST['info_descripition'];
$service=$_POST['info_service'];
$image = '';
if($_FILES["newimage"]["name"] !==""){
    move_uploaded_file($_FILES["newimage"]["tmp_name"],"../images/".$_FILES["newimage"]["name"]);
    $image = $image . $_FILES['newimage']['name'];
}
$query="INSERT INTO information(title,details,image,service_Id) VALUES('".$title."','".$details."','".$image."','".$service."')";
$result=mysqli_query($con,$query);
if($result)
{
    echo "<script> alert('ADD information Successfully..'); window.location=('./adminServicesinfo.php');</script>";
}
else
{
    echo "<script> alert('no add information');</script>";
    echo mysqli_error($con);
}
?>