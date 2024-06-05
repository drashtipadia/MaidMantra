<?php
include("./connection.php");
session_start();
$serid=$_POST['serid'];
$pid=$_POST['pacid'];
$month=$_POST['month'];
$salid=$_POST['hour/salary'];
$comqid='';
$comqvalues='';
$speqid='';
$speqvalues='';
foreach ($_POST['comQids'] as $val) {
    $comqid = $comqid . $val.",";

}
foreach ($_POST['comvalues'] as $val) {
    $comqvalues = $comqvalues . $val.",";

}
foreach ($_POST['speQid'] as $val) {
    $speqid = $speqid . $val.",";

}
foreach ($_POST['speQvalue'] as $val) {
    $speqvalues = $speqvalues . $val.",";

}
$gender=$comqvalues[0];
$speqid = substr($speqid, 0, -1);
$speqvalues = substr($speqvalues, 0, -1);
$comqid = substr($comqid, 0, -1);
$comqvalues=substr($comqvalues,0,-1);
$query="INSERT into packagebooking(pcomq_ids,pcomq_values,pspeq_ids,pspeq_values,month,sal_id,ID,pbookingdate,p_id)Values('".$comqid."','".$comqvalues."','" .$speqid . "','" .$speqvalues. "',$month,$salid,".$_SESSION['u_id'].",'".date('Y-m-d')."',$pid)";
echo $query;
$result=mysqli_query($con,$query);
if($result)
{
    header("Location:./packagemaidchoice.php?serviceid=$serid&gender=$gender");
}
else{
    echo mysqli_error($con);
}


?>