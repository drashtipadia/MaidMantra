<?php
include("../connection.php");
$id = $_POST['ser_id'];
$service = $_POST['ser_name'];
$query = "UPDATE service SET service_name='" . $service . "' WHERE service_Id='$id'";
// echo $query;
$res = mysqli_query($con, $query);
if ($res) {
    echo ("<script> alert('record Update'); window.location='./adminservice.php'</script>");
} else {
    echo ("<script> alert('record not update');</script>");
}
?>