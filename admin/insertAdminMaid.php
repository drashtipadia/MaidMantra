<?php
include("../connection.php");

$maid_name=$_POST['maid_name'];
$maid_age=$_POST['maid_age'];
$maid_gen=$_POST['gender'];
$maid_number=$_POST['maid_number'];

$maidimage = '';
if($_FILES["image1"]["name"] !==""){
    move_uploaded_file($_FILES["image1"]["tmp_name"],"../images/".$_FILES["image1"]["name"]);
    $maidimage = $maidimage . $_FILES['image1']['name'];//image1.jpeg
}
$maid_ser=$_POST['Service'];



  $query = "INSERT INTO maids(maid_name,maid_age,maid_gender,maid_number,maid_picture,service_id) VALUES('".$maid_name."','".$maid_age."','".$maid_gen."','".$maid_number."','".$maidimage."','".$maid_ser."')";
  $result = mysqli_query($con,$query);
  if($result){
      echo("<script>alert('record inserted successfully'); window.location = './adminMaidlist.php';</script>");
  }
  else{
      echo(mysqli_error($con));
  }

?>