<?php
include("../connection.php");
$id=$_POST['infoid'];
$title=$_POST['uptitle'];
$descritipon=$_POST['descripition'];
$image = '';

if($_FILES["updateimage"]["name"] !==""){
    move_uploaded_file($_FILES["updateimage"]["tmp_name"],"../images/".$_FILES["updateimage"]["name"]);
    $image = $image . $_FILES['updateimage']['name'];
}
else
{
        $image=$_POST['image'];   
}

//echo $image;
$ser=$_POST['Service'];

$query="UPDATE information SET title='".$title."',details='".$descritipon."',image='".$image."',service_Id='$ser' WHERE info_id='$id'";
//echo ($query);
$res=mysqli_query($con,$query);
if($res)
{
    echo("<script> alert('record Update'); window.location='./adminServicesinfo.php'</script>");
   
}
else
{
    echo("<script> alert('record not update');</script>");
    echo mysqli_error($con);
}
?>