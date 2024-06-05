<?php
include("./connection.php");
session_start();

$service = $_POST['serviceid'];
$sal = $_POST['hour/salary'];
$speQ_id = '';
$speQvalue = '';
$comQ_id = '';
$comQvalue = '';
foreach ($_POST['speQid'] as $val) {
    $speQ_id = $speQ_id . $val.",";
}
foreach ($_POST['speQvalue'] as $val) {
    $speQvalue = $speQvalue . $val.",";
}
foreach ($_POST['comQids'] as $val) {
    $comQ_id = $comQ_id . $val.",";
}
foreach ($_POST['comvalues'] as $val) {
    $comQvalue = $comQvalue . $val.",";
}
$gender=$comQvalue[0];
$speQ_id = substr($speQ_id, 0, -1);
$speQvalue = substr($speQvalue, 0, -1);
$comQ_id = substr($comQ_id, 0, -1);
$comQvalue=substr($comQvalue,0,-1);
$query = "INSERT into booking(comQ_id_list,comQ_val_list,speQ_id_list,speQ_val_list,sal_id,ID,service_Id,bookingdate)Values('" . $comQ_id . "','".$comQvalue."','" . $speQ_id . "','" . $speQvalue . "',$sal," . $_SESSION['u_id'] . ",$service,'".date('Y-m-d')."')";
$result=mysqli_query($con,$query);
//echo $query;
if(isset($result))
{
   header("Location:./userMaidchoice.php?serviceid=$service&gender=$gender");
}
else
{
   echo mysqli_error($con);
}


?>