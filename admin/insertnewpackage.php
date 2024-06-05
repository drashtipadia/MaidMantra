<?php
include("../connection.php");
echo("hello");
$title=$_POST['pack_title'];
$details=$_POST['pack_descripition'];
$service=$_POST['pack_service'];
$image = '';
if($_FILES["newpackimage"]["name"] !==""){
    move_uploaded_file($_FILES["newpackimage"]["tmp_name"],"../images/".$_FILES["newpackimage"]["name"]);
    $image = $image . $_FILES['newpackimage']['name'];
}
$query="INSERT INTO package(p_title,p_info,p_image,service_Id) VALUES('".$title."','".$details."','".$image."','".$service."')";
$result=mysqli_query($con,$query);
if($result)
{
    echo "<script> alert('ADD PackageSuccessfully..'); window.location=('./adminpackage.php');</script>";
}
else
{
    echo "<script> alert('no add information');</script>";
    echo mysqli_error($con);
}


?>
